@extends('layouts.app')
@section('title', '| BIR Form No. 1601Cv2018')
@section('content')
<div class="loader"></div>
    <!-- Styles -->
<link href="{{ asset('css/forms.css') }}" rel="stylesheet">
<link href="{{ asset('css/print.css') }}" rel="stylesheet" media="print">

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
                    <button type="button" class="btn btn-danger btn-exit" id="1601Cv2018" company='{{$company->id}}'>No</button>
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
                    <button type="button" class="btn btn-success btn-exit" id="1601Cv2018" company='{{$company->id}}'>Okay</button>
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
                        <button type="button" class="btn btn-danger btn-filing-success" form='1601Cv2018' company='{{$company->id}}'>Okay</button>
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
                        <div id="wrapper" style="margin: 0 auto; position: relative; width: 880px; ">
                        
                            <table border="0" width="800" cellspacing="0" cellpadding="0" align="center" style=" background-repeat: repeat-x;">
                            <tr><td>
                        
                            <div id="formPaper">
                                <div id="Page1Content">
                                    <table width="800" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td>
                                                <table width="800" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="300" valign="center">
                                                            <img src="{{ asset('images/bcs_new.png') }}" width="80" /> 
                                                        </td>
                                                        <td>
                                                            <img src="{{ asset('images/header_logo.png') }}" width="210" height="50px" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="800" border="1" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="120" valign="middle" style="text-align: center;">
                                                            <label face="Arial" size="1px">BIR Form No.</label>
                                                            <br/><font size="5px" style="font-weight:bold;">1601-C</font>
                                                            <br/><label face="Arial" size="1px">January 2018 (ENCS)</label>
                                                            <br/><label face="Arial" size="1px" style="font-weight:bold;">Page 1</label>
                                                        </td>
                                                        <td width="0" valign="center" style="text-align: center;">
                                                            <font size="5px" style="font-weight:bold;">Monthly Remittance Return</font>
                                                            <br/><font size="4px" style="font-weight:bold;">of Income Taxes Withheld on Compensation</font>
                                                            <br><label face="Arial" size="1px">Enter all required information in CAPITAL LETTERS using BLACK ink. Mark all applicable boxes with an "X". Two copies MUST be filed with the BIR and one held by the Tax Filer.</label>
                                                        </td>
                                                        <td width="200" valign="center">
                                                                <p><img src="{{ asset('images/Bar Codes/1601C_p1.png') }}" width="220" height="75px" /> </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td width="200" valign="top" class="tblFormTd">
                                                            <table width="200" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1" style="font-size: 11px;">For the Month (MM/YYYY)</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td width="100">
                                                                        <select size="1" name="frm1601c:txtMonth" id="frm1601c:txtMonth" class="iceSelOneMnu fieldSelect1" onchange="validateRtnPeriod()" >
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
                                                                    </td>
                                                                    <td width="61"> <input type="text" value="{{$action == 'new' ? '' : $data->item1B}}" size="4" name="frm1601c:txtYear" maxlength="4" id="frm1601c:txtYear" style="width:50px " onkeypress="return wholenumber(this, event)" onblur="validateRtnPeriod()" /></td>

                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="150" valign="top" class="tblFormTd">
                                                            <table width="146" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>
                                                                        <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1601c:j_id217" class="iceSelOneRb-dis fieldText1-dis">
                                                                            <div align="center" style="padding: 1px 0 1px 0;">
                                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            @if($action == 'new')
                                                                                                <td><input type="radio" style="vertical-align: middle;" value="Y" name="frm1601c:AmendedRtn" id="frm1601c:AmendedRtn_1" onclick="changeAmended()" /><label for="frm1601c:AmendedRtn_1" style="font-size:11px;" >Yes</label></td>
                                                                                                <td><input type="radio" style="vertical-align: middle;" value="N"  name="frm1601c:AmendedRtn" id="frm1601c:AmendedRtn_2" onclick="changeAmended()" checked /><label for="frm1601c:AmendedRtn_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >No</label></td>
                                                                                            @else
                                                                                                <td><input type="radio" {{$data->item2 == 'Y' ? 'checked' : ''}} style="vertical-align: middle;" value="Y" name="frm1601c:AmendedRtn" id="frm1601c:AmendedRtn_1" onclick="changeAmended()" /><label for="frm1601c:AmendedRtn_1" style="font-size:11px;" >Yes</label></td>
                                                                                                <td><input type="radio" {{$data->item2 == 'N' ? 'checked' : ''}} style="vertical-align: middle;" value="N"  name="frm1601c:AmendedRtn" id="frm1601c:AmendedRtn_2" onclick="changeAmended()" /><label for="frm1601c:AmendedRtn_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >No</label></td>
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
                                                        <td width="150" valign="top" class="tblFormTd">
                                                            <table width="140" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Any Taxes Withheld?</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>
                                                                        <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1601c:j_id252" class="iceSelOneRb fieldText1">
                                                                            <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        @if($action == 'new')
                                                                                            <td><input type="radio"  value="Y" name="frm1601c:TaxWithheld" id="frm1601c:TaxWithheld_1" onclick="disableTaxdue(false);" /><label for="frm1601c:TaxWithheld_1" style="font-size:11px;" >Yes</label></td>
                                                                                            <td><input type="radio"  value="N" name="frm1601c:TaxWithheld" id="frm1601c:TaxWithheld_2" onclick="cancelAllCompute();" /><label for="frm1601c:TaxWithheld_2" style="font-size:11px;" >No</label></td>
                                                                                        @else
                                                                                            <td><input type="radio" {{$data->item3 == 'Y' ? 'checked' : ''}} value="Y" name="frm1601c:TaxWithheld" id="frm1601c:TaxWithheld_1" onclick="disableTaxdue(false);" /><label for="frm1601c:TaxWithheld_1" style="font-size:11px;" >Yes</label></td>
                                                                                            <td><input type="radio" {{$data->item3 == 'N' ? 'checked' : ''}} value="N" name="frm1601c:TaxWithheld" id="frm1601c:TaxWithheld_2" onclick="cancelAllCompute();" /><label for="frm1601c:TaxWithheld_2" style="font-size:11px;" >No</label></td>
                                                                                        @endif
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="170" valign="top" class="tblFormTd">
                                                            <table width="160" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;4&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>Number of Sheet/s Attached</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td><input type="text" value="0" style="text-align: right;" size="4" name="frm1601c:txtSheets" maxlength="2" id="frm1601c:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="100" valign="top" class="tblFormTd">
                                                            <table width="100" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;5&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>ATC</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td><input name="frm1601c:txtATC" type="text" disabled="true" class="iceInpTxt-dis disabled-dis" id="frm1601c:txtATC" style="background-color: rgb(220, 220, 220);" value="WW010" size="5" maxlength="20" /></td>
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
                                                        <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                            <table width="" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="100%">
                                                                        <div align="center"><font size="2" style="font-weight:bold;">PART I - BACKGROUND INFORMATION</font></div>
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
                                                <table width = "800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td width="550" valign="top" class="tblFormTd">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td>
                                                                        <font size="1" style='font-size: 11px'>Taxpayer Identification Number (TIN)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                                                        <font size="2" face="Arial">
                                                                            <input type="text" value="{{$company->tin1}}" size="3" name="frm1601c:txtTIN1" maxlength="3" id="frm1601c:txtTIN1" onkeypress="return wholenumber(this, event)" disabled />&nbsp;/&nbsp;
                                                                            <input type="text" value="{{$company->tin2}}" size="3" name="frm1601c:txtTIN2" maxlength="3" id="frm1601c:txtTIN2" onkeypress="return wholenumber(this, event)" disabled />&nbsp;/&nbsp;
                                                                            <input type="text" value="{{$company->tin3}}" size="3" name="frm1601c:txtTIN3" maxlength="3" id="frm1601c:txtTIN3" onkeypress="return wholenumber(this, event)" disabled />&nbsp;/&nbsp;
                                                                            <input type="text" value="{{$company->tin4}}" size="5" name="frm1601c:txtBranchCode" maxlength="3" id="frm1601c:txtBranchCode" onkeypress="return letternumber(event)" disabled />
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="150" valign="top" class="tblFormTd">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="80"><font size="2" style="font-weight:bold">&nbsp;7&nbsp;&nbsp;&nbsp;</font><font size="1" style='font-size: 11px'>RDO Code&nbsp;</font></td>
                                                                    <td id="rdoSelect">
                                                                        <select class='iceSelOneMnu' id='frm1601c:txtRDOCode' name='frm1601c:txtRDOCode' size='1' disabled >
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
                                                <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td width="80%" valign="top" class="tblFormTd">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td>
                                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td width="11"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;&nbsp;&nbsp;</font></td>
                                                                                <td><font size="1" style='font-size: 11px'>Withholding Agent's Name <i>(Last Name, First Name, Middle Name for Individual OR Registered Name for Non-Individual)</i></font></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td width="25">&nbsp;</td>
                                                                                <td><input type="text" value="{{$company->registered_name != '' ? $company->registered_name : $company->lastname.','. $company->firstname.' '.$company->middlename }}" size="120" name="frm1601c:txtTaxpayerName" maxlength="50" id="frm1601c:txtTaxpayerName" onblur="return capital(this, event)" disabled /></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <!--former position of contact number -->
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td width="80%" valign="top" class="tblFormTd" colspan="2">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td>
                                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td width="11"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;&nbsp;&nbsp;</font></td>
                                                                                <td><font size="1" style='font-size: 11px'>Registered Address </font><font style="font-size:8px"><i>(Indicate complete address. If branch, indicate the branch address. If the registered address is different from the current address, go to the RDO to update registered address by using BIR Form No. 1905)</i></font></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td width="25">&nbsp;</td>
                                                                                <td><input type="text" value="{{$company->address}}" size="120" name="frm1601c:txtAddress" maxlength="100" id="frm1601c:txtAddress" onblur="return capital(this, event)" disabled /></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="580" valign="top" class="tblFormTd">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                        <td width="25">&nbsp;</td>
                                                                    <td>
                                                                            <input type="text" value="" size="100" name="frm1601c:txtAddress2" maxlength="50" id="frm1601c:txtAddress2" onblur="return capital(this, event)" disabled="true" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="140" class="tblFormTd">
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td>
                                                                        <font size="2" style="font-weight:bold;">&nbsp;9A&nbsp;&nbsp;&nbsp;</font><font size="1" style='font-size: 11px'>Zip
                                                                            Code</font>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <input type="text" value="{{$company->zip_code}}" size="2" name="frm1601c:txtZipCode" maxlength="12" id="frm1601c:txtZipCode" onkeypress="return wholenumber(this, event)" disabled="true" />
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
                                                <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <td width="40%" class="tblFormTd">
                                                        <table width="320" border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td width="118">
                                                                    <font size="2" style="font-weight:bold;">&nbsp;10&nbsp;&nbsp;&nbsp;</font><font size="1" style='font-size: 11px'>Contact
                                                                        Number</font></td>
                                                                <td>
                                                                    <input type="text" value="{{$company->tel_number}}" size="28" name="frm1601c:txtTelNum" maxlength="20" id="frm1601c:txtTelNum" onkeypress="return wholenumber(this, event)" disabled />
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td width="60%" class="tblFormTd">
                                                        <table width="400" border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td width="200">
                                                                    <font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font><font size="1" style='font-size: 11px'>Category
                                                                        of Withholding Agent</font>
                                                                </td>
                                                                <td>
                                                                    <div align="left">
                                                                        <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:180px;" id="frm1601c:j_id392" class="iceSelOneRb fieldText1">
                                                                            <div align="center" style="padding: 5px 0 5px 0;">
                                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                        @if($action == 'new')
                                                                                            <td><input type="radio" value="P" name="frm1601c:CatAgent" id="frm1601c:CatAgent_P" onclick="" /><label for="frm1601c:CatAgent_P" style="font-size:11px;" >Private</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                            <td><input type="radio" value="G" name="frm1601c:CatAgent" id="frm1601c:CatAgent_G" onclick="" /><label for="frm1601c:CatAgent_G" style="font-size:11px;" >Government</label></td>
                                                                                        @else
                                                                                            <td><input type="radio" value="P" {{$data->item11 == 'P' ? 'checked' : ''}} name="frm1601c:CatAgent" id="frm1601c:CatAgent_P" onclick="" /><label for="frm1601c:CatAgent_P" style="font-size:11px;" >Private</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                            <td><input type="radio" value="G" {{$data->item11 == 'G' ? 'checked' : ''}} name="frm1601c:CatAgent" id="frm1601c:CatAgent_G" onclick="" /><label for="frm1601c:CatAgent_G" style="font-size:11px;" >Government</label></td>
                                                                                        @endif
                                                                                            
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
                                            <td>
                                                <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                        <td class="tblFormTd">
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;12&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>Email Address</font></td>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->email_address}}" size="103" name="txtEmail" maxlength="60" id="txtEmail" disabled /></td>
                                                            </tr>
                                                        </table>
                                                        </td>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="800">
                                                    <tr>
                                                        <td class="tblFormTd" valign="top" width="750">
                                                            <table width="750" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td width="300"><font size="2" style="font-weight:bold;">&nbsp;13&nbsp;</font><font size="1" style='font-size: 11px'>Are there payees availing of tax relief under <br> Special Law or International Tax Treaty?</font>
                                                                    </td>
                                                                    <td width="150">
                                                                        <div>
                                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:150px" id="frm1601c:j_id398" class="iceSelOneRb-dis fieldText1-dis">
                                                                                <div align="center" style="padding: 5px 0 5px 0;">
                                                                                    <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                @if($action == 'new')
                                                                                                    <td><input type="radio" value="Y" name="frm1601c:SpecialTax" id="frm1601c:SpecialTax_1"  onclick="enableSelTreaty()" /><label for="frm1601c:SpecialTax_1" style="font-size:11px;" >Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                    <td><input type="radio" value="N" name="frm1601c:SpecialTax" id="frm1601c:SpecialTax_2"  onclick="disableSelTreaty()" checked="checked" /><label for="frm1601c:SpecialTax_2" style="font-size:11px;" >No</label></td>
                                                                                                @else
                                                                                                    <td><input type="radio" value="Y" {{$data->item13 == 'Y' ? 'checked' : ''}} name="frm1601c:SpecialTax" id="frm1601c:SpecialTax_1"  onclick="enableSelTreaty()" /><label for="frm1601c:SpecialTax_1" style="font-size:11px;" >Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                    <td><input type="radio" value="N" {{$data->item13 == 'N' ? 'checked' : ''}} name="frm1601c:SpecialTax" id="frm1601c:SpecialTax_2"  onclick="disableSelTreaty()" /><label for="frm1601c:SpecialTax_2" style="font-size:11px;" >No</label></td>
                                                                                                @endif
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </fieldset>
                                                                        </div>
                                                                    </td>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td width="300">
                                                                        <font size="2" style="font-weight:bold;">&nbsp;13A&nbsp;</font>
                                                                        <label id="frm1601c:j_id401" class="iceOutLbl fieldLabel1">If yes, specify</label>
                                                                        <select style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; background-color: rgb(220, 220, 220);" size="1" name="frm1601c:selTreaty" id="frm1601c:selTreaty" disabled >
                                                                            @if($action == 'new')
                                                                                <option value="0" selected="selected"> </option>
                                                                                <option value="1">Special Rate</option>
                                                                                <option value="2">International Tax Treaty</option>
                                                                                <option value="3">Both</option>
                                                                            @else
                                                                                <option value="0" {{$data->item13A == 0 ? 'selected' : ''}}> </option>
                                                                                <option value="1" {{$data->item13A == 1 ? 'selected' : ''}}>Special Rate</option>
                                                                                <option value="2" {{$data->item13A == 2 ? 'selected' : ''}}>International Tax Treaty</option>
                                                                                <option value="3" {{$data->item13A == 3 ? 'selected' : ''}}>Both</option>
                                                                            @endif
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
                                                <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                            <table width="" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="100%">
                                                                        <div align="center"><font size="2" style="font-weight:bold;">PART II - COMPUTATION OF TAX</font></div>
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
                                                            <table width="740" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="26"><font size="2" style="font-weight:bold;">&nbsp;14&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td width="426"><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Total Amount of Compensation </font></td>
                                                                    <td width="94">
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td width="193">
                                                                        <span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">14</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item14}}" style="text-align: right;" size="20" name="frm1601c:txtTax14" maxlength="25" id="frm1601c:txtTax14" onblur="round(this,2);computeTxt22();" onkeypress="return numbersonly(this, event)" />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Less: Non-Taxable/Exempt Compensation </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;15&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Statutory Minimum Wage for Minimum Wage Earners (MWEs) </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">15</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item15}}" style="text-align: right;" size="20" name="frm1601c:txtTax15" maxlength="25" id="frm1601c:txtTax15" onblur="round(this,2);computeTxt21();" onkeypress="return numbersonly(this, event)" />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;16&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Holiday Pay, Overtime Pay, Night Shift Differential Pay, Hazard Pay (for MWEs only) </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">16</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item16}}" style="text-align: right;" size="20" name="frm1601c:txtTax16" maxlength="25" id="frm1601c:txtTax16" onblur="round(this,2);computeTxt21();" onkeypress="return numbersonly(this, event)" />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;17&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1">&nbsp;</font><font size="1" style="font-size: 11px;" face="Arial, Helvetica, sans-serif">13th Month Pay and Other Benefits </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">17</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item17}}" style="text-align: right;" size="20" name="frm1601c:txtTax17" maxlength="25" id="frm1601c:txtTax17" onblur="round(this,2);computeTxt21();" onkeypress="return numbersonly(this, event)" />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">De Minimis Benefits </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">18</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item18}}" style="text-align: right;" size="20" name="frm1601c:txtTax18" maxlength="25" id="frm1601c:txtTax18" onblur="round(this,2);computeTxt21();" onkeypress="return numbersonly(this, event)" />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">SSS, GSIS, PHIC, HDMF Mandatory Contributions & Union Dues (employee's share only) </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">19</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item19}}" style="text-align: right;" size="20" name="frm1601c:txtTax19" maxlength="25" id="frm1601c:txtTax19" onblur="round(this,2);computeTxt21();" onkeypress="return numbersonly(this, event)" />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Other Non-Taxable Compensation (specify) </font>
                                                                        <input type="text" value="{{$action == 'new' ? '' : $data->item20_other}}" maxlength="25" size="20" id="frm1601c:txt20Other" name="frm1601c:txt20Other" />
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">20</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item20}}" style="text-align: right;" size="20" name="frm1601c:txtTax20" maxlength="25" id="frm1601c:txtTax20" onblur="round(this,2);computeTxt21();" onkeypress="return numbersonly(this, event)" />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Total Non-Taxable Compensation (Sum of Items 15 to 20) </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">21</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item21}}" style="text-align: right;" size="20" name="frm1601c:txtTax21" maxlength="25" id="frm1601c:txtTax21" disabled />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;22&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Total Taxable Compensation (Item 14 Less Item 21) </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">22</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item22}}" style="text-align: right;" size="20" name="frm1601c:txtTax22" maxlength="25" id="frm1601c:txtTax22" disabled />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;23&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Less: Taxable compensation not subject to withholding tax </font><font style="font-size: 11px;">(for employees, other than MWEs, receiving P250,000 & below for the year) </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">23</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item23}}" style="text-align: right;" size="20" name="frm1601c:txtTax23" maxlength="25" id="frm1601c:txtTax23" onblur="round(this,2);computeTxt24();" onkeypress="return numbersonly(this, event)" />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;24&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Net Taxable Compensation (Item 22 Less Item 23) </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">24</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item24}}" style="text-align: right;" size="20" name="frm1601c:txtTax24" maxlength="25" id="frm1601c:txtTax24" disabled />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;25&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Total Taxes Withheld </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">25</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item25}}" style="text-align: right;" size="20" name="frm1601c:txtTax25" maxlength="25" id="frm1601c:txtTax25" onblur="round(this,2);computeTxt27();" onkeypress="return numbersonly(this, event)" />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;26&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Add/(Less): Adjustment of Taxes Withheld from Previous Month/s <a href="javascript:void(0)" id="btnNavigatePage2_1" class="xsmallItalic"  onclick="processNext()">(From Part IV-Schedule 1, Item 4) </a></font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">26</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item26}}" style="text-align: right;" size="20" name="frm1601c:txtTax26" maxlength="25" id="frm1601c:txtTax26" disabled />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;27&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Taxes Withheld for Remittance (Sum of Items 25 and 26) </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">27</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item27}}" style="text-align: right;" size="20" name="frm1601c:txtTax27" maxlength="25" id="frm1601c:txtTax27" disabled />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;28&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Less: Tax Remitted in Return Previously Filed, if this is an amended return </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">28</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item28}}" style="text-align: right;" size="20" name="frm1601c:txtTax28" maxlength="25" id="frm1601c:txtTax28" onblur="round(this,2);computeTxt30();" onkeypress="return numbersonly(this, event)" disabled />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;29&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Other Remittances Made (specify) </font>
                                                                        <input type="text" value="{{$action == 'new' ? '' : $data->item29_other}}" maxlength="25" size="20" id="frm1601c:txt29Other" name="frm1601c:txt29Other" />
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">29</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item29}}" style="text-align: right;" size="20" name="frm1601c:txtTax29" maxlength="25" id="frm1601c:txtTax29" onblur="round(this,2);computeTxt30();" onkeypress="return numbersonly(this, event)" />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;30&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Total Tax Remittances Made (Sum of Items 28 and 29) </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">30</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item30}}" style="text-align: right;" size="20" name="frm1601c:txtTax30" maxlength="25" id="frm1601c:txtTax30" disabled />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;31&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style='font-size: 11px' style="font-weight:bold;" face="Arial, Helvetica, sans-serif">Tax Still Due</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">/(Over-remittance) (Item 27 Less Item 30) </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">31</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item31}}" style="background-color: rgb(220, 220, 220);text-align: right;" size="20" name="frm1601c:txtTax31" maxlength="25" id="frm1601c:txtTax31" disabled />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>
                                                                        <table width="400" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td width="100">
                                                                                    <font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Add: Penalties </font>
                                                                                </td>
                                                                                <td>
                                                                                    <font size="2" style="font-weight:bold;">&nbsp;32&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif"> Surcharge</font>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                    <td>
                                                                        <span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">32</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item32}}" style="color: black; text-align: right;" size="20" name="frm1601c:txtTax32" maxlength="25" id="frm1601c:txtTax32" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>
                                                                        <table width="400" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td width="100">&nbsp;</td>
                                                                                <td>
                                                                                    <font size="2" style="font-weight:bold;">&nbsp;33&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Interest</font>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                    <td>
                                                                        <span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">33</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item33}}" style="color: black; text-align: right;" size="20" name="frm1601c:txtTax33" maxlength="25" id="frm1601c:txtTax33" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>
                                                                        <table width="400" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td width="100">&nbsp;</td>
                                                                                <td>
                                                                                    <font size="2" style="font-weight:bold;">&nbsp;34&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Compromise</font>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                    <td>
                                                                        <span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">34</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item34}}" style="color: black; text-align: right;" size="20" name="frm1601c:txtTax34" maxlength="25" id="frm1601c:txtTax34" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>
                                                                        <table width="400" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td width="100">&nbsp;</td>
                                                                                <td>
                                                                                    <font size="2" style="font-weight:bold;">&nbsp;35&nbsp;</font><font size="1" style='font-size: 11px' face="Arial, Helvetica, sans-serif">Total Penalties (Sum of Items 32 to 34)</font>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                    <td>
                                                                        <span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">35</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item35}}" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" maxlength="25" id="frm1601c:txtTax35" name="frm1601c:txtTax35" disabled />
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;36&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style='font-size: 11px'>&nbsp;</font><font size="1" style="font-weight:bold;" face="Arial, Helvetica, sans-serif">TOTAL AMOUNT STILL DUE</font><font size="1" face="Arial, Helvetica, sans-serif">/(Over-remittance) (Sum of Items 31 and 35) </font>
                                                                    </td>
                                                                    <td>
                                                                        <div class="spacePadder">                                                    </div>
                                                                    </td>
                                                                    <td><span class="spacePadder">
                                                                            <font size="2" style="font-weight:bold;">36</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item36}}" style="background-color: rgb(220, 220, 220);text-align: right;" size="20" name="frm1601c:txtTax36" maxlength="25" id="frm1601c:txtTax36" disabled />
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
                                                <table width="800" border="1" cellspacing="0" cellpadding="0" style="font-family:arial; font-size:10px; text-align: center; vertical-align: top; table-layout: fixed;">
                                                <col width="25%" />
                                                <col width="25%" />
                                                <col width="25%" />
                                                <col width="25%" />
                                                <!--<col width="32%" />-->
                                                <tr>
                                                    <td colspan="4" style="text-align: left; ">&nbsp;&nbsp;&nbsp;&nbsp;I/We declare under the penalties of perjury that this remittance return, and all its attachments, have been made in good faith, verified by me/us, and to the best of my/our knowledge and belief, is 
                                                        true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof. Further, I give my consent to the processing of my information as contemplated under the *Data Privacy Act of 2012 (R.A. No. 10173) 
                                                        for legitimate and lawful purposes. (If Authorized Representative, attach authorization letter)<br></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="text-align: left; ">For Individual:
                                                        <br><br>
                                                    </td>
                                                    <td colspan="2" style="text-align: left; ">For Non-Individual:
                                                        <br><br></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Signature over Printed Name of Taxpayer/Authorized Representative/Tax Agent<br>
                                                        (Indicate Title/Designation and TIN)</td>
                                                    <td colspan="2">Signature over Printed Name of President/Vice President/ <br>
                                                        Authorized Officer or Representative/Tax Agent <font style="font-size: 8px;">(Indicate Title/Designation and TIN)</font></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    Tax Agent Accreditation No./ <br>
                                                                    Attorney's Roll No. (If applicable)
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="" id="txtTaxAgentNo" size="25" maxlength="20" disabled="true" >
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    Date of Issue <br>
                                                                    (MM/DD/YYYY)
                                                                </td>
                                                                <td>
                                                                    <input type="text" style="width: 140px" value="" id="txtDateIssue" maxlength="10" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" >
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    Date of Expiry <br>
                                                                    (MM/DD/YYYY)
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="" style="width: 140px" id="txtDateExpiry" maxlength="10" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" />
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </table>
                                                <!--</div>-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                            <table width="" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="100%">
                                                                        <div align="center"><font size="2" style="font-weight:bold;">PART III - DETAILS OF PAYMENT</font></div>
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
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;37&nbsp;&nbsp;&nbsp;</font><font size="1">Cash/Bank Debit Memo </font></td>
                                                                    <td align="center"><input type="text" value="" size="20" name="frm1601c:txtAgency37" maxlength="50" id="frm1601c:txtAgency37" disabled  /></td>
                                                                    <td align="center"><input type="text" value="" size="20" name="frm1601c:txtNumber37" maxlength="50" id="frm1601c:txtNumber37" disabled  /></td>
                                                                    <td align="center"><input type="text" value="" size="20" name="frm1601c:txtDate37" maxlength="10" id="frm1601c:txtDate37" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled /></td>
                                                                    <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1601c:txtAmount37" maxlength="50" id="frm1601c:txtAmount37" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;38&nbsp;&nbsp;&nbsp;</font><font size="1">Check </font></td>
                                                                    <td align="center"><input type="text" value="" size="20" name="frm1601c:txtAgency38" maxlength="50" id="frm1601c:txtAgency38" disabled="true" /></td>
                                                                    <td align="center"><input type="text" value="" size="20" name="frm1601c:txtNumber38" maxlength="50" id="frm1601c:txtNumber38" disabled="true" /></td>
                                                                    <td align="center"><input type="text" value="" size="20" name="frm1601c:txtDate38" maxlength="10" id="frm1601c:txtDate38" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled /></td>
                                                                    <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1601c:txtAmount38" maxlength="50" id="frm1601c:txtAmount38" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"><font size="2" style="font-weight:bold;">&nbsp;39&nbsp;&nbsp;&nbsp;</font><font size="1">Tax Debit Memo </font></td>
                                                                    <td align="center"><input type="text" value="" size="20" name="frm1601c:txtNumber39" maxlength="50" id="frm1601c:txtNumber39" disabled="true" /></td>
                                                                    <td align="center"><input type="text" value="" size="20" name="frm1601c:txtDate39" maxlength="10" id="frm1601c:txtDate39" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled /></td>
                                                                    <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1601c:txtAmount39" maxlength="50" id="frm1601c:txtAmount39" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5"><font size="2" style="font-weight:bold;">&nbsp;40&nbsp;&nbsp;&nbsp;</font><font size="1">Others (specify below) </font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" value="" size="20" name="frm1601c:txtParticular40" maxlength="50" id="frm1601c:txtParticular40" disabled="true" /></td>
                                                                    <td align="center"><input type="text" value="" size="20" name="frm1601c:txtAgency40" maxlength="50" id="frm1601c:txtAgency40" disabled="true" /></td>
                                                                    <td align="center"><input type="text" value="" size="20" name="frm1601c:txtNumber40" maxlength="50" id="frm1601c:txtNumber40" disabled="true" /></td>
                                                                    <td align="center"><input type="text" value="" size="20" name="frm1601c:txtDate40" maxlength="10" id="frm1601c:txtDate40" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled /></td>
                                                                    <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1601c:txtAmount40" maxlength="50" id="frm1601c:txtAmount40" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--<div class="imgClass" align='center' style="width:800px !important;">-->
                                                <table border="1" width="800" cellspacing="0" cellpadding="0" style="font-size:10px; text-align: left; vertical-align: top;">
                                                <tr>
                                                    <td width="57%">Machine Validation/Revenue Official Receipt Details (If not filed with an Authorized Agent Bank)<br /><br /><br /></td>
                                                    <td width="43%">Stamp of Receiving Office/AAB and Date of Receipt (RO's Signature/Bank Teller's Initial)<br /><br /><br /></td>
                                                </tr>
                                                </table>
                                                <!--</div>-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>
                                                    <font style="font-size:8px; font-weight:bold;">*NOTE: </font>
                                                    <font style="font-size:8px;"> Please read the BIR Data Privacy Policy found in the BIR website (www.bir.gov.ph)
                                                        </font>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div id="Page2Content" style="display:none;">
                                    <table width="800" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td>
                                                <table width="800" border="1" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="120" valign="middle" style="text-align: center;">
                                                            <label face="Arial" size="1px">BIR Form No.</label>
                                                            <br/><font size="5px" style="font-weight:bold;">1601-C</font>
                                                            <br/><label face="Arial" size="1px">January 2018 (ENCS)</label>
                                                            <br/><label face="Arial" size="1px" style="font-weight:bold;">Page 2</label>
                                                        </td>
                                                        <td width="0" valign="center" style="text-align: center;">
                                                            <font size="5px" style="font-weight:bold;">Monthly Remittance Return</font>
                                                            <br/><font size="4px" style="font-weight:bold;">of Income Taxes Withheld on Compensation</font>
                                                        </td>
                                                        <td width="200" valign="center">
                                                                <p><img src="{{ asset('images/Bar Codes/1601C_p2.png') }}" width="220" height="75px" /> </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td width="40%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">TIN</font></td>
                                                        <td width="60%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Withholding Agent's Name(Last Name for Individual OR Registered Name for Non-Individual)</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{$company->tin1}}" size="3" name="frm1601c:txtPg2TIN1" maxlength="3" id="frm1601c:txtPg2TIN1" onkeypress="return wholenumber(this, event)" disabled />
                                                                <input type="text" value="{{$company->tin2}}" size="3" name="frm1601c:txtPg2TIN2" maxlength="3" id="frm1601c:txtPg2TIN2" onkeypress="return wholenumber(this, event)" disabled />
                                                                <input type="text" value="{{$company->tin3}}" size="3" name="frm1601c:txtPg2TIN3" maxlength="3" id="frm1601c:txtPg2TIN3" onkeypress="return wholenumber(this, event)" disabled />
                                                                <input type="text" value="{{$company->tin4}}" size="5" name="frm1601c:txtPg2BranchCode" maxlength="5" id="frm1601c:txtPg2BranchCode" onkeypress="return letternumber(event)" disabled />
                                                            </font>
                                                        </td>
                                                        <td><input type="text" value="{{$company->registered_name}}" size="80" name="frm1601c:txtPg2TaxpayerName" maxlength="50" id="frm1601c:txtPg2TaxpayerName" onblur="return capital(this, event)" disabled /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                            <table width="" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="100%">
                                                                        <div align="center"><font size="2" style="font-weight:bold;">PART IV - SCHEDULE </font></div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                <div><font size="1" style="font-weight:bold;">Schedule I </font><font size= "1" style="font-size: 11px;">- Adjustment of Taxes Withheld on Compensation from Previous Months (attach additional sheet/s, if necessary)</font></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <thead>
                                                        <tr>
                                                            <th width="20%" align="center" class="text-center" colspan="2"><label size="1" face="Arial, Helvetica, sans-serif">Previous Month/s <br> (MM/YYYY) <br> 1 </label></th>
                                                            <th width="20%" align="center" class="text-center"><label size="1" face="Arial, Helvetica, sans-serif">Date Paid <br> (MM/DD/YYYY) <br> 2 </label></th>
                                                            <th width="20%" align="center" class="text-center"><label size="1" face="Arial, Helvetica, sans-serif">Drawee Bank/Bank <br> Code/Agency <br> 3 </label></th>
                                                            <th width="20%" align="center" class="text-center"><label size="1" face="Arial, Helvetica, sans-serif">Number <br> 4 </label></th>
                                                            <th width="20%" align="center" class="text-center"><label size="1" face="Arial, Helvetica, sans-serif">Tax Paid (Excluding Penalties for the Month) <br> 5 </label></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tblSched1a">
                                                       
                                                        @if($action == 'new' || $action != 'new' && count($schedules) == "0")
                                                            <tr>
                                                                <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkScheduleDelete0" name="chkScheduleDelete0"></font></td>
                                                                <td width="18%" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15"  maxlength="7" id="frm1601c:sched1:txtMonthYear0" name="frm1601c:sched1:txtMonthYear[]" onkeypress="return dateOnly(this, event)" onkeydown="dateMaskingMonthYear(this);" onblur="validateMonthYear(this);" tabindex="1"/></td>
                                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="10" id="frm1601c:sched1:txtDatePaid0" name="frm1601c:sched1:txtDatePaid[]" onkeypress="return dateOnly(this, event)" onkeydown="dateMasking(this);" onblur="validateDate(this);" tabindex="2" /></td>
                                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="20" id="frm1601c:sched1:txtBankCode0" name="frm1601c:sched1:txtBankCode[]" onkeypress="return letternumber(event)" tabindex="3" /></td>
                                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="20" id="frm1601c:sched1:txtNumber0" name="frm1601c:sched1:txtNumber[]" onkeypress="return letternumber(event)" tabindex="4" /></td>
                                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1601c:sched1:txtTaxPaid0" name="frm1601c:sched1:txtTaxPaid[]" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSchedule1();" tabindex="5" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkScheduleDelete1"></font></td>
                                                                <td width="18%" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15"  maxlength="7" id="frm1601c:sched1:txtMonthYear1" name="frm1601c:sched1:txtMonthYear[]" onkeypress="return dateOnly(this, event)" onkeydown="dateMaskingMonthYear(this);" onblur="validateMonthYear(this);" tabindex="8"/></td>
                                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="10" id="frm1601c:sched1:txtDatePaid1" name="frm1601c:sched1:txtDatePaid[]" onkeypress="return dateOnly(this, event)" onkeydown="dateMasking(this);" onblur="validateDate(this);" tabindex="9" /></td>
                                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="20" id="frm1601c:sched1:txtBankCode1" name="frm1601c:sched1:txtBankCode[]" onkeypress="return letternumber(event)" tabindex="10" /></td>
                                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="20" id="frm1601c:sched1:txtNumber1"  name="frm1601c:sched1:txtNumber[]" onkeypress="return letternumber(event)" tabindex="11" /></td>
                                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1601c:sched1:txtTaxPaid1" name="frm1601c:sched1:txtTaxPaid[]" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSchedule1();" tabindex="12" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkScheduleDelete2"></font></td>
                                                                <td width="18%" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15"  maxlength="7" id="frm1601c:sched1:txtMonthYear2" name="frm1601c:sched1:txtMonthYear[]" onkeypress="return dateOnly(this, event)" onkeydown="dateMaskingMonthYear(this);" onblur="validateMonthYear(this);" tabindex="15"/></td>
                                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="10" id="frm1601c:sched1:txtDatePaid2" name="frm1601c:sched1:txtDatePaid[]" onkeypress="return dateOnly(this, event)" onkeydown="dateMasking(this);" onblur="validateDate(this);" tabindex="16" /></td>
                                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="20" id="frm1601c:sched1:txtBankCode2" name="frm1601c:sched1:txtBankCode[]" onkeypress="return letternumber(event)" tabindex="17" /></td>
                                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="20" id="frm1601c:sched1:txtNumber2" name="frm1601c:sched1:txtNumber[]" onkeypress="return letternumber(event)" tabindex="18" /></td>
                                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1601c:sched1:txtTaxPaid2" name="frm1601c:sched1:txtTaxPaid[]" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSchedule1();" tabindex="19" /></td>
                                                            </tr>
                                                        @else
                                                           @for($i=0; $i< count($schedules) ; $i++)
                                                                <tr>
                                                                    <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkScheduleDelete{{$i}}" name="chkScheduleDelete{{$i}}"></font></td>
                                                                    <td width="18%" align="center"><input type="text" value="{{$schedules[$i]->previous}}" style="color: black; text-align: right;" size="15"  maxlength="7" id="frm1601c:sched1:txtMonthYear{{$i}}" name="frm1601c:sched1:txtMonthYear[]" onkeypress="return dateOnly(this, event)" onkeydown="dateMaskingMonthYear(this);" onblur="validateMonthYear(this);" tabindex="1"/></td>
                                                                    <td align="center"><input type="text" value="{{$schedules[$i]->paid}}" style="color: black; text-align: right;" size="20" maxlength="10" id="frm1601c:sched1:txtDatePaid{{$i}}" name="frm1601c:sched1:txtDatePaid[]" onkeypress="return dateOnly(this, event)" onkeydown="dateMasking(this);" onblur="validateDate(this);" tabindex="2" /></td>
                                                                    <td align="center"><input type="text" value="{{$schedules[$i]->code}}" style="color: black; text-align: right;" size="20" maxlength="20" id="frm1601c:sched1:txtBankCode{{$i}}" name="frm1601c:sched1:txtBankCode[]" onkeypress="return letternumber(event)" tabindex="3" /></td>
                                                                    <td align="center"><input type="text" value="{{$schedules[$i]->number}}" style="color: black; text-align: right;" size="20" maxlength="20" id="frm1601c:sched1:txtNumber{{$i}}" name="frm1601c:sched1:txtNumber[]" onkeypress="return letternumber(event)" tabindex="4" /></td>
                                                                    <td align="center"><input type="text" value="{{$schedules[$i]->tax_paid}}" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1601c:sched1:txtTaxPaid{{$i}}" name="frm1601c:sched1:txtTaxPaid[]" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSchedule1();" tabindex="5" /></td>
                                                                </tr>
                                                           @endfor
                                                           @if(count($schedules) != "0")
                                                                @for($i=0; $i< 3 - count($schedules) ; $i++)
                                                                    <tr>
                                                                        <td width="2%"><font class="font" style="font-weight:bold"><input type='checkbox'  id="chkScheduleDelete{{ count($schedules) + $i }}" name="chkScheduleDelete{{ count($schedules) + $i }}" value="true"></font></td>
                                                                        <td width="18%" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15"  maxlength="7" id="frm1601c:sched1:txtMonthYear{{ count($schedules) + $i }}" name="frm1601c:sched1:txtMonthYear[]" onkeypress="return dateOnly(this, event)" onkeydown="dateMaskingMonthYear(this);" onblur="validateMonthYear(this);" tabindex="15"/></td>
                                                                        <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="10" id="frm1601c:sched1:txtDatePaid{{ count($schedules) + $i }}" name="frm1601c:sched1:txtDatePaid[]" onkeypress="return dateOnly(this, event)" onkeydown="dateMasking(this);" onblur="validateDate(this);" tabindex="16" /></td>
                                                                        <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="20" id="frm1601c:sched1:txtBankCode{{ count($schedules) + $i }}" name="frm1601c:sched1:txtBankCode[]" onkeypress="return letternumber(event)" tabindex="17" /></td>
                                                                        <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="20" id="frm1601c:sched1:txtNumber{{ count($schedules) + $i }}" name="frm1601c:sched1:txtNumber[]" onkeypress="return letternumber(event)" tabindex="18" /></td>
                                                                        <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1601c:sched1:txtTaxPaid{{ count($schedules) + $i }}" name="frm1601c:sched1:txtTaxPaid[]" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSchedule1();" tabindex="19" /></td>
                                                                    </tr>
                                                                @endfor
                                                           @endif
                                                        @endif
                                                    </tbody>
                                                </table>
                                                <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <thead>
                                                        <tr>
                                                            <th width="50%" align="center" class="text-center" colspan="2"><label size="1" face="Arial, Helvetica, sans-serif">Should be Tax Due for the Month <br> 6 </label></th>
                                                            <th width="50%" align="center" class="text-center"><label size="1" face="Arial, Helvetica, sans-serif">Adjustments <br> 7=(6 less 5) </label></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tblSched1b">
                                                        @if($action == 'new' || $action != 'new' && count($schedules) == "0")
                                                        <tr>
                                                            <td width="2%" class="text-center"><font size="1" style="font-weight:bold">1</font></td>
                                                            <td width="48%" align="center"><input onblur="round(this,2);computeSchedule1();" type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm1601c:sched1:txtShouldTaxDue0" name="frm1601c:sched1:txtShouldTaxDue[]" onkeypress="return numbersonly(this, event)"  tabindex="6" /></td>
                                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm1601c:sched1:txtAdjustments0" name="frm1601c:sched1:txtAdjustments[]" disabled  tabindex="7" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%" class="text-center"><font size="1" style="font-weight:bold">2</font></td>
                                                            <td width="48%" align="center"><input onblur="round(this,2);computeSchedule1();" type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm1601c:sched1:txtShouldTaxDue1" name="frm1601c:sched1:txtShouldTaxDue[]" onkeypress="return numbersonly(this, event)"  tabindex="13" /></td>
                                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm1601c:sched1:txtAdjustments1" name="frm1601c:sched1:txtAdjustments[]" disabled tabindex="14" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%" class="text-center"><font size="1" style="font-weight:bold">3</font></td>
                                                            <td width="48%" align="center"><input onblur="round(this,2);computeSchedule1();" type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm1601c:sched1:txtShouldTaxDue2" name="frm1601c:sched1:txtShouldTaxDue[]" onkeypress="return numbersonly(this, event)"  tabindex="20" /></td>
                                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm1601c:sched1:txtAdjustments2" name="frm1601c:sched1:txtAdjustments[]" disabled tabindex="21" /></td>
                                                        </tr>
                                                        @else
                                                            @for($i=0; $i< count($schedules) ; $i++)
                                                                <tr>
                                                                    <td width="2%" class="text-center"><font size="1" style="font-weight:bold">{{$i + 1}}</font></td>
                                                                    <td width="48%" align="center"><input onblur="round(this,2);computeSchedule1();" type="text" value="{{$schedules[$i]->tax_due}}" style="color: black; text-align: right;" size="21" maxlength="25" id="frm1601c:sched1:txtShouldTaxDue{{$i}}" name="frm1601c:sched1:txtShouldTaxDue[]" onkeypress="return numbersonly(this, event)"  tabindex="6" /></td>
                                                                    <td align="center"><input type="text" value="{{$schedules[$i]->adjustment}}" style="color: black; text-align: right;" size="21" maxlength="25" id="frm1601c:sched1:txtAdjustments{{$i}}" name="frm1601c:sched1:txtAdjustments[]" disabled  tabindex="7" /></td>
                                                                </tr>
                                                           @endfor
                                                           @if(count($schedules) != "0")
                                                                @for($i=0; $i< 3 - count($schedules) ; $i++)
                                                                    <tr>
                                                                        <td width="2%" class="text-center"><font size="1" style="font-weight:bold">{{$i + count($schedules) + 1}}</font></td>
                                                                        <td width="48%" align="center"><input onblur="round(this,2);computeSchedule1();" type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm1601c:sched1:txtShouldTaxDue{{ count($schedules) + $i }}" name="frm1601c:sched1:txtShouldTaxDue[]" onkeypress="return numbersonly(this, event)"  tabindex="6" /></td>
                                                                        <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm1601c:sched1:txtAdjustments{{ count($schedules) + $i }}" name="frm1601c:sched1:txtAdjustments[]" disabled  tabindex="7" /></td>
                                                                    </tr>
                                                                @endfor
                                                           @endif
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="100%" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td>
                                                            <table width="800" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="16"><font size="1" style="font-weight:bold">&nbsp;</font></td>
                                                                    <td width="384"><font size="1">&nbsp;</font><font size="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Adjustment (Sum of Items 1 to 3) <a href="javascript:void(0)" id="btnNavigatePage1_1" class="xsmallItalic"  onclick="processPrev()">(To Part II, Item 26) </a></font></td>
                                                                    <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm1601c:sched1:txtTotal1" name="frm1601c:sched1:txtTotal1" disabled /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">
                                                            <input class="printButtonClass" type="button" value="Add" style="width: 100px;" name="frm1601c:btnAdd" id="frm1601c:btnAdd" onclick="addSchedule()" />&nbsp;&nbsp;&nbsp;
                                                            <input class="printButtonClass" type="button" value="Delete" style="width: 100px;" name="frm1601c:btnDelete" id="frm1601c:btnDelete" onclick="deleteSchedule()" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="smallSubtitle" align="center">Guidelines and Instructions for BIR Form No. 1601-C [January 2018(ENCS)]</div>
                                            <div class="smallSubtitle" align="center">Monthly Remittance Return of Income Taxes Withheld on Compensation</div>
                                                <br />
                                                <table id="inserted" width="800">
                                                    <tr>
                                                        <td class="firstcol">
                                                            <dt>Who Shall File </dt>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;; font-size: 11px; line-height: 10px;">This monthly remittance return shall be filed in triplicate by every 
                        withholding agent (WA)/payor required to deduct and withhold taxes on compensation 
                        paid to employees.</p>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;"> If the person required to withhold and pay/remit the tax is a corporation, 
                        the return shall be made in the name of the corporation and shall be signed and 
                        verified by the president, vice-president, or any authorized officer.</p>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;">If the Government of the Philippines or any of its agencies, political 
                        subdivisions or instrumentalities, or a government-owned or controlled corporation, 
                        is the withholding agent/payor, the return shall be accomplished and signed by the 
                        officer or employee having control of disbursement of income payments or other 
                        officer or employee appropriately designated for the purpose.</p>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;">With respect to a fiduciary, the return shall be made in the name of the
                        individual, estate or trust for which such fiduciary acts and shall be signed and
                        verified by such fiduciary. In case of two or more joint fiduciaries, the return
                        shall be signed and verified by one of such fiduciaries.
                        </p>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;">Authorized Representative and Accredited Tax Agent filing, in behalf of 
                        the taxpayer, shall also use this return to pay/remit the creditable taxes withheld.
                        </p>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;">In the case of hazardous employment, the employer in the private sector 
                        shall attach to BIR Form No. 1601-C, for return periods March, June, September and 
                        December a copy of the list submitted to the Department of Labor & Employment 
                        Regional/Provincial Offices–Operations Division/Unit.  The list shall show the names 
                        of the Minimum Wage Earners who received the hazard pay, period of employment, amount 
                        of hazard pay per month and justification for payment of hazard pay as certified by 
                        said DOLE/allied agency that the hazard pay is justifiable.  In the same manner, for 
                        the aforementioned return periods, employer in the public sector shall attach a copy 
                        of Department of Budget and Management (DBM) circular/s or equivalent, as to who are 
                        allowed to receive hazard pay.
                        </p>
                                                            <dt>When and Where to File and Pay/Remit</dt>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;">The return shall be filed and the tax paid/remitted on or before the 
                        tenth (10th) day of the month following the month in which withholding was made except 
                        for taxes withheld for December which shall be filed and paid/remitted on or before 
                        January 15 of the succeeding year. </p>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;">Provided, however, that with respect to non-large and large taxpayers 
                        who shall file through the Electronic Filing and Payment System (eFPS), the deadline 
                        for electronically filing the return and paying/remitting the taxes due thereon shall 
                        be in accordance with the provisions of existing applicable revenue issuances.</p>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;">The return shall be filed and the tax paid/remitted with the Authorized 
                        Agent Bank (AAB) of the Revenue District Office (RDO) having jurisdiction over the 
                        withholding agent's place of business/office.  In places where there are no Authorized 
                        Agent Banks, the return shall be filed and the tax paid/remitted with the Revenue 
                        Collection Officer (RCO) of the RDO having jurisdiction over the WA’s place of 
                        business/office, who will issue an Electronic Revenue Official Receipt (eROR) 
                        therefor.</p>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;">When the return is filed with an AAB, taxpayer must accomplish and submit 
                        BIR-prescribed deposit slip, which the bank teller shall machine validate as evidence 
                        that payment/remittance was received by the AAB. The AAB receiving the tax return shall 
                        stamp mark the word “Received” on the return and also machine validate the return as 
                        proof of filing and payment/remittance of the tax by the taxpayer. The machine validation 
                        shall reflect the date of payment/remittance, amount paid/remitted and transactions code, 
                        the name of the bank, branch code, teller’s code and teller’s initial. Bank debit memo 
                        number and date should be indicated in the return for taxpayers paying/remitting under 
                        the bank debit system.  
                        </p>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;">Payment/Remittance may also be made thru the epayment channels of AABs thru 
                        either their online facility, credit/debit/prepaid cards, and mobile payments.</p>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;">A taxpayer may file a separate return for the head office and for each branch 
                        or place of business/office or a consolidated return for the head office and 
                        all the branches/offices. In the case of large taxpayers only one consolidated 
                        return is required.</p>
                                                            <dt>Penalties</dt>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;">There shall be imposed and collected as part of the tax:</p>
                                                            <ol>
                                                                <li style="font-weight:normal; font-size: 11px; line-height: 10px;">A surcharge of twenty-five percent (25%) for the following 
                        violations:
                        </li>
                                                                <ol class="indent" type="a">
                                                                    <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Failure to file any return and pay the amount of tax or 
                        installment due on or before the due date;
                        </li>
                                                                    <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Filing a return with a person or office other than those with 
                        whom it is required to be filed, unless otherwise authorized by the Commissioner;
                        </li>
                                                                      <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Failure to pay the full or part of the amount of tax shown on 
                        the return, or the full amount of tax due for which no return is required to be 
                        filed on or before the due date;
                        </li>
                                                                      <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Failure to pay the deficiency tax within the time prescribed 
                        for its payment in the notice of assessment.</li>
                                                                </ol>
                                                                <li style="font-weight:normal; font-size: 11px; line-height: 10px;">A surcharge of fifty percent (50%) of the tax or of the deficiency tax, 
                        in case any payment has been made before the discovery of the falsity or fraud, 
                        for each of the following violations:</li>
                                                            </ol>
                                                        </td>
                                                        <td class="secondcol">
                                                            <br>
                                                            <ol class="indent" type="a">
                                                                    <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Willful neglect to file the return within the period prescribed 
                        by the Code or by rules and regulations; or</li>
                                                                    <li style="font-weight:normal; font-size: 11px; line-height: 10px;">A false or fraudulent return is willfully made.</li>
                                                                </ol>
                                                                <ol start="3">
                                                                    <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Interest at the rate of double the legal interest rate for loans or 
                        forbearance of any money in the absence of an express stipulation as set by the 
                        Bangko Sentral ng Pilipinas from the date prescribed for payment until the amount 
                        is fully remitted: Provided, That in no case shall the deficiency and the delinquency 
                        interest prescribed under Section 249 Subsections (B) and (C) of the National Internal 
                        Revenue Code, as amended, be imposed simultaneously.</li>
                                                                    <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Compromise penalty as provided under applicable rules and 
                        regulations.</li>
                                                                </ol>
                                                            <dt>Violation of Withholding Tax Provisions</dt>
                        
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;">Any person required to withhold, account for, and pay/remit any tax imposed 
                        by the National Internal Revenue Code (NIRC), as amended, or who willfully fails to 
                        withhold such tax, or account for and pay/remit such tax, or aids or abets in any 
                        manner to evade any such tax or the payment/remittance thereof, shall, in addition 
                        to other penalties provided for under the Law, be liable upon conviction to a penalty 
                        equal to the total amount of the tax not withheld, or not accounted for and 
                        paid/remitted.</p>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;">Any person required under the NIRC, as amended, or by rules and regulations 
                        promulgated thereunder to pay/remit any tax, make a return, keep any record, or supply 
                        correct and accurate information, who willfully fails to pay/remit such tax, make such 
                        return, keep such record, or supply such correct and accurate information, or withhold 
                        or pay/remit taxes withheld, or refund excess taxes withheld on compensation, at the 
                        time or times required by law or rules and regulations shall, in addition to the other 
                        penalties provided by law, upon conviction thereof, be punished by a fine of not less 
                        than ten thousand pesos (P= 10,000.00) and suffer imprisonment of not less than one (1) 
                        year but not more than ten (10) years.
                        </p>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;">Every officer or employee of the Government of the Republic of the Philippines 
                        or any of its agencies and instrumentalities, its political subdivisions, as well as 
                        government-owned or controlled corporations, including the Bangko Sentral ng Pilipinas, 
                        who, under the provisions of the NIRC, as amended, or regulations promulgated thereunder, 
                        is charged with the duty to deduct and withhold any internal revenue tax and to pay/remit 
                        the same in accordance with the provisions of the NIRC, as amended, and other laws and who 
                        is found guilty of any offense herein below specified shall, upon conviction of each act 
                        or omission,  be fined  in  a  sum  not  less  than  five  thousand  pesos (P= 5,000) but 
                        not more than fifty thousand pesos (P= 50,000) or imprisoned for a term of not less than 
                        six (6) months  and  one day  but  not  more  than  two (2) years, or both:</p>
                                                            <ol class="indent" type="a">
                                                                <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Those who fail or cause the failure to deduct and withhold any internal 
                        revenue tax under any of the withholding tax laws and implementing regulations;</li>
                                                                <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Those who fail or cause the failure to pay/remit taxes deducted and 
                        withheld within the time prescribed by law, and implementing regulations; and
                        </li>
                                                                <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Those who fail or cause the failure to file a return or statement within 
                        the time prescribed, or render or furnish a false or fraudulent return or statement 
                        required under the withholding tax laws and regulations. 
                        </li>
                                                                
                                                            </ol>
                                                            <p style="font-weight:normal; font-size: 11px; line-height: 10px;">If the withholding agent is the Government or any of its agencies, political 
                        subdivisions or instrumentalities, or a government-owned or controlled corporation, the 
                        employee thereof responsible for the withholding and payment/remittance of tax shall be 
                        personally liable for the additions to the tax prescribed by the NIRC, as amended. 
                        </p>
                                                            <dt>Required Attachments:</dt>
                                                            <ol class="indent">
                                                                <li style="font-weight:normal; font-size: 11px; line-height: 10px;">For Private Sector, copy of the list submitted to the DOLE 
                        Regional/Provincial Offices – Operations Division/Unit.
                        </li>
                                                                <li style="font-weight:normal; font-size: 11px; line-height: 10px;">For Public Sector, copy of Department of Budget and Management (DBM) 
                        circular/s or equivalent.</li>
                                                            </ol>
                                                            <dt>Note: All background information must be properly filled out.</dt>
                                                            <ul>
                                                                <li style="font-weight:normal; font-size: 11px; line-height: 10px;">The last 5 digits of the 14-digit TIN refers to the branch code
                        </li>
                                                                <li style="font-weight:normal; font-size: 11px; line-height: 10px;">All returns filed by an accredited tax agent on behalf of a 
                        taxpayer shall bear the following information:
                        </li>
                                                                <ol class="indent" type="A">
                                                                    <li style="font-weight:normal; font-size: 11px; line-height: 10px;">For Individual (CPAs, members of GPPs, and others)
                        </li>
                                                                        <dd style="font-weight:normal; font-size: 11px;">a.1 Taxpayer Identification Number (TIN); and </dd>
                                                                        <dd style="font-weight:normal; font-size: 11px;">a.2 BIR Accreditation Number, Date of Issue, and Date of Expiry.</dd>
                                                                    <li style="font-weight:normal; font-size: 11px; line-height: 10px;">For members of the Philippine Bar (Lawyers)
                        </li>
                                                                        <dd style="font-weight:normal; font-size: 11px;">b.1 Taxpayer Identification Number (TIN); </dd>
                                                                        <dd style="font-weight:normal; font-size: 11px;">b.2 Attorney’s Roll Number;</dd>
                                                                        <dd style="font-weight:normal; font-size: 11px;">b.3 Mandatory Continuing Legal Education (MCLE) Compliance Number; and</dd>
                                                                        <dd style="font-weight:normal; font-size: 11px;">b.4 BIR Accreditation Number, Date of Issue, and Date of Expiry.</dd>
                                                                </ol>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="880" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                <tr align="center">
                                    <td class="tblFormTdPart" style="border-bottom: #AAAAAA 1px solid;">
                                        <table width="800" border="0" cellspacing="0" cellpadding="0">
                                            <tr align="center">
                                                <td width="100%" colspan="2">
                                                    <div align="center">
                                                        <input class="printButtonClass" type="button" value="Prev" style="width: 100px;"
                                                            name="frm1601c:btnPrevPage" id="frm1601c:btnPrevPage" onclick="processPrev();" />
                                                        <input id="frm1601c:txtCurrentPage" name="frm1601c:txtCurrentPage" size="1" type="text" style="text-align:center;" onkeyup="goToPage();" />
                                                        <span class=large>/&nbsp;</span><input type="text" id="frm1601c:txtMaxPage" readonly="true" size="2"  value="2" style="text-align:center;" disabled />&nbsp;
                                                        <input class="printButtonClass" type="button" value="Next" style="width: 100px;"
                                                            name="frm1601c:btnNextPage" id="frm1601c:btnNextPage"  onclick="processNext();" />
                                                        <br /><br />
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr valign="middle" align="center">
                                                <td>
                                                    <div align="center" >
                                                        @if($action != 'view')
                                                            <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm1601c:btnValidate" id="frm1601c:btnValidate" onclick="validate();" />
                                                            <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm1601c:btnEdit" id="frm1601c:btnEdit" onclick="enableAllControl()" />
                                                            <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                            <input class="printButtonClass" type="button" value="{{$action == 'new' ? 'Save' : 'Update'}}" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData()" />
                                                            <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                            <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1601c:btnFinalCopy" id="frm1601c:btnFinalCopy" onclick="submitForm();" />
                                                        @else
                                                            <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                            <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                       @endif
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
                            <div class="footer footer1601C" style="padding:6px; text-align: center; font-size: 11px; background-color: white; width: 100%;">
                             <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                            </div>
                        </td>
                    </tr>
                </table>    
                </div>
            </div>
            <div id="hiddenEmail" style="display:none;"  > 
                <input type="text" value="{{$company->line_business}}" size="27" name="frm1601c:txtLineBus" maxlength="60" id="frm1601c:txtLineBus" class="iceInpTxt-dis disabled-dis" onblur="return capital(this, event)" />
            </div>
        </form> 
@endsection

@section('scripts')
<script type="text/javascript">
    var isSubmitFinal = false;
    var isSubmit = false;
    
    var gIsReadOnly = false;
    var fileNameToExport = "";
    
    var fileName = "";
    var existingXMLFileName = "";
    
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
    var p3TPZip = "";   

    var currentPage;
    var MaxPage = 2;
    
    var str;
    var globalEmail = "";
    str = setTimeout("sleeptime()", 1000);
    var viewForm = false;
    function Schedule1()
    {
        this.txtMonthYear = '';
        this.txtDatePaid = '';
        this.txtBankCode = '';
        this.txtNumber = '';
        this.txtTaxPaid = '0.00';
        this.txtShouldTaxDue = '0.00';
        this.txtAdjustments = '0.00';
    }

    var schedule1 = new Array();
    var schedule1ToCommit = new Array();

    /*----------------------------------*/
    //Added by MPISCOSO
    var d=document,XMLBGFile='',data='',XMLFile='',msg = d.getElementById('msg'),flag=true;
    var loader=d.getElementById('loader');
    /*----------------------------------*/

    function sleeptime()
    {
        init();
        
        document.getElementById('frm1601c:txtTIN1').disabled = true; document.getElementById('frm1601c:txtTIN2').disabled = true; document.getElementById('frm1601c:txtTIN3').disabled = true; document.getElementById('frm1601c:txtBranchCode').disabled = true;
        
   }

    
    function isItAnAmendedReturn(xmlFile) { 
        if(d.getElementById('frm1601c:AmendedRtn_1').checked) {
            return true;
        } else {
            return false;
        }       
    }
    
    function setInputTextControl_HorizontalAlignment(id,align) {
        if (d.getElementById(id) != null) {
        d.getElementById(id).style.textAlign = "right";
        }
    }
    function setInputTextControl_NumberFormatter(id,limit,deci) {
    }
            
    function init()
    {  
        var month = new Date();
        var year3 = new Date();

        @if($action == 'new')
            if (month == 0) {
                d.getElementById('frm1601c:txtMonth').selectedIndex = 11;
                d.getElementById('frm1601c:txtYear').value = year3.getFullYear() - 1;
            } else {
                d.getElementById('frm1601c:txtMonth').selectedIndex = month.getMonth();
                d.getElementById('frm1601c:txtYear').value = year3.getFullYear();
            }
            d.getElementById("frm1601c:selTreaty").disabled = true;
        @else
            @if($data->item13 == 'Y')
                d.getElementById("frm1601c:selTreaty").disabled = false;
            @endif
        @endif

        currentPage = 1;
        d.getElementById('frm1601c:txtCurrentPage').value = currentPage;
        
         @if($action != 'view')
            d.getElementById('frm1601c:btnEdit').disabled = true;
            d.getElementById('btnPrint').disabled = true;
            d.getElementById('frm1601c:btnFinalCopy').disabled = true;
            d.getElementById('btnUpload').disabled = true;
         @else
            disableAllControl();
         @endif
        
        d.getElementById('frm1601c:txtSheets').disabled = false;

        d.getElementById('frm1601c:SpecialTax_1').disabled = false;
        d.getElementById('frm1601c:SpecialTax_2').disabled = false;
        
        d.getElementById('frm1601c:txtATC').disabled = true;
        d.getElementById('frm1601c:txtTax21').disabled = true;
        d.getElementById('frm1601c:txtTax22').disabled = true;
       
        d.getElementById('frm1601c:txtTax26').disabled = true;

    }

    function validateMonthYear(element) {
        var strmmddyyyy = element.value;
        var isValid = true;
        var currentDate = new Date();
        var inputDate = new Date();

        if (strmmddyyyy != "") {
            var result = strmmddyyyy.split("/");
            var isLeap = new Date(result[1], 1, 29).getMonth() === 1;
            var month31 = (['01', '03', '05', '07', '08', '10', '12']);
            var month30 = (['04', '06', '09', '11']);
            var month = result[0];
            if (result.length === 2) {
                if (isNaN(result[0] || result[1])) {
                    isValid = false;
                }
                else if ((result[0].length != 2 || (result[0] > 12 || result[0] < 1))) {
                    // numeric check if greater not than 31 - Month.
                    isValid = false;
                }
                else if (result[1].length != 4) {
                    isValid = false;
                }

                inputDate = new Date(result[1], month - 1);
            }
            else {
                isValid = false;
            }
        }

        if (!isValid) {
            alert('Please provide a valid date. (MM/YYYY format)');
            element.value = '';
            element.focus();
        }
        else if (inputDate > currentDate) {
            alert('This date cannot be a future date.');
            element.value = '';
            element.focus();
        }

        return isValid;
    }

    function validateDate(element) {
        var strmmddyyyy = element.value;
        var isValid = true;
        var currentDate = new Date();
        var inputDate = new Date();

        if (strmmddyyyy != "") {
            var result = strmmddyyyy.split("/");
            var isLeap = new Date(result[2], 1, 29).getMonth() === 1;
            var month31 = (['01', '03', '05', '07', '08', '10', '12']);
            var month30 = (['04', '06', '09', '11']);
            var month = result[0];
            var day = result[1];
            if (result.length === 3) {
                if (isNaN(result[0] || result[1] || result[2])) {
                    isValid = false;
                }
                else if ((result[0].length != 2 || (result[0] > 12 || result[0] < 1))) {
                    // numeric check if greater not than 31 - Month.
                    isValid = false;
                }
                else if (result[1].length != 2 || (result[1] > 31 || result[1] < 1)) {
                    // numeric check if Date.
                    isValid = false;
                }
                else if (result[2].length != 4) {
                    isValid = false;
                }
                else if (month == 2) {
                    if (!isLeap && day == 29) {
                        isValid = false;
                    }
                    else if (!isLeap && day > 29) {
                        isValid = false;
                    }
                    else if (isLeap && day > 29) {
                        isValid = false;
                    }
                }
                else if (month31.contains(month) && day > 31) {
                    isValid = false;
                }
                else if (month30.contains(month) && day > 30) {
                    isValid = false;
                }

                inputDate = new Date(result[2], month - 1, day);
            }
            else {
                isValid = false;
            }
        }

        if (!isValid) {
            alert('Please provide a valid date. (MM/DD/YYYY format)');
            element.value = '';
            element.focus();
        }
        else if (inputDate > currentDate) {
            alert('This date cannot be a future date.');
            element.value = '';
            element.focus();
        }

        return isValid;
    }
    
    function validateRtnPeriod() {

        var date = new Date();

        if (d.getElementById("frm1601c:txtYear").value < 2018) {
            alert("Please file using the old version of the form.");
            d.getElementById("frm1601c:txtYear").value = "2018";
        }
        if (d.getElementById("frm1601c:txtMonth").selectedIndex > date.getMonth() && d.getElementById('frm1601c:txtYear').value == date.getFullYear()) {
            alert("Invalid month. Month should not be later than the current month.");
            d.getElementById("frm1601c:txtMonth").selectedIndex = date.getMonth();
            return;
        }
        if (d.getElementById("frm1601c:txtYear").value > date.getFullYear()) {
            alert("Invalid year. Year should not be later than the current year.");
            d.getElementById("frm1601c:txtYear").value = date.getFullYear();
            return;
        }
    }

    function validate() {
        var a;
        var dt = new Date();
        if(d.getElementById('frm1601c:txtYear').value == "" )
        {
            alert("Please enter a valid year on Item 1."); return;
        }
       
        if(d.getElementById('frm1601c:txtYear').value > dt.getFullYear() )
        {
            alert("Invalid year. Year should not be later than the current year.");
            d.getElementById("frm1601c:txtYear").value = dt.getFullYear();
            return;
            //alert("Invalid date entry on Item no.1. Entry should not be later than Current Date."); return;
        }
        if(d.getElementById('frm1601c:txtMonth').selectedIndex > dt.getMonth() && d.getElementById('frm1601c:txtYear').value == dt.getFullYear())
        {
            alert("Invalid month. Month should not be later than the current month.");
            d.getElementById("frm1601c:txtMonth").selectedIndex = dt.getMonth();
            return;
            //alert("Invalid date entry on Item no.1. Entry should not be later than Current Date."); return;
        }
        if(!d.getElementById('frm1601c:TaxWithheld_1').checked && !d.getElementById('frm1601c:TaxWithheld_2').checked )
        {
            alert("Please select an option for Item 3.")
            return;
        }
        
        if( (d.getElementById('frm1601c:txtTIN1').value == "" || d.getElementById('frm1601c:txtTIN2').value == "" || d.getElementById('frm1601c:txtTIN3').value == "" || d.getElementById('frm1601c:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 6.");
            return;
        }       
        
        if( (d.getElementById('frm1601c:txtTaxpayerName').value == "")  )
        {
            alert("Please enter a valid Witholding Agent's Name on Item 8.");
            return;
        }
        if( (d.getElementById('frm1601c:txtTelNum').value == "")  )
        {
            alert("Please enter a valid Telephone Number on Item 10.");
            return;
        }       
        if( (d.getElementById('frm1601c:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 9.");
            return;
        }       
        if( (d.getElementById('frm1601c:txtZipCode').value == "")  )
        {
            alert("Please enter Taxpayer's Zip Code on Item 9A.");
            return;
        }
        if(!d.getElementById('frm1601c:CatAgent_P').checked && !d.getElementById('frm1601c:CatAgent_G').checked )
        {
            alert("Please select an option for Item 11."); return;
        }
        if(d.getElementById('frm1601c:TaxWithheld_1').checked)
        {
            if(d.getElementById('frm1601c:txtTax14').value == 0 || d.getElementById('frm1601c:txtTax14').value == 0.00 )
            {
                alert("Invalid amount in Item no.14. Value must be greater than zero(0)."); return;
            }
            if(d.getElementById('frm1601c:txtTax25').value == 0 || d.getElementById('frm1601c:txtTax25').value == 0.00 )
            {
                alert("Invalid amount in Item no.25. Value must be greater than zero(0)."); return;
            }
        }
        var counter = d.getElementById('tblSched1a').rows.length;
        for(i = 0;i < counter; i++)
        { a = d.getElementById('frm1601c:sched1:txtMonthYear'+i).value;
            strmmddyyy = d.getElementById('frm1601c:sched1:txtDatePaid'+i).value;
            if(d.getElementById('frm1601c:sched1:txtMonthYear'+i).value != "")
            {
                var result = a.split("/")
                if(result.length == 2 )
                {
                    if(isNaN(result[0]))
                    {   alert("Invalid date entry on Section A, column 1 Record "+i+".Format is mm/yyyy");
                        return;
                    }else{
                        // numeric check if greater not than 31 - Month.
                        if(result[0] > 12 || result[0] < 0)
                        {
                            alert("Invalid date entry on Section A, column 1 Record "+i+".Format is mm/yyyy");
                            return;
                        }
                    }
                    if(isNaN(result[1]))
                    {
                        alert("Invalid date entry on Section A, column 1 Record "+i+".Format is mm/yyyy");
                        return;
                    }else{
                     
                    }
                }else
                {
                    alert("Invalid date entry on Section A, column 1 Record "+i+".Format is mm/yyyy");
                    return;
                }
            }
            if(strmmddyyy != "")
            {
                var result = strmmddyyy.split("/")
                if(result.length == 3 )
                {
                    if(isNaN(result[0]))
                    {   alert("Invalid date entry on Section A, column 2 Record "+i+".Format is mm/dd/yyyy.");
                        return;
                    }else{
                        // numeric check if greater not than 31 - Month.
                        if(result[0] > 12 || result[0] < 0)
                        {
                            alert("Invalid date entry on Section A, column 2 Record "+i+".Format is mm/dd/yyyy.");
                            return;
                        }
                    }
                    if(isNaN(result[1]))
                    {
                        alert("Invalid date entry on Section A, column 2 Record "+i+".Format is mm/dd/yyyy.");
                        return;
                    }else{
                        // numeric check if Date.
                        if(result[1] > 31 || result[1] < 1)
                        {
                            alert("Invalid date entry on Section A, column 2 Record "+i+".Format is mm/dd/yyyy.");
                            return;
                        }
                    }
                    if(isNaN(result[2]))
                    {
                        alert("Invalid date entry on Section A, column 2 Record "+i+".Format is mm/dd/yyyy.");
                        return;
                    }
                }else
                {
                    alert("Invalid date entry on Section A, column 2 Record "+i+".Format is mm/dd/yyyy.");
                    return;
                }
            }
        }

        disableAllControl();

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
        return;
    }
    
    function enableAllControl()
    {
        d.getElementById('frm1601c:txtSheets').disabled = false;
        d.getElementById('frm1601c:SpecialTax_1').disabled = false;
        d.getElementById('frm1601c:SpecialTax_2').disabled = false;
    
        d.getElementById('frm1601c:txtMonth').disabled = false;
        d.getElementById('frm1601c:txtYear').disabled = false;
        d.getElementById('frm1601c:TaxWithheld_1').disabled = false;
        d.getElementById('frm1601c:TaxWithheld_2').disabled = false;
        d.getElementById('frm1601c:AmendedRtn_1').disabled = false;
        d.getElementById('frm1601c:AmendedRtn_2').disabled = false;
        d.getElementById('frm1601c:CatAgent_P').disabled = false;
        d.getElementById('frm1601c:CatAgent_G').disabled = false;
        d.getElementById('frm1601c:txtTax14').disabled = false;
        d.getElementById('frm1601c:txtTax15').disabled = false;
        d.getElementById('frm1601c:txtTax16').disabled = false;
        d.getElementById('frm1601c:txtTax17').disabled = false;
        d.getElementById('frm1601c:txtTax18').disabled = false;
        d.getElementById('frm1601c:txtTax19').disabled = false;
        d.getElementById('frm1601c:txtTax20').disabled = false;
        d.getElementById('frm1601c:txtTax23').disabled = false;
        d.getElementById('frm1601c:txtTax25').disabled = false;
        d.getElementById('frm1601c:txtTax29').disabled = false;
        
        d.getElementById("frm1601c:txtTax32").disabled = false;
        d.getElementById("frm1601c:txtTax33").disabled = false;
        d.getElementById("frm1601c:txtTax34").disabled = false;
        
        var count = d.getElementById('tblSched1a').rows.length;
        for(i = 0 ; i < count ; i++)
        {
            d.getElementById('chkScheduleDelete' + i).disabled = false;
            d.getElementById('frm1601c:sched1:txtMonthYear' + i).disabled = false;
            d.getElementById('frm1601c:sched1:txtDatePaid' + i).disabled = false;
            d.getElementById('frm1601c:sched1:txtNumber' + i).disabled = false;
            d.getElementById('frm1601c:sched1:txtBankCode' + i).disabled = false;
            d.getElementById('frm1601c:sched1:txtTaxPaid' + i).disabled = false;
            d.getElementById('frm1601c:sched1:txtShouldTaxDue' + i).disabled = false;
        }

        d.getElementById('frm1601c:btnAdd').disabled = false;
        d.getElementById('frm1601c:btnDelete').disabled = false;

        if(d.getElementById("frm1601c:AmendedRtn_1").checked){
            d.getElementById("frm1601c:txtTax28").disabled = false;
        }

        if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
        d.getElementById('frm1601c:txtMonth').disabled = true;
        d.getElementById('frm1601c:txtYear').disabled = true;
        }
        
        d.getElementById('frm1601c:txtCurrentPage').disabled = false;
        d.getElementById('frm1601c:btnValidate').disabled = false;
        d.getElementById('frm1601c:btnEdit').disabled = true;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1601c:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        disableElem;
        enableElem;
        document.getElementById('frm1601c:txtTIN1').disabled = true; document.getElementById('frm1601c:txtTIN2').disabled = true; document.getElementById('frm1601c:txtTIN3').disabled = true; document.getElementById('frm1601c:txtBranchCode').disabled = true;
    }
    
    var disableElem = true;
    var enableElem = false;
    function disableAllControl()
    {   
        d.getElementById('frm1601c:txtSheets').disabled = true;
        d.getElementById('frm1601c:txtTIN1').disabled = true;
        d.getElementById('frm1601c:txtTIN2').disabled = true;
        d.getElementById('frm1601c:txtTIN3').disabled = true;
        d.getElementById('frm1601c:txtBranchCode').disabled = true;
        d.getElementById('frm1601c:txtRDOCode').disabled = true;
        d.getElementById('frm1601c:txtTaxpayerName').disabled = true;
        d.getElementById('frm1601c:txtTelNum').disabled = true;
        d.getElementById('frm1601c:txtAddress').disabled = true;
        d.getElementById('frm1601c:txtZipCode').disabled = true;
        d.getElementById('frm1601c:SpecialTax_1').disabled = true;
        d.getElementById('frm1601c:SpecialTax_2').disabled = true;
        d.getElementById('frm1601c:txtMonth').disabled = true;
        d.getElementById('frm1601c:txtYear').disabled = true;
        d.getElementById('frm1601c:TaxWithheld_1').disabled = true;
        d.getElementById('frm1601c:TaxWithheld_2').disabled = true;
        d.getElementById('frm1601c:AmendedRtn_1').disabled = true;
        d.getElementById('frm1601c:AmendedRtn_2').disabled = true;
        d.getElementById('frm1601c:CatAgent_P').disabled = true;
        d.getElementById('frm1601c:CatAgent_G').disabled = true;
        d.getElementById('frm1601c:txtTax14').disabled = true;
        d.getElementById('frm1601c:txtTax15').disabled = true;
        d.getElementById('frm1601c:txtTax16').disabled = true;
        d.getElementById('frm1601c:txtTax17').disabled = true;
        d.getElementById('frm1601c:txtTax18').disabled = true;
        d.getElementById('frm1601c:txtTax19').disabled = true;
        d.getElementById('frm1601c:txtTax20').disabled = true;
        d.getElementById('frm1601c:txtTax23').disabled = true;
        d.getElementById('frm1601c:txtTax25').disabled = true;
        d.getElementById('frm1601c:txtTax29').disabled = true;
        d.getElementById("frm1601c:txtTax32").disabled = true;
        d.getElementById("frm1601c:txtTax33").disabled = true;
        d.getElementById("frm1601c:txtTax34").disabled = true;
        
        var count = d.getElementById('tblSched1a').rows.length;
        for(i = 0 ; i < count ; i++)
        {
            d.getElementById('chkScheduleDelete' + i).disabled = true;
            d.getElementById('frm1601c:sched1:txtMonthYear' + i).disabled = true;
            d.getElementById('frm1601c:sched1:txtDatePaid' + i).disabled = true;
            d.getElementById('frm1601c:sched1:txtNumber' + i).disabled = true;
            d.getElementById('frm1601c:sched1:txtBankCode' + i).disabled = true;
            d.getElementById('frm1601c:sched1:txtTaxPaid' + i).disabled = true;
            d.getElementById('frm1601c:sched1:txtShouldTaxDue' + i).disabled = true;
        }

        d.getElementById('frm1601c:btnAdd').disabled = true;
        d.getElementById('frm1601c:btnDelete').disabled = true;

        if(d.getElementById("frm1601c:AmendedRtn_1").checked){
            d.getElementById("frm1601c:txtTax28").disabled = true;
        }

        d.getElementById('frm1601c:txtCurrentPage').disabled = true;
        @if($action!= 'view')
        d.getElementById('frm1601c:btnValidate').disabled = true;
        d.getElementById('frm1601c:btnEdit').disabled = false;
        d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm1601c:btnFinalCopy').disabled = false;
        d.getElementById('btnUpload').disabled = false;
        @endif
        disableElem;
        enableElem;
    }

    function loadSchedule() {
        var monthYear = String($("#response").html()).split("frm1601c:sched1:txtMonthYear");  //monthyear
        var datePaid = String($("#response").html()).split("frm1601c:sched1:txtDatePaid");  //datepaid
        var bankCode = String($("#response").html()).split("frm1601c:sched1:txtBankCode");  //bankcode
        var number = String($("#response").html()).split("frm1601c:sched1:txtNumber");  //number
        var taxPaid = String($("#response").html()).split("frm1601c:sched1:txtTaxPaid");  //taxpaid
        var shouldTaxDue = String($("#response").html()).split("frm1601c:sched1:txtShouldTaxDue");  //shouldtaxdue
        var adjustments = String($("#response").html()).split("frm1601c:sched1:txtAdjustments");  //adjustments

        $('#tblSched1a').html("");
        $('#tblSched1b').html("");

        var i = 0;
        for(var j = 0; j < monthYear.length; j++) {
            if (j % 2 != 0) {//to not get other div splits
                
                //get values
                schedule1ToCommit[i] = new Schedule1();
                schedule1ToCommit[i].txtMonthYear = monthYear[j].split('=')[1];
                schedule1ToCommit[i].txtDatePaid = datePaid[j].split('=')[1];
                schedule1ToCommit[i].txtBankCode = bankCode[j].split('=')[1];
                schedule1ToCommit[i].txtNumber = number[j].split('=')[1];
                schedule1ToCommit[i].txtTaxPaid = taxPaid[j].split('=')[1];
                schedule1ToCommit[i].txtShouldTaxDue = shouldTaxDue[j].split('=')[1];
                schedule1ToCommit[i].txtAdjustments = adjustments[j].split('=')[1];
                
                i++;
            }
        }

        for (x=0;x< schedule1ToCommit.length;x++) {  

            $('#tblSched1a').html(d.getElementById('tblSched1a').innerHTML + "<tr>" +
            "<td width='2%'><font size='1' style='font-weight:bold'><input type='checkbox'  id='chkScheduleDelete" + x + "'></font></td>" + 
            "<td width='18%' align='center'><input type='text' value='" + schedule1ToCommit[x].txtMonthYear + "' style='color: black; text-align: right;' size='15'  maxlength='7' id='frm1601c:sched1:txtMonthYear" + x + "' name='frm1601c:sched1:txtMonthYear[]' onkeypress='return dateOnly(this, event)' onkeydown='dateMaskingMonthYear(this);' onblur='validateMonthYear(this);' /></td>" +
            "<td align='center'><input type='text' value='" + schedule1ToCommit[x].txtDatePaid + "' style='color: black; text-align: right;' size='20' maxlength='10' id='frm1601c:sched1:txtDatePaid" + x + "' name='frm1601c:sched1:txtDatePaid[]' onkeypress='return dateOnly(this, event)' onkeydown='dateMasking(this);' onblur='validateDate(this);' /></td>" +
            "<td align='center'><input type='text' value='" + schedule1ToCommit[x].txtBankCode + "' style='color: black; text-align: right;' size='20' maxlength='20' id='frm1601c:sched1:txtBankCode" + x + "' name='frm1601c:sched1:txtBankCode[]' onkeypress='return letternumber(event)' /></td>" +
            "<td align='center'><input type='text' value='" + schedule1ToCommit[x].txtNumber + "' style='color: black; text-align: right;' size='20' maxlength='20' id='frm1601c:sched1:txtNumber" + x + "' name='frm1601c:sched1:txtNumber[]' onkeypress='return letternumber(event)' /></td>" +
            "<td align='center'><input type='text' value='" + schedule1ToCommit[x].txtTaxPaid + "' style='color: black; text-align: right;' size='20' maxlength='25' id='frm1601c:sched1:txtTaxPaid" + x + "' name='frm1601c:sched1:txtTaxPaid[]' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSchedule1();' /></td>" +
            "</tr>");

            $('#tblSched1b').html(d.getElementById('tblSched1b').innerHTML + "<tr>" +
            "<td width='2%'><font size='1' style='font-weight:bold'>" + (x+1) + "</font></td>" +
            "<td width='48%' align='center'><input onblur='round(this,2);computeSchedule1();' type='text' value='" + schedule1ToCommit[x].txtShouldTaxDue + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm1601c:sched1:txtShouldTaxDue" + x + "' name='frm1601c:sched1:txtShouldTaxDue[]' onkeypress='return numbersonly(this, event)'' /></td>" +
            "<td align='center'><input type='text' value='" + schedule1ToCommit[x].txtAdjustments + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm1601c:sched1:txtAdjustments" + x + "' name='frm1601c:sched1:txtAdjustments[]' disabled /></td>" +
            "</tr>");
        }
    }

    function addSchedule() {
        
        var rowCount = d.getElementById("tblSched1a").rows.length;
        for(var i = 0; i < rowCount; i++ ) {
            
            schedule1ToCommit[i] = new Schedule1();
            schedule1ToCommit[i].txtMonthYear = d.getElementById("frm1601c:sched1:txtMonthYear"+i).value;
            schedule1ToCommit[i].txtDatePaid = d.getElementById("frm1601c:sched1:txtDatePaid"+i).value;
            schedule1ToCommit[i].txtBankCode = d.getElementById("frm1601c:sched1:txtBankCode"+i).value;
            schedule1ToCommit[i].txtNumber = d.getElementById("frm1601c:sched1:txtNumber"+i).value;
            schedule1ToCommit[i].txtTaxPaid = d.getElementById("frm1601c:sched1:txtTaxPaid"+i).value;
            schedule1ToCommit[i].txtShouldTaxDue = d.getElementById("frm1601c:sched1:txtShouldTaxDue"+i).value;
            schedule1ToCommit[i].txtAdjustments = d.getElementById("frm1601c:sched1:txtAdjustments"+i).value;
        }

        i = schedule1ToCommit.length;
        schedule1ToCommit[i] = new Schedule1();
        $('#tblSched1a').html("");
        $('#tblSched1b').html("");

        for(i = 0; i < schedule1ToCommit.length; i++) {
            $('#tblSched1a').html(d.getElementById('tblSched1a').innerHTML + "<tr>" +
            "<td width='2%'><font size='1' style='font-weight:bold'><input type='checkbox'  id='chkScheduleDelete" + i + "' name='chkScheduleDelete" + i + "'></font></td>" + 
            "<td width='18%' align='center'><input type='text' value='" + schedule1ToCommit[i].txtMonthYear + "' style='color: black; text-align: right;' size='15'  maxlength='7' id='frm1601c:sched1:txtMonthYear" + i + "' name='frm1601c:sched1:txtMonthYear[]' onkeypress='return dateOnly(this, event)' onkeydown='dateMaskingMonthYear(this);' onblur='validateMonthYear(this);' /></td>" +
            "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtDatePaid + "' style='color: black; text-align: right;' size='20' maxlength='10' id='frm1601c:sched1:txtDatePaid" + i + "' name='frm1601c:sched1:txtDatePaid[]' onkeypress='return dateOnly(this, event)' onkeydown='dateMasking(this);' onblur='validateDate(this);' /></td>" +
            "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtBankCode + "' style='color: black; text-align: right;' size='20' maxlength='20' id='frm1601c:sched1:txtBankCode" + i + "' name='frm1601c:sched1:txtBankCode[]' onkeypress='return letternumber(event)' /></td>" +
            "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtNumber + "' style='color: black; text-align: right;' size='20' maxlength='20' id='frm1601c:sched1:txtNumber" + i + "' name='frm1601c:sched1:txtNumber[]' onkeypress='return letternumber(event)' /></td>" +
            "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtTaxPaid + "' style='color: black; text-align: right;' size='20' maxlength='25' id='frm1601c:sched1:txtTaxPaid" + i + "' name='frm1601c:sched1:txtTaxPaid[]' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSchedule1();' /></td>" +
            "</tr>");

            $('#tblSched1b').html(d.getElementById('tblSched1b').innerHTML + "<tr>" +
            "<td width='2%'><font size='1' style='font-weight:bold'>" + (i+1) + "</font></td>" +
            "<td width='48%' align='center'><input onblur='round(this,2);computeSchedule1();' type='text' value='" + schedule1ToCommit[i].txtShouldTaxDue + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm1601c:sched1:txtShouldTaxDue" + i + "' name='frm1601c:sched1:txtShouldTaxDue[]' onkeypress='return numbersonly(this, event)'' /></td>" +
            "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtAdjustments + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm1601c:sched1:txtAdjustments" + i + "' name='frm1601c:sched1:txtAdjustments[]' disabled /></td>" +
            "</tr>");
        }
    }

    function deleteSchedule() {

        var scheduleTemp = new Array();
        var rowCount = d.getElementById("tblSched1a").rows.length;
        for(var i = 0; i < rowCount; i++ ) {
            
            schedule1ToCommit[i] = new Schedule1();
            schedule1ToCommit[i].txtMonthYear = d.getElementById("frm1601c:sched1:txtMonthYear"+i).value;
            schedule1ToCommit[i].txtDatePaid = d.getElementById("frm1601c:sched1:txtDatePaid"+i).value;
            schedule1ToCommit[i].txtBankCode = d.getElementById("frm1601c:sched1:txtBankCode"+i).value;
            schedule1ToCommit[i].txtNumber = d.getElementById("frm1601c:sched1:txtNumber"+i).value;
            schedule1ToCommit[i].txtTaxPaid = d.getElementById("frm1601c:sched1:txtTaxPaid"+i).value;
            schedule1ToCommit[i].txtShouldTaxDue = d.getElementById("frm1601c:sched1:txtShouldTaxDue"+i).value;
            schedule1ToCommit[i].txtAdjustments = d.getElementById("frm1601c:sched1:txtAdjustments"+i).value;
        }
        i = 0;
        for(var j = 0; j < rowCount; j++ ) {
            if(!d.getElementById("chkScheduleDelete" + j).checked) {
                scheduleTemp[i++] = schedule1ToCommit[j];
            }
        }

        if(scheduleTemp.length > 0) {
            schedule1ToCommit = new Array();
            
            $('#tblSched1a').html("");
            $('#tblSched1b').html("");

            for(i = 0; i < scheduleTemp.length; i++) {
                schedule1ToCommit[i] = scheduleTemp[i];

                $('#tblSched1a').html(d.getElementById('tblSched1a').innerHTML + "<tr>" +
                "<td width='2%'><font size='1' style='font-weight:bold'><input type='checkbox'  id='chkScheduleDelete" + i + "'></font></td>" + 
                "<td width='18%' align='center'><input type='text' value='" + schedule1ToCommit[i].txtMonthYear + "' style='color: black; text-align: right;' size='15'  maxlength='7' id='frm1601c:sched1:txtMonthYear" + i + "' onkeypress='return dateOnly(this, event)' onkeydown='dateMaskingMonthYear(this);' onblur='validateMonthYear(this);' /></td>" +
                "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtDatePaid + "' style='color: black; text-align: right;' size='20' maxlength='10' id='frm1601c:sched1:txtDatePaid" + i + "' onkeypress='return dateOnly(this, event)' onkeydown='dateMasking(this);' onblur='validateDate(this);' /></td>" +
                "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtBankCode + "' style='color: black; text-align: right;' size='20' maxlength='20' id='frm1601c:sched1:txtBankCode" + i + "' onkeypress='return letternumber(event)' /></td>" +
                "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtNumber + "' style='color: black; text-align: right;' size='20' maxlength='20' id='frm1601c:sched1:txtNumber" + i + "' onkeypress='return letternumber(event)' /></td>" +
                "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtTaxPaid + "' style='color: black; text-align: right;' size='20' maxlength='25' id='frm1601c:sched1:txtTaxPaid" + i + "' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSchedule1();' /></td>" +
                "</tr>");

                $('#tblSched1b').html(d.getElementById('tblSched1b').innerHTML + "<tr>" +
                "<td width='2%'><font size='1' style='font-weight:bold'>" + (i+1) + "</font></td>" +
                "<td width='48%' align='center'><input onblur='round(this,2);computeSchedule1();' type='text' value='" + schedule1ToCommit[i].txtShouldTaxDue + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm1601c:sched1:txtShouldTaxDue" + i + "' onkeypress='return numbersonly(this, event)'' /></td>" +
                "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtAdjustments + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm1601c:sched1:txtAdjustments" + i + "' disabled /></td>" +
                "</tr>");
            }
        } else {
            schedule1ToCommit = new Array();
            $('#tblSched1a').html("");
            $('#tblSched1b').html("");
        }
        computeSchedule1();
    }

    function goToPage() {
        var newVal = document.getElementById("frm1601c:txtCurrentPage").value;
       
        var printType = "Page";

        if ((newVal <= MaxPage) && (newVal > 0) && (newVal !== currentPage.toString())) {
            $('#' + printType + currentPage + 'Content').hide('blind');
            $('#' + printType + newVal + 'Content').show('blind');
            currentPage = (document.getElementById("frm1601c:txtCurrentPage").value) * 1;
        }
        else if ((newVal > MaxPage) || (newVal <= 0)) {
            alert("Invalid page");

            document.getElementById("frm1601c:txtCurrentPage").value = currentPage;
        }

        if (isFromPrint) {
        }
    }

    function processPrev() {
        if (currentPage == 1)
            currentPage = 1;
        else {
            currentPage--;
            $('#Page' + currentPage + 'Content').show('blind');
            $('#Page' + (currentPage + 1) + 'Content').hide('blind');
            document.getElementById('frm1601c:txtCurrentPage').value = currentPage;

        }
    }
    function processNext() {
        if (currentPage == MaxPage) {
        }
        else {
        currentPage++;
        $('#Page' + currentPage + 'Content').show('blind');
        $('#Page' + (currentPage - 1) + 'Content').hide('blind');
        document.getElementById('frm1601c:txtCurrentPage').value = currentPage;
        }
    }
    function blockletter(e)
    {
        var number = parseFloat(e.value).toFixed(2);
        if(isNaN(number))
        {
            var zero = 0;
            e.value = parseFloat(zero).toFixed(2);
            //e.value = "";
        }else {
            e.value = '' + number;
        }
    }

    function computeTxt21() {

        d.getElementById("frm1601c:txtTax21").value = formatCurrency((NumWithComma(d.getElementById("frm1601c:txtTax15").value)*1 + NumWithComma(d.getElementById("frm1601c:txtTax16").value)*1 + NumWithComma(d.getElementById("frm1601c:txtTax17").value)*1 + 
        NumWithComma(d.getElementById("frm1601c:txtTax18").value)*1 + NumWithComma(d.getElementById("frm1601c:txtTax19").value)*1 + NumWithComma(d.getElementById("frm1601c:txtTax20").value)*1).toFixed(2));
        computeTxt22();
    }

    function computeTxt22() {

        d.getElementById("frm1601c:txtTax22").value = formatCurrency((NumWithComma(d.getElementById("frm1601c:txtTax14").value)*1 - NumWithComma(d.getElementById("frm1601c:txtTax21").value)*1).toFixed(2));
        computeTxt24();
    }

    function computeTxt24() {

        d.getElementById("frm1601c:txtTax24").value = formatCurrency((NumWithComma(d.getElementById("frm1601c:txtTax22").value)*1 - NumWithComma(d.getElementById("frm1601c:txtTax23").value)*1).toFixed(2));
    }

    function computeTxt27() {
        
        d.getElementById("frm1601c:txtTax27").value = formatCurrency((NumWithComma(d.getElementById("frm1601c:txtTax25").value)*1 + NumWithComma(d.getElementById("frm1601c:txtTax26").value)*1).toFixed(2));
        computeTxt31();
    }

    function computeTxt30() {

        d.getElementById("frm1601c:txtTax30").value = formatCurrency((NumWithComma(d.getElementById("frm1601c:txtTax28").value)*1 + NumWithComma(d.getElementById("frm1601c:txtTax29").value)*1).toFixed(2));
        computeTxt31();
    }

    function computeTxt31() {

        d.getElementById("frm1601c:txtTax31").value = formatCurrency((NumWithComma(d.getElementById("frm1601c:txtTax27").value)*1 - NumWithComma(d.getElementById("frm1601c:txtTax30").value)*1).toFixed(2));
        computeTaxAmountStillDue();
    }
    
    function computePenalties() {

        var tax35 = formatCurrency((NumWithComma(d.getElementById("frm1601c:txtTax32").value)*1 + NumWithComma(d.getElementById("frm1601c:txtTax33").value)*1 + NumWithComma(d.getElementById("frm1601c:txtTax34").value)*1).toFixed(2));
        d.getElementById("frm1601c:txtTax35").value = formatCurrency(tax35);
        computeTaxAmountStillDue();
        
    }

    function computeSchedule1() {
        var count = d.getElementById('tblSched1a').rows.length;
        for(var i=0;i<count;i++) {
            d.getElementById("frm1601c:sched1:txtAdjustments"+i).value = formatCurrency((NumWithComma(d.getElementById("frm1601c:sched1:txtShouldTaxDue"+i).value)*1 - NumWithComma(d.getElementById("frm1601c:sched1:txtTaxPaid"+i).value)*1).toFixed(2));
            
        }

        d.getElementById("frm1601c:sched1:txtTotal1").value = (0).toFixed(2);

        for(var j=0;j<count;j++){
            d.getElementById("frm1601c:sched1:txtTotal1").value = formatCurrency((NumWithComma(d.getElementById("frm1601c:sched1:txtTotal1").value)*1 + NumWithComma(d.getElementById("frm1601c:sched1:txtAdjustments"+j).value)*1).toFixed(2));       
        }
        d.getElementById("frm1601c:txtTax26").value = d.getElementById("frm1601c:sched1:txtTotal1").value;

        computeTxt27();
    }
    
    function computeTaxAmountStillDue() {

        var tax36 = formatCurrency((NumWithComma(d.getElementById("frm1601c:txtTax31").value)*1 + NumWithComma(d.getElementById("frm1601c:txtTax35").value)*1).toFixed(2));
        d.getElementById("frm1601c:txtTax36").value = formatCurrency(tax36);
        capital();
    }

    function cancelAllCompute()
    {   
        if( d.getElementById('frm1601c:txtTax15').value > 0 || d.getElementById('frm1601c:txtTax18').value > 0 || d.getElementById('frm1601c:txtTax26').value != 0)
        {
            var answer = confirm("You are about to change the value to 'No'. Doing this will clear all computation field. Do you wish to proceed? ")
            if(answer)
            {
                $('#tbllistSectionA').html("");
                
                d.getElementById('frm1601c:txtTax14').value = "0.00";
                d.getElementById('frm1601c:txtTax15').value = "0.00";
                d.getElementById('frm1601c:txtTax16').value = "0.00";
                d.getElementById('frm1601c:txtTax17').value = "0.00";
                d.getElementById('frm1601c:txtTax18').value = "0.00";
                d.getElementById('frm1601c:txtTax19').value = "0.00";
                d.getElementById('frm1601c:txtTax20').value = "0.00";
                d.getElementById('frm1601c:txtTax23').value = "0.00";
                d.getElementById('frm1601c:txtTax25').value = "0.00";
                schedule1 = new Array();

                var count = d.getElementById('tblSched1a').rows.length;
                for(var i=0;i < count; i ++)
                {   d.getElementById('frm1601c:sched1:txtMonthYear'+i).value = "";
                    d.getElementById('frm1601c:sched1:txtDatePaid'+i).value = "";
                    d.getElementById('frm1601c:sched1:txtNumber'+i).value = "";
                    d.getElementById('frm1601c:sched1:txtBankCode'+i).value = "";
                    d.getElementById('frm1601c:sched1:txtTaxPaid'+i).value = "0.00";
                    d.getElementById('frm1601c:sched1:txtShouldTaxDue'+i).value = "0.00";
                   
                }
                d.getElementById('frm1601c:txtTax28').value = "0.00";
                d.getElementById('frm1601c:txtTax29').value = "0.00";
                d.getElementById('frm1601c:txtTax32').value = "0.00";
                d.getElementById('frm1601c:txtTax33').value = "0.00";
                d.getElementById('frm1601c:txtTax34').value = "0.00";
                computeTxt21();
                computeSchedule1();
                computeTxt30();
                computePenalties();
            }else
            {
                d.getElementById('frm1601c:TaxWithheld_1').checked = true;
                d.getElementById('frm1601c:txtTax18').disabled = false;
                
            }
        }else {
           
        }
    
    }

    function disableTaxdue(disable) {
        if(disable) {
            //d.getElementById("frm1601c:txtTax25").disabled = true;
            d.getElementById("frm1601c:txtTax25").value = "0.00";
            d.getElementById("frm1601c:txtTax27").value = "0.00";
        } else {
            d.getElementById("frm1601c:txtTax25").disabled = false;
        }

        computeTxt27();
    }

    function changeAmended(){
        if(d.getElementById("frm1601c:AmendedRtn_1").checked){
            d.getElementById("frm1601c:txtTax28").disabled = false;
        }else {
            d.getElementById("frm1601c:txtTax28").disabled = true;
            d.getElementById("frm1601c:txtTax28").value = "0.00";
        }
        computeTxt30();
    }

      function enableSelTreaty()
    {
            document.getElementById('frm1601c:selTreaty').disabled = false;
            document.getElementById('frm1601c:selTreaty').selectedIndex = 0;
    }
    
    function disableSelTreaty()
    {
        document.getElementById('frm1601c:selTreaty').disabled = true;
        document.getElementById('frm1601c:selTreaty').selectedIndex = 0;
    }
    
    function initialValidateBeforeSave() {
            if( (d.getElementById('frm1601c:txtTIN1').value == "" || d.getElementById('frm1601c:txtTIN2').value == "" || d.getElementById('frm1601c:txtTIN3').value == "" || d.getElementById('frm1601c:txtBranchCode').value == "")  )
            {
                alert("Please enter a valid TIN number on Item 6.");
                return false;
            }   
            if ((d.getElementById('frm1601c:txtRDOCode').value == "000")) {
                alert("Please enter a valid RDO Code on Item 7.");
                return false;
            }
            if( (d.getElementById('frm1601c:txtTaxpayerName').value == "")  )
            {
                alert("Please enter a valid Withholding Agent's Name on Item 8.");
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
var isFromPrint = false;
function printme() {

    $('#bg').hide(); //740
    $('.printSignFooterClass').css({'max-width':'94% !important','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always', 'background':'#ffffff' });  
    $('.imgClass').css({ 'margin':'auto','display':'block','position':'relative','overflow':'visible' });
 
    $('#formPaper').css({'max-width':'8.3in !important'});
    $('#wrapper').css({'max-width':'8.3in !important'});
    $('#container').css({'max-width':'8.3in !important'});  
    
    $('.modalColumnHeader').css({ 'font-size':'10px', 'font-weight':'bold', 'font-family':'Arial, sans-serif, Helvetica'});
    
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
                if (elem[i].type == 'select-one') {
                    document.getElementById(elem[i].id).style.height="18px";
                    document.getElementById(elem[i].id).style.fontSize="12px";
                } else {
                    document.getElementById(elem[i].id).style.height="12px";
                    document.getElementById(elem[i].id).style.fontSize="11px";
                }
            }   
            if(elem[i].type == 'select-one'){
                $( elem[i] ).hide();
                var label = "<div class='labels'>".concat(elem[i].options[elem[i].selectedIndex].innerHTML).concat("&nbsp;</div>");
                $( elem[i] ).after(label);
            }
        }
    }   

    var activePage = document.getElementById('frm1601c:txtCurrentPage').value;

    $('#Page1Content').show();
    $('#Page2Content').show();

    $("#Page1Content").css({ 'border': '3px solid #000','margin-top': '-80px', });
    $("#Page2Content").css({ 'margin-top': '50px', 'border': '3px solid #000' });
    
    $('.printButtonClass').hide();
    $("#formPaper").show();

    window.print();

    $('.printButtonClass').show();
    $("#Page"+activePage+"Content").css({ 'border': 'none' });
    $("#Page1Content").css({'margin-top': '0px', });

    if(activePage == "1"){
        $('#Page1Content').show();
        $('#Page2Content').hide();
    }else {
        $('#Page1Content').hide();
        $('#Page2Content').show();
    }
    isFromPrint = true;
    document.getElementById('frm1601c:txtCurrentPage').disabled = false;
    document.getElementById('frm1601c:txtCurrentPage').readOnly = false;
}   
function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                var data = form.serialize();
              
                save('1601Cv2018',data);
                
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
        saveAndExit('1601Cv2018',data);
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

        submitAndSave('1601Cv2018', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1601Cv2018';
    }
</script>
@endsection
