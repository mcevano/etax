@extends('layouts.app')
@section('title', '| BIR Form No. 1601EQ')
@section('content')

<div class="loader hidden"></div>
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
                    <button type="button" class="btn btn-danger btn-exit" id="1601EQ" company='{{$company->id}}'>No</button>
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
                    <button type="button" class="btn btn-success btn-exit" id="1601EQ" company='{{$company->id}}'>Okay</button>
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
                        <button type="button" class="btn btn-danger btn-filing-success" form='1601EQ' company='{{$company->id}}'>Okay</button>
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
                <div id="wrapper" style="margin: 0 auto; position: relative; width: 932px; ">
                    <table border="0" width="836" cellspacing="0" cellpadding="0" align="center" style="background-repeat: repeat-x;">
                    <tr><td>

                    <div id="formPaper">
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
                                                <font face="Arial" size="6px" style="font-weight:bold;">1601-EQ<br/></font>
                                                <label face="Arial" size="1px">January 2018</label><br/>
                                                <label face="Arial" size="1px"><b>Page 1</b></label>
                                            </td>
                                            <td width="580" align="center">
                                                <font size="5" style="font-weight:bold;">Quarterly Remittance Return</font><br/>
                                                <font size="3"style="font-weight:bold;">of Creditable Income Taxes Withheld (Expanded)</font><br/>
                                                <label face="Arial" size="1px"><i>Enter all required information in CAPITAL LETTERS using BLACK ink. Mark all applicable boxes with an "X". Two copies MUST be filled with the BIR and one held by the Taxpayer.</i></label>
                                            </td>
                                            <td valign="top"><img width="220" height="75px" src="{{ asset('images/Bar Codes/1601EQ_p1.png') }}"/></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <!-- Item 1 to 5 -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="90" valign="top" class="tblFormTd">
                                                <table width="90" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" style="font-size: 11px;">For the Year</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <input type="text" value="" size="4" name="frm1601EQ:txtYear" maxlength="4" id="frm1601EQ:txtYear" onkeypress="return wholenumber(this, event)"onblur=""/>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="230" valign="top" class="tblFormTd">
                                                <table width="230" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" style="font-size: 11px;">Quarter</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                                <td><input type="radio" value="1" name="frm1601EQ:optQuarter" id="frm1601EQ:optQuarter:1" onclick="" /><label for="frm1601EQ:optQuarter1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >1ST</label></td>
                                                                <td><input type="radio" value="2" name="frm1601EQ:optQuarter" id="frm1601EQ:optQuarter:2" onclick="" /><label for="frm1601EQ:optQuarter2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >2ND</label></td>
                                                                <td><input type="radio" value="3" name="frm1601EQ:optQuarter" id="frm1601EQ:optQuarter:3" onclick="" /><label for="frm1601EQ:optQuarter3" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >3RD</label></td>
                                                                <td><input type="radio" value="4" name="frm1601EQ:optQuarter" id="frm1601EQ:optQuarter:4" onclick="" /><label for="frm1601EQ:optQuarter4" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >4TH</label></td>
                                                           
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="160" valign="top" class="tblFormTd">
                                                <table width="140" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1601EQ:optAmend" class="iceSelOneRb-dis fieldText1-dis">
                                                                <div align="center" style="padding: 1px 0 1px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                            <tbody>
                                                                                <tr>
                                                                                        <td><input type="radio" value="Y" name="frm1601EQ:optAmend" id="frm1601EQ:optAmend:Y" onclick="d.getElementById('frm1601EQ:txtTax22').disabled = false;" /><label for="frm1601EQ:optAmendYes" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                        <td><input type="radio" value="N"  name="frm1601EQ:optAmend" id="frm1601EQ:optAmend:N" onclick="d.getElementById('frm1601EQ:txtTax22').disabled = true;d.getElementById('frm1601EQ:txtTax22').value = '0.00';computeTotalTaxCredit()" checked="true" /><label for="frm1601EQ:optAmendNo" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >No</label></td>
                                                                                    
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="156" valign="top" class="tblFormTd">
                                                <table width="140" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;4&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Any Taxes Withheld?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1601EQ:optWithheld" class="iceSelOneRb fieldText1">
                                                                <div align="center" style="padding: 1px 0 1px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="radio" value="Y" name="frm1601EQ:optWithheld" id="frm1601EQ:optWithheld:Y" onclick="taxWheldFlag = true;" /><label for="frm1601EQ:optWithheld:Y" style="font-size:11px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                <td><input type="radio" value="N" name="frm1601EQ:optWithheld" id="frm1601EQ:optWithheld:N" onclick="changeTaxWithheldNO()" /><label for="frm1601EQ:optWithheld:N" style="font-size:11px;" >No</label></td>
                                                                               
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="140" valign="top" class="tblFormTd">
                                                <table width="140" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;5&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">No. of Sheet/s Attached</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" value="0" style="text-align: right;" size="4" name="frm1601EQ:txtNoSheets" maxlength="2" id="frm1601EQ:txtNoSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" /></td>
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
                                <!-- Item 6 & 7 -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="550" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font></td>
                                                        <td width="550">
                                                            <font size="1" style="font-size: 11px;">Taxpayer Identification Number (TIN)&nbsp;&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                                <input type="text"  size="3" value="{{$company->tin1}}" name="frm1601EQ:txtTIN1" maxlength="3" id="frm1601EQ:txtTIN1" onkeypress="return wholenumber(this, event)" style="color:black !important"/>&nbsp;
                                                                <input type="text"  size="3" value="{{$company->tin2}}" name="frm1601EQ:txtTIN2" maxlength="3" id="frm1601EQ:txtTIN2" onkeypress="return wholenumber(this, event)" style="color:black !important"/>&nbsp;
                                                                <input type="text"  size="3" value="{{$company->tin3}}" name="frm1601EQ:txtTIN3" maxlength="3" id="frm1601EQ:txtTIN3" onkeypress="return wholenumber(this, event)" style="color:black !important"/>&nbsp;
                                                                <input type="text"  size="6" value="{{$company->tin4}}" name="frm1601EQ:txtBranchCode" maxlength="5" id="frm1601EQ:txtBranchCode" onkeypress="return letternumber(event)" style="color:black !important"/>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="230" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="80"><font size="2" style="font-weight:bold">&nbsp;7&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                        <td width= "100" id="rdoSelect">
                                                            <select class='iceSelOneMnu' id='frm1601EQ:txtRDOCode' name='frm1601EQ:txtRDOCode' size='1' disabled='true'>
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
                                <!-- Item 8 -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="100%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;&nbsp;</font></td>
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
                                                                    <td width="800"><input type="text" value="{{$company->registered_name != '' ? $company->registered_name : $company->lastname.','. $company->firstname.' '.$company->middlename }}" size="125" name="frm1601EQ:txtTaxpayerName" maxlength="50" id="frm1601EQ:txtTaxpayerName" onblur="return capital(this, event)" /></td>
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
                                <td style="display:none"><input type="text" value="{{$company->line_business}}" size="90" name="frm1601EQ:txtLineBus" maxlength="150" id="frm1601EQ:txtLineBus" /></td>
                            </tr>
                            <tr>
                                <!-- Item 9 & 9A -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="92%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">&nbsp;Registered Address</font>&nbsp;<font size="0.5"><i>(Indicate complete address. If branch, indicate the branch address. If registered address is different from the current address, go to the RDO to update registered address by using BIR Form No.1905)</i></font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="20">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->address}}" size="125" name="frm1601EQ:txtAddress" maxlength="150" id="frm1601EQ:txtAddress" class="iceInpTxt-dis disabled-dis" onblur="return capital(this, event)" /></td>
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
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="20">&nbsp;</td>
                                                                    <td><input type="text" size="90" name="frm1601EQ:txtAddress2" maxlength="150" id="frm1601EQ:txtAddress2" class="iceInpTxt-dis disabled-dis" onblur="return capital(this, event)" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <font size="2" style="font-weight:bold;">9A&nbsp;</font><font size="1" style="font-size: 11px;">ZIP Code</font>
                                                        <td>
                                                            <input type="text" size="9" value="{{$company->zip_code}}" name="frm1601EQ:txtZipCode" maxlength="12" id="frm1601EQ:txtZipCode" onkeypress="return wholenumber(this, event)"/>&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <!-- Item 10 & 11 -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="400" valign="top" class="tblFormTd">
                                                <table width="400" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font><font size="1" style="font-size: 11px;">Contact Number</font>&nbsp;
                                                        <input type="text" size="45" value="{{$company->tel_number}}" name="frm1601EQ:txtTelNum" maxlength="20" id="frm1601EQ:txtTelNum" class="iceInpTxt-dis disabled-dis" onkeypress="return wholenumber(this, event)" />
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="400" valign="top" class="tblFormTd">
                                                <table width="400" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font><font size="1" style="font-size: 11px;">Category of Withholding Agent</font>
                                                       
                                                        <input type="radio" value="P" name="frm1601EQ:optCategory" id="frm1601EQ:optCategory:P" onclick="changeCategory(this)" style="margin-left:2em" /><label for="Private" class="iceSelOneRb fieldText1" style="font-size:11px;" >Private</label>
                                                        <input type="radio" value="G" name="frm1601EQ:optCategory" id="frm1601EQ:optCategory:G" onclick="changeCategory(this)" style="margin-left:2em" /><label for="Government" class="iceSelOneRb fieldText1" style="font-size:11px;" >Government</label>
                                                      
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <!-- Item 12 -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="830" valign="top" class="tblFormTd">
                                                <table width="800" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <font size="2" style="font-weight:bold;">&nbsp;12&nbsp;</font><font size="1" style="font-size: 11px;">Email Address</font>
                                                        <input type="text" size="112" value="{{$company->email_address}}" name="txtEmail" maxlength="20" id="txtEmail" class="iceInpTxt-dis disabled-dis" style="margin-left: 17px" />
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
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="100%" align="center"><font size="2" style="font-weight:bold;">Part II - Computation of Tax</font></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <!-- Item 13 and so on... ATC -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td valign="top" class="tblFormTd">
                                                <table id="tblPartIIComputeTax" style="margin-left:5px;"  border="0" cellpadding="0" cellspacing="0" width="93%">
                                                    <thead>
                                                        <tr>
                                                            <td width="20%" align="center"><font size="1" style="font-weight:bold;font-size: 11px"><a href="#" id="btnAddATCPartII" onclick="showPartIIATC()">ATC</a></font></td>
                                                            <td width="30%" align="center"><font size="1" style="font-weight:bold;font-size: 11px">Tax base <i>(Consolidated for the Quarter)</i></font></td>
                                                            <td width="20%" align="center"><font size="1" style="font-weight:bold;font-size: 11px">Tax Rate</font></td>
                                                            <td width="30%" align="center"><font size="1" style="font-weight:bold;font-size: 11px">Tax Withheld <i>(Consolidated for the Quarter)</i></font></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodyComputeTax"> 
                                                       
                                                    </tbody>
                                                    <tfoot id="tfootComputeTax">
                                                        <tr>
                                                            <td colspan="4">
                                                               
                                                                <div id="lblOtherTax" style="visibility: hidden" >
                                                                    <table width="800" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td width="590"><label><font size="1" style="font-weight:bold;"><a href="#" id="btnOtherTax" onClick="showOtherSelectedTax()">Other Selected ATC</a></font></label></td>
                                                                            <td><input type="text"  value="0.00" id="frm1601EQ:txtTotalOtherTax" name="frm1601EQ:txtTotalOtherTax[]"  style="text-align:right; width:16em !important" disabled/></td>
                                                                        </tr>
                                                                    </table> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <!-- Item 19 to 30 -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="828" border="0" cellspacing="0" cellpadding="0">
                                                    <!-- Item 19 -->
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;&nbsp;</font></td>
                                                        <td width="473"><font size="1" style="font-size: 11px;">&nbsp;Total Taxes Withheld for the Quarter <i>(Sum of Items 13 to 18)</i> </font></td>
                                                        <td width="95">
                                                            <div class="spacePadder"></div>
                                                        </td>
                                                        <td width="187">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold"> &nbsp;19</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1601EQ:txtTax19" maxlength="25" id="frm1601EQ:txtTax19" disabled />
                                                                        </font><font size="2" face="Arial">&nbsp; </font> 
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 20 -->
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;</font></td>
                                                        <td><font size="2" face="Arial, Helvetica, sans-serif"><font size="1" style="font-size: 11px;">Less: Remittances Made: 1<sup style="font-size: 10px">st</sup> Month of the Quarter</font></font></td>
                                                        <td>
                                                            <div class="spacePadder">                                                      </div>
                                                        </td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;20</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1601EQ:txtTax20" maxlength="25" id="frm1601EQ:txtTax20" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeTotalTaxCredit()" />
                                                                        &nbsp;</font> <font size="2" face="Arial">&nbsp; </font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 21 -->
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;</font></td>
                                                        <td><font size="2" face="Arial, Helvetica, sans-serif" style="margin-left: 9em"><font size="1" style="font-size: 11px;">2<sup style="font-size: 10px;">nd</sup> Month of the Quarter</font></font></td>
                                                        <td>
                                                            <div class="spacePadder"></div>
                                                        </td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;21</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1601EQ:txtTax21" maxlength="25" id="frm1601EQ:txtTax21" onblur="round(this,2);computeTotalTaxCredit()" onkeypress="return numbersonly(this, event)" />
                                                                        &nbsp;</font> <font size="2" face="Arial">&nbsp; </font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 22 -->
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;22&nbsp;</font></td>
                                                        <td><font size="1">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif" style="margin-left: 2em"><font size="1" style="font-size: 11px;">Tax Remitted in Return Previously Filed, if this is an amended return</font></font></td>
                                                        <td>
                                                            <div class="spacePadder"></div>
                                                        </td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;22</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1601EQ:txtTax22" maxlength="25" id="frm1601EQ:txtTax22" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeTotalTaxCredit()" />
                                                                        &nbsp;</font> <font size="2" face="Arial">&nbsp; </font> 
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 23 -->
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;23&nbsp;</font></td>
                                                        <td><font size="1">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif" style="margin-left: 2em"><font size="1" style="font-size: 11px;">Over-remittance from Previous Quarter of the same taxable year</font></font></td>
                                                        <td>
                                                            <div class="spacePadder"></div>
                                                        </td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;23</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1601EQ:txtTax23" maxlength="25" id="frm1601EQ:txtTax23" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeTotalTaxCredit()" />
                                                                        &nbsp;</font> <font size="2" face="Arial">&nbsp; </font> 
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>                                                    
                                                    <!-- Item 24 -->
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;24&nbsp;</font></td>
                                                        <td><font size="2" face="Arial, Helvetica, sans-serif"><font size="1" style="font-size: 11px;">Total Remittances Made <i>(Sum of Items 20 to 23)</i></font></font></td>
                                                        <td>
                                                            <div class="spacePadder"></div>
                                                        </td>
                                                        <td><table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;24</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item24}}" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm1601EQ:txtTax24" maxlength="15" id="frm1601EQ:txtTax24" disabled="true"/>
                                                                            &nbsp;</font> <font size="2" face="Arial">&nbsp; </font> </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 25 -->
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;25&nbsp;</font></td>
                                                        <td><font size="1">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif"><font size="1" style="font-size: 11px;"><b>Tax Still Due</b>/(Over-remittance) </font><font face="Arial, Helvetica, sans-serif" size="2"><font size="1" style="font-size: 11px;"><i>(Item 19 less Item 24)</i></font></font></font></td>
                                                        <td>
                                                            <div class="spacePadder"></div>
                                                        </td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;25</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item25}}" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm1601EQ:txtTax25" maxlength="25" id="frm1601EQ:txtTax25" disabled="true" />
                                                                            &nbsp;</font> <font size="2" face="Arial">&nbsp; </font> </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 26-->
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" style="font-size: 11px;">&nbsp;Add: Penalties</font><font size="2" style="font-weight:bold;">&nbsp;26&nbsp;</font><font size="1" face="Arial" style="font-size: 11px;">Surcharge</font></td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="36"><font size="2" face="Arial" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;26</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item26}}" style="color: black; text-align: right;" size="20" name="frm1601EQ:txtTax26" maxlength="25" id="frm1601EQ:txtTax26" onblur="round(this,2);computePenalties()" />
                                                                            <input type="hidden" name="frm1601EQ:inputSurcharge" id="frm1601EQ:inputSurcharge" />
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 27 -->
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2"><font size="2" style="font-weight:bold; margin-left:5.4em">&nbsp;&nbsp;27&nbsp;</font><font size="1" face="Arial" style="font-size: 11px;">Interest</font></td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="36"><font size="2" face="Arial" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;27</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item27}}" style="color: black; text-align: right;" size="20" name="frm1601EQ:txtTax27" maxlength="25" id="frm1601EQ:txtTax27" onblur="round(this,2);computePenalties()" />
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 28 -->
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2"><font size="2" style="font-weight:bold; margin-left:5.4em">&nbsp;&nbsp;28&nbsp;</font><font size="1" face="Arial" style="font-size: 11px;">Compromise</font></td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="36"><font size="2" face="Arial" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;28</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item28}}" style="color: black; text-align: right;" size="20" name="frm1601EQ:txtTax28" maxlength="25" id="frm1601EQ:txtTax28" onblur="round(this,2);computePenalties()" />
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 29 -->
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2"><font size="2" style="font-weight:bold; margin-left:5.4em">&nbsp;&nbsp;29&nbsp;</font><font size="1" face="Arial" style="font-size: 11px;">Total Penalties <i>(Sum of Items 26 to 28)</i></font></td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="36"><font size="2" face="Arial" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;29</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item29}}" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm1601EQ:txtTax29" maxlength="25" id="frm1601EQ:txtTax29" disabled="true" />
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 30 -->
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;30&nbsp;</font></td>
                                                        <td colspan="2"><font size="1">&nbsp;</font><font size="1" face="Arial" style="font-size: 11px;"><b>TOTAL AMOUNT STILL DUE</b>/(Over-remittance)<i>(Sum of Items 25 and 29)</i></font></td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;<font size="2" style="font-weight:bold;">30</font></font>&nbsp;</font></td>
                                                                        <td><font size="1">
                                                                                <input type="text" value="{{$action == 'new' ? '0.00' : $data->item30}}" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm1601EQ:txtTax30" maxlength="25" id="frm1601EQ:txtTax30" disabled="true" class="iceInpTxt-dis" />
                                                                                &nbsp;</font> <font size="2" face="Arial">&nbsp; </font> </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!-- Item If remittance -->
                                        <tr>
                                            <td class="tblFormTd">
                                                <table >
                                                    <tr>
                                                        <td><font>&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">&nbsp;If over-remittance, mark one (1) box only</font></td>
                                                        <td><input type="checkbox" value="Yes"  name="frm1601EQ:ifRefund" id="frm1601EQ:ifRefund" onclick="checkRefund()" disabled="true"/><label for="refund" class="" style="font-size:11px;" >To be Refunded</label></td>
                                                        <td><input type="checkbox" value="Yes" name="frm1601EQ:ifIssueCert" id="frm1601EQ:ifIssueCert" onclick="checkIssueCert()" disabled="true"/><label for="issueCert" class="" style="font-size: 11px;" >To be issued Tax Credit Certificate</label></td>
                                                        <td><input type="checkbox" value="Yes" name="frm1601EQ:ifCarriedOver" id="frm1601EQ:ifCarriedOver" onclick="checkCarriedOver()" disabled="true"/></td>
                                                        <td><label for="carriedOver" class="" style="font-size:11px;" >To be carried over to the next quarter within the same <br/> calendar year (not applicable for succeeding year)</label></td>
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
                                                <td colspan="4" style="text-align: left; ">&nbsp;&nbsp;&nbsp;&nbsp;I/We declare under the penalties of perjury that this remittance form, and all its attachments, has been made in good faith, verified by me/us, and to the best of my/our knowledge and belief, is
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
                                                    Authorized Officer or Representative/Tax Agent <i>(Indicate Title/Designation and TIN)</i></td>
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
                                                                <input type="text" value="" id="txtTaxAgentNo" size="25" maxlength="20" disabled/>
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
                                                               <input type="text" size="15" value="" id="txtDateIssue" maxlength="10" disabled/>
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
                                                                <input type="text" size="15" value="" id="txtDateExpiry" maxlength="10" disabled/>
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
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;31&nbsp;&nbsp;&nbsp;</font><font size="1">Cash/Bank Debit Memo </font></td>
                                                            <td><input type="text" value="" size="23" name="frm1601EQ:txtAgency33" maxlength="50" id="frm1601EQ:txtAgency33" disabled/></td>
                                                            <td><input type="text" value="" size="23" name="frm1601EQ:txtNumber33" maxlength="50" id="frm1601EQ:txtNumber33" disabled/></td>
                                                            <td><input type="text" value="" size="23" name="frm1601EQ:txtDate33" maxlength="10" id="frm1601EQ:txtDate33" disabled/></td>
                                                            <td><input type="text" value="" style="text-align: right" size="20" name="frm1601EQ:txtAmount33" maxlength="50" id="frm1601EQ:txtAmount33" disabled/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;32&nbsp;&nbsp;&nbsp;</font><font size="1">Check </font></td>
                                                            <td><input type="text" value="" size="23" name="frm1601EQ:txtAgency34" maxlength="50" id="frm1601EQ:txtAgency34" disabled/></td>
                                                            <td><input type="text" value="" size="23" name="frm1601EQ:txtNumber34" maxlength="50" id="frm1601EQ:txtNumber34" disabled/></td>
                                                            <td><input type="text" value="" size="23" name="frm1601EQ:txtDate34" maxlength="10" id="frm1601EQ:txtDate34" disabled/></td>
                                                            <td><input type="text" value="" style="text-align: right" size="20" name="frm1601EQ:txtAmount34" maxlength="50" id="frm1601EQ:txtAmount34" disabled/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;33&nbsp;&nbsp;&nbsp;</font><font size="1">Tax Debit Memo </font></td>
                                                            <td><input type="text" value="" size="23" name="frm1601EQ:txtAgency35" maxlength="50" id="frm1601EQ:txtAgency35" disabled/></td>
                                                            <td><input type="text" value="" size="23" name="frm1601EQ:txtNumber35" maxlength="50" id="frm1601EQ:txtNumber35" disabled/></td>
                                                            <td><input type="text" value="" size="23" name="frm1601EQ:txtDate35" maxlength="10" id="frm1601EQ:txtDate35" disabled/></td>
                                                            <td><input type="text" value="" style="text-align: right" size="20" name="frm1601EQ:txtAmount35" maxlength="50" id="frm1601EQ:txtAmount35" disabled/></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5"><font size="2" style="font-weight:bold;">&nbsp;34&nbsp;&nbsp;&nbsp;</font><font size="1">Others <i>(specify below)</i> </font></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" value="" size="20" name="frm1601EQ:txtParticular36" maxlength="50" id="frm1601EQ:txtParticular36" disabled/></td>
                                                            <td><input type="text" value="" size="23" name="frm1601EQ:txtAgency36" maxlength="50" id="frm1601EQ:txtAgency36" disabled/></td>
                                                            <td><input type="text" value="" size="23" name="frm1601EQ:txtNumber36" maxlength="50" id="frm1601EQ:txtNumber36" disabled/></td>
                                                            <td><input type="text" value="" size="23" name="frm1601EQ:txtDate36" maxlength="10" id="frm1601EQ:txtDate36" disabled/></td>
                                                            <td><input type="text" value="" style="text-align: right" size="20" name="frm1601EQ:txtAmount36" maxlength="50" id="frm1601EQ:txtAmount36" disabled/></td>
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
                                <td colspan="4" style="text-align: left; font-family:arial; font-size:10px;">NOTE: *Please read the BIR Data Privacy Policy found in the BIR website (www.bir.gov.ph) <br></td> 
                            </tr>
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
                                                                        <td width="697" style="width: 100%">
                                                                            <div id="frm1601EQ:j_id743" class="icePnlGrp" style="border-bottom: #AAAAAA 1px solid;">
                                                                                <div align="center">
                                                                                    @if($action != 'view')
                                                                                    <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm1601EQ:cmdValidate" id="frm1601EQ:cmdValidate" onclick="validateForm()" />
                                                                                    <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm1601EQ:cmdEdit" id="frm1601EQ:cmdEdit" onclick="enableAllControl()"/>
                                                                                    <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                    <input class="printButtonClass" type="button" value="{{$action == 'new' ? 'Save' : 'Update'}}" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData()" />
                                                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                    <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1601EQ:btnFinalCopy" id="frm1601EQ:btnFinalCopy" onclick="submitForm();" />
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
                                   <div class="footer" style="padding:6px; text-align: center; font-size: 11px; background-color: white; width: 100%;">
                                        <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div id="DummyTxt" style='display:none;'>  </div>
                    </div>

                    </td>
                    </tr>
                    </table>

                </div>
            </div>

            <!--Start Modal for ATC-->
            <div id="modalAtc" class="aBox" style="width:90%; display:none; min-height:500px; position:relative; top:14%; left:5%; right:5%; overflow-y:auto; overflow-x:hidden; background:#fff;z-index: 1" align="">
                <br/>
                <div align="center" style="width: 98%">
                    <table cellspacing="3" cellpadding="3" style="position: static; width: 100%">
                        <tr>
                            <td></td>
                            <td class="modalHeader" align="left" width="auto">&nbsp;&nbsp;&nbsp;<b>ATC</b></td>
                            <td class="modalHeader" left="150px" width="auto"><b>Description</b></td>
                            <td class="modalHeader" align="right"><b>Rate %</b></td>
                        </tr>
                        <tr>
                            <td colspan="4"><hr/></td>
                        </tr>
                    </table>
                </div>

                <div class="modalColumnHeader" style="height:auto;width: auto; overflow:visible;padding: 0px 20px;">
                    <table id="tbllistAtcCode" cellspacing="0" cellpadding="0" style="width: 100%;padding:1%;">
                        
                    </table>
                    <div align="center">
                        <input type="button" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getATCCode()" />
                    </div>
                </div>
                <br />
            </div>

            <!--End Modal for ATC-->
            <input type="text" id="hPartIITableSize"  value="" style="visibility: hidden;width: 0px"/>

            <!--Start Modal for other selected ATC-->
            <div id="modalOtherAtc" class="modalShow"  border="0" style="text-align:center; display:none; width:830px; min-height: 400px;margin: auto">
                <br />
                <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                    <tr>
                        <td colspan="7"><font size="2" style="font-weight:bold;">OTHER SELECTED ATC</font></td>
                    </tr>
                    <tr>
                        <td valign="top" class="tblFormTd">
                            <table id="tblPartIIOtherTax" style="margin-left:5px;"  border="0" cellpadding="0" cellspacing="0" width="93%">
                                <thead>
                                    <tr>
                                        <td width="20%" align="center"><font size="1" style="font-weight:bold;">ATC</font></td>
                                        <td width="30%" align="center"><font size="1" style="font-weight:bold;">Tax base <i>(Consolidated for the Quarter)</i></font></td>
                                        <td width="20%" align="center"><font size="1" style="font-weight:bold;">Tax Rate</font></td>
                                        <td width="30%" align="center"><font size="1" style="font-weight:bold;">Tax Withheld <i>(Consolidated for the Quarter)</i></font></td>
                                    </tr>
                                </thead>
                                <tbody id="tbodyOtherTax"> 
                                    
                                </tbody>
                                <tfoot id="tfootOtherTax">
                                    <tr>
                                        <td colspan="7">
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="button" value=" Print " id="btnPrintOtherAtc" onclick="printModal()" disabled/>&nbsp;&nbsp;&nbsp;
                                            <input type="button" value=" Close " onclick="closeOtherSelectedTax()" />&nbsp;&nbsp;&nbsp;
                                            <input type="button" value=" Clear " id="btnClearOtherAtc" onclick="clearpart2()" />&nbsp;&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </td>
                    </tr>
                </table>     
                <br />
            </div>
           
        <!-- Send Email -->
        <div id="hiddenEnroll" style="display:none;"  >
            <input id="txtFinalFlag" class="FinalFlag" name="txtFinalFlag" type="text" onblur="" onkeypress="" value="0" maxlength="60"   />
            <input id="txtEnroll" name="txtEnroll" type="text" onblur="" onkeypress="" value="N" maxlength="60"   />
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
        <div id="responseATC" style="display:none;"><!--loaded ATC files render here--></div>
        <div id="responseTreatyCode" style="display:none;"><!--loaded Treaty Code files render here--></div>
        <div id="responseTaxTypeCode" style="display:none;"><!--loaded Tax Type Code files render here--></div>
        <div id="responseRdo" style="display:none;"><!--loaded files render here--></div>
@endsection

@section('scripts')
<script type="text/javascript">
    var isSubmitFinal = false;
    var isSubmit = false;

    var gIsReadOnly = false;
    var atcList = new Array();
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

    function atcPropertyJS(formType, atcCode, description, rate, category, base, compType, constTaxDue, minimum, maximum)
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
    }

  //Declare global variable -mark p.
  var ATCnameCode = new Array() ; //used
  var NaturePayment = new Array() ; //used
  var taxRate = new Array(); //used
  var ATCCodeList = new Array();
  var str;
  var previoustbllistAtcCode;
  var taxWheldFlag = false; //used
    /*----------------------------------*/
    //Added by MPISCOSO
  var d=document,data='',XMLBGFile='',XMLFile='', XMLATCFile='',msg = d.getElementById('msg');
     var loader=d.getElementById('loader');
    /*----------------------------------*/
  str = setInterval("sleeptime()", 300);
    var globalEmail = "";

  function sleeptime(){
        clearInterval(str);
        loadXMLATC('/xml/atcCodes.xml');
        init();

        var xmlFileName = document.getElementById('file_name').value; 
        fileName = xmlFileName;
        if (fileName != null && fileName.indexOf('.xml') > -1) {
            var tin = fileName.split("/")[1].split("-");
           
            loadXML(fileName);

            d.getElementById('frm1601EQ:txtYear').disabled = true;

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
        document.getElementById('frm1601EQ:txtTIN1').disabled = true; 
        document.getElementById('frm1601EQ:txtTIN2').disabled = true; 
        document.getElementById('frm1601EQ:txtTIN3').disabled = true; 
        document.getElementById('frm1601EQ:txtBranchCode').disabled = true;

        if(d.getElementById('frm1601EQ:optAmend:Y').checked == true){
            d.getElementById('frm1601EQ:txtTax22').disabled = false;
        } else {
            d.getElementById('frm1601EQ:txtTax22').disabled = true;
        }

        if(d.getElementById('frm1601EQ:optWithheld:Y').checked == true){
            taxWheldFlag = true;
        }else{
            taxWheldFlag = false;
        }
    }

  
    function init(){
        var month = new Date();
        var year = new Date();

        d.getElementById('frm1601EQ:txtYear').value = year.getFullYear();
        d.getElementById('frm1601EQ:optQuarter:1').disabled = false;
        d.getElementById('frm1601EQ:optQuarter:2').disabled = false;
        d.getElementById('frm1601EQ:optQuarter:3').disabled = false;
        d.getElementById('frm1601EQ:optQuarter:4').disabled = false;
        d.getElementById('frm1601EQ:optAmend:Y').disabled = false;
        d.getElementById('frm1601EQ:optAmend:N').disabled = false;
        d.getElementById('frm1601EQ:txtNoSheets').disabled = false;
        d.getElementById('frm1601EQ:txtTIN1').disabled = true;
        d.getElementById('frm1601EQ:txtTIN2').disabled = true;
        d.getElementById('frm1601EQ:txtTIN3').disabled = true;
        d.getElementById('frm1601EQ:txtBranchCode').disabled = true;
        d.getElementById('frm1601EQ:txtTaxpayerName').disabled = true;
        d.getElementById('frm1601EQ:txtAddress').disabled = true;
        d.getElementById('frm1601EQ:txtAddress2').disabled = true;
        d.getElementById('frm1601EQ:txtTelNum').disabled = true;
        d.getElementById('frm1601EQ:txtZipCode').disabled = true;
        d.getElementById('txtEmail').disabled = true;

        @if($action != 'view')
        d.getElementById('frm1601EQ:cmdEdit').disabled = true;
        d.getElementById('frm1601EQ:btnFinalCopy').disabled = true;
        d.getElementById('btnPrint').disabled = true;

        d.getElementById('frm1601EQ:txtTax23').disabled = false;
        @else 
        disableAllControl();
        @endif

        
       
        populateAtcPart2();
    }

    /*--------------------------------------------------------------*/
    //
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
        d.getElementById('responseATC').innerHTML=xmlHTTP.responseText;
        loadATC();                       
                
        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            gIsReadOnly = true;
        }
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

            //Ensure that before writing to atcPropertyJS the formType 1601EQ is traceable in atcStr
            if (atcStr.indexOf('1601EQ') >= 0) {
                var atcValues = atcStr.split('~');

                    var formType = "1601EQ";
                    var atcCode = atcValues[0];
                    var description = atcValues[1];
                    var rate = atcValues[2];
                    var category = atcValues[3];

                    var base = '';
                    var compType = '';
                    var constTaxDue = '';
                    var minimum = '';
                    var maximum = '';

                    var objATC = new atcPropertyJS(formType, atcCode, description, rate, category, base, compType, constTaxDue, minimum, maximum);
                    atcList[j] = objATC;
                    j++;
                    //alert('1601EQ successfully created array #'+i);

            } else {
                //alert('1601EQ not found in array #'+i);
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
        }
        document.getElementById("response").innerHTML=xmlHTTP.responseText;
        loadData();

        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
                gIsReadOnly = true;
        }

        if (gIsReadOnly) {
                d.getElementById('frm1601EQ:cmdValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
        }
        
    }

    function loadData() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");
        var elem = document.getElementById('frmMain').elements;
        var fieldVal = "";
        for(var i = 0; i < elem.length; i++) {
            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&
                if (elem[i].type == 'text' || elem[i].type == 'select-one'){
                    if(elem[i].id != 'frm1601EQ:txtAddress2'){
                        fieldVal = String( $("#response").html() ).split(elem[i].id+'=');
                    }else{
                        fieldVal = String( $("#response").html() ).split("frm1601EQ:txtAddress=");
                    }

                    if (fieldVal != null && fieldVal.length > 1) {
                        if(elem[i].id == 'frm1601EQ:txtTaxpayerName'){
                                elem[i].value = unescape(fieldVal[1]);
                        }else if(elem[i].id == 'frm1601EQ:txtAddress'){
                                if(fieldVal[1].length <= 127){
                                    elem[i].value = unescape(fieldVal[1]);
                                }
                                else {
                                    elem[i].value = unescape(fieldVal[1].substring(0, 127));
                                }
                        }else if(elem[i].id == 'frm1601EQ:txtAddress2'){
                                if(fieldVal[1].length <= 127){
                                    elem[i].value = '';
                                }
                                else {
                                    elem[i].value = unescape(fieldVal[1].substring(127, fieldVal[1].length));
                                }
                        }else if (elem[i].className.indexOf("FinalFlag") > -1) {
                            elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                        }else{
                            elem[i].value = fieldVal[1]; //all select-one and text values               
                        }
                    }               
                }
                
                if (elem[i].type == 'radio') {
                    var rdoVal = String( $("#response").html() ).split(elem[i].id+'=');
                    if (rdoVal[1] == 'true') {
                        elem[i].checked = rdoVal[1];
                        if (elem[i].id == 'frm1601EQ:optCategory:P' || elem[i].id == 'frm1601EQ:optCategory:G') {
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
            }

        }
        getATCCode();
        window.setTimeout("loadDataATCRow();",105);
    }

    function loadDataATCRow() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++) {

            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    if(elem[i].id != 'frm1601EQ:txtAddress2'){
                        fieldVal = String( $("#response").html() ).split(elem[i].id+'=');
                    }else{
                        fieldVal = String( $("#response").html() ).split("frm1601EQ:txtAddress=");
                    }

                    if (fieldVal != null && fieldVal.length > 1) {
                        if(elem[i].id == 'frm1601EQ:txtTaxpayerName'){
                                elem[i].value = unescape(fieldVal[1]);
                        }else if(elem[i].id == 'frm1601EQ:txtAddress'){
                                if(fieldVal[1].length <= 127){
                                    elem[i].value = unescape(fieldVal[1]);
                                }
                                else {
                                    elem[i].value = unescape(fieldVal[1].substring(0, 127));
                                }
                        }else if(elem[i].id == 'frm1601EQ:txtAddress2'){
                                if(fieldVal[1].length <= 127){
                                    elem[i].value = '';
                                }
                                else {
                                    elem[i].value = unescape(fieldVal[1].substring(127, fieldVal[1].length));
                                }
                        }else if (elem[i].className.indexOf("FinalFlag") > -1) {
                            elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                        }else{
                            elem[i].value = fieldVal[1]; //all select-one and text values               
                        }
                    }               
                }
            }
        }
    }

    function doesFileExists(xmlFile) {
        var fileSysObj = new ActiveXObject("Scripting.FileSystemObject");
        if (fileSysObj.FileExists(xmlFile)) {
            return true;
        } else {
            return false;
        }
    }

    function isItAnAmendedReturn(xmlFile) {
        if(d.getElementById('frm1601EQ:optAmend:Y').checked) {
            return true;
        } else {
            return false;
        }
    }

    //ATC List for 1601EQ Private Withholding Agent -mark p.
    function getPrivateWithholdingAgentATC(){
        ATCnameCode = new Array() ;
        NaturePayment = new Array() ;
        taxRate = new Array();

        //var atcSize = atcList.getSize();
        var atcSize = atcList.length;

        var i = 0;
        var j = 1;
        NaturePayment[0] = "NO VALUE";
        for(i = 0; i < atcSize; i++) {
            var atc = atcList[i];


            if(atc.formType == "1601EQ" && atc.category == 'P') {
                str = str + atc.atcCode + " " + atc.description + " " + atc.rate + "\n" ;
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j] = atc.description;
                taxRate[j++] = atc.rate;
            }
        }
    }

   
    function getGovernmentWithholdingAgentATC(){
        ATCnameCode = new Array() ;
        NaturePayment = new Array() ;
        taxRate = new Array();


        //var atcSize = atcList.getSize();
        var atcSize = atcList.length;

        var i;
        var j=1;
        var str = "";
        NaturePayment[0] = "NO VALUE";
        for(i = 0; i < atcSize; i++) {
            //var atc = atcList.get(i);
            var atc = atcList[i];

            if(atc.formType == "1601EQ" && atc.category == 'G') {
                str = str + atc.atcCode + " " + atc.description + " " + atc.rate + "\n" ;
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j] = atc.description;
                taxRate[j++] = atc.rate;
            }

        }
    }

    //ATC List is varies depending on Category P or G -markp
    function changeCategory(e){
        var valCategory = e.value;
        if(d.getElementById('frm1601EQ:txtAtcCd1').value != ""){
            if(confirm("By changing Category your selected ATC will be remove.")){
                d.getElementById('frm1601EQ:txtTax19').value = (0).toFixed(2);
                d.getElementById('frm1601EQ:txtTax20').value = (0).toFixed(2);
                d.getElementById('frm1601EQ:txtTax21').value = (0).toFixed(2);
                d.getElementById('frm1601EQ:txtTax22').value = (0).toFixed(2);
                d.getElementById('frm1601EQ:txtTax23').value = (0).toFixed(2);
                d.getElementById('frm1601EQ:txtTax24').value = (0).toFixed(2);
                d.getElementById('frm1601EQ:txtTax25').value = (0).toFixed(2);
                d.getElementById('frm1601EQ:txtTax26').value = (0).toFixed(2);
                d.getElementById('frm1601EQ:txtTax27').value = (0).toFixed(2);
                d.getElementById('frm1601EQ:txtTax28').value = (0).toFixed(2);
                d.getElementById('frm1601EQ:txtTax29').value = (0).toFixed(2);
                d.getElementById('frm1601EQ:txtTax30').value = (0).toFixed(2);
                $('#tbodyComputeTax').html("");
                for(i =1 ; i < d.getElementById('tbllistAtcCode').rows.length; i++) {
                    d.getElementById('AtcCode'+i).checked = false;
                }
                d.getElementById('lblOtherTax').style.visibility = "hidden";
                // draw empty table
                $('#tbodyComputeTax tr').remove();
                $('#tbodyOtherTax tr').remove();
                populateAtcPart2();
                changedrpATCList(valCategory);
            }else{
                if(valCategory == "P"){
                    d.getElementById('frm1601EQ:optCategory:P').checked = false;
                    d.getElementById('frm1601EQ:optCategory:G').checked = true;
                }else{
                    d.getElementById('frm1601EQ:optCategory:G').checked = false;
                    d.getElementById('frm1601EQ:optCategory:P').checked = true;
                }
            }
        }else{
            changedrpATCList(valCategory);
        }

    }

    //Getting ATC list depends on Category -mark p.
    function changedrpATCList(e){
        var i;
        if(e == "P"){
            // change ATClist
            getPrivateWithholdingAgentATC();
        }else if(e == "G"){
            // change ATClist
            getGovernmentWithholdingAgentATC();
        }

        $('#tbllistAtcCode').html("");

        for(i = 1 ; i < ATCnameCode.length ; i++  ){
            $('#tbllistAtcCode').html(d.getElementById('tbllistAtcCode').innerHTML +
                "<tr class='atc'>" +
                "    <td width='10%' class='atc'> <input id='AtcCode"+i+"' name='AtcCode"+i+"' type='checkbox' value='" + ATCnameCode[i] + "' /> " + ATCnameCode[i] + "</td>" +
                "    <td width='85%' id='AtcNaturePayment"+i+"' class='atc atcNames' >" + NaturePayment[i].split('<=').join('&lt;=')+ "</td>" +
                "    <td width='5%' id='txtRate"+i+"' class='atc'> " + taxRate[i] + "</td>" +
                "</tr>");
        }

    }

    function cancelPartIIATC(){
        d.getElementById('wrapper').style.display = 'block';
        if ( $('#modalAtc').css('display') != 'none' ) {
            $('#modalAtc').hide('blind');
        }

        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");
        for(i =1 ; i < d.getElementById('tbllistAtcCode').rows.length; i++)
        {
            d.getElementById('AtcCode'+i).checked = ATCCodeList[i];
        }
    }

    //Show ATC modal -markp
    var tempATC = new Array();
    var tempATCTaxbase = new Array();
    function showPartIIATC(){
        tempATC = new Array();
            tempATCTaxbase = new Array();
            
            if(d.getElementById('frm1601EQ:txtAtcCd1').value != ""){
                var totalRows = (d.getElementById('tblPartIIComputeTax').rows.length + d.getElementById('tblPartIIOtherTax').rows.length) - 4;
                for(var i = 0; i < totalRows; i++) {
                    tempATC[i] = d.getElementById('frm1601EQ:txtAtcCd'+ (i + 1)).value;
                    tempATCTaxbase[i] = d.getElementById('frm1601EQ:txtTaxBase'+ (i + 1)).value;
                }
            }
            

            if( checkiftaxwheldisYes() == true )
            {
                d.getElementById('wrapper').style.display = "none";
                $('#modalAtc').show('blind');
            }else {
                alert(checkiftaxwheldisYes());
            }
    }

    //Show Other Selected ATC modal -markp
    function showOtherSelectedTax(){
        d.getElementById('wrapper').style.display = "none";
        $('#modalOtherAtc').show('blind');

    }

    //Close Other Selected ATC modal -markp
    function closeOtherSelectedTax(){
        d.getElementById('wrapper').style.display = 'block';
        $('#modalOtherAtc').hide('blind');
    }

    //Checking if selected is Yes -markp
    function checkiftaxwheldisYes(){
        if(d.getElementById('frm1601EQ:optWithheld:Y').checked == false && d.getElementById('frm1601EQ:optWithheld:N').checked == false )
        {
            return "Please select an option for Item 4.";
        }
        else if( d.getElementById('frm1601EQ:optCategory:P').checked == false && d.getElementById('frm1601EQ:optCategory:G').checked == false  )
        {
            return "Please select an option for Item 11.";
        }
        else if( d.getElementById('frm1601EQ:optWithheld:Y').checked == true )
        {
            return true;
            taxWheldFlag = true;
        }
        else
        {
            return "Selecting an ATC is not necessary when item no. 4 is set to ' NO '";
        }
    }

    //populate table ATC on Items 13 to 18
    function populateAtcPart2(){
        $('#tbodyComputeTax').html("");
        var itemNum = 13;
        for(i=1; i <= 6; i++){
            $('#tbodyComputeTax').html(  d.getElementById('tbodyComputeTax').innerHTML +
                "<tr>" +
                "<td><font size='2' style='font-weight:bold; width:1em !important'>"+itemNum+"&nbsp;&nbsp;</font>"+
                    " <input type='text' id='frm1601EQ:txtAtcCd"+i+"' name='frm1601EQ:txtAtcCd[]' style='text-align: center; width:10em !important' value='' disabled/></td>" +
                "<td style='text-align: center;'> <input type='text' id='frm1601EQ:txtTaxBase"+i+"' name='frm1601EQ:txtTaxBase[]' style='width:17em !important; text-align:right' value='' disabled/> </td>" +
                "<td style='text-align: center;'> <input type='text' id='frm1601EQ:txtTaxRate"+i+"' name='frm1601EQ:txtTaxRate[]' style='text-align: center;width:160px;' value='' disabled /><font size='2' style='font-weight:bold'>&nbsp;%</font></td>"+
                "<td style='text-align: center;'> <input type='text' id='frm1601EQ:txtTaxbeWithHeld"+i+"' name='frm1601EQ:txtTaxbeWithHeld[]' style='text-align:right; width:16em !important' value='0.00' disabled /> </td>" +
                "</tr>") ;
            itemNum++;
        }
    }

    function setInputTextControl_HorizontalAlignment(id,align) {
        if (d.getElementById(id) != null) {
        //d.getElementById(id).textIndent = parseInt(align);
        d.getElementById(id).style.textAlign = "right";
        }
    }
    function setInputTextControl_NumberFormatter(id,limit,deci) {
        d.getElementById(id).size = parseInt(limit);
        d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed( parseInt(deci) );
    }

    //After selecting ATC in modal and clicking OK -markp
    function getATCCode(){
        try{
            var listATCtable =   d.getElementById('tbllistAtcCode');
            $('#tbodyComputeTax').html("");
            $('#tbodyOtherTax').html("");
            var countAtcChecked = 0;
            var itemNum = 12;
            var itemNum2 = 0;

            //just need to get the total checked rows 
            for(i = 1 ; i <= listATCtable.rows.length; i++){
                if (d.getElementById('AtcCode'+i).checked == true ){
                    countAtcChecked ++;
                }
            }
            if(countAtcChecked < 7){
                d.getElementById('lblOtherTax').style.visibility = "hidden";
                var table = d.getElementById("tblPartIIComputeTax");
                var iCtr = table.rows.length; iCtr--; 
                for(i = 1 ; i <= listATCtable.rows.length; i++ ){ 
                    ATCCodeList[i] = d.getElementById('AtcCode'+i).checked;
                    if (d.getElementById('AtcCode'+i).checked == true ){
                        itemNum ++; 
                        var taxbasetemp = "";
                        for(var tempCount = 0 ; tempCount < tempATC.length; tempCount++) {
                            if(tempATC[tempCount] == d.getElementById('AtcCode'+i).value){
                                taxbasetemp = tempATCTaxbase[tempCount];
                                break;
                            }
                        }
                        
                        $('#tbodyComputeTax').html(  d.getElementById('tbodyComputeTax').innerHTML +
                            "<tr>" +
                            "<td><font size='2' style='font-weight:bold; width:1em !important'>"+itemNum+"&nbsp;&nbsp;</font>"+
                                " <input type='text' id='frm1601EQ:txtAtcCd"+iCtr+"' name='frm1601EQ:txtAtcCd[]' style='text-align: center; width:10em !important' value='"+ d.getElementById('AtcCode'+i).value + "' readonly/></td>" +
                            "<td style='text-align: center;'> <input type='text' id='frm1601EQ:txtTaxBase"+iCtr+"' name='frm1601EQ:txtTaxBase[]' style='width:17em !important; text-align:right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld("+iCtr+"); computeofTotalWithheldTax()' value='"+ taxbasetemp + "'/> </td>" +
                            "<td style='text-align: center;'> <input type='text' id='frm1601EQ:txtTaxRate"+iCtr+"' name='frm1601EQ:txtTaxRate[]' style='text-align: center;width: 160px;' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld("+iCtr+"); computeofTotalWithheldTax()' value='"+ d.getElementById('txtRate'+i).innerHTML +"' readonly/><font size='2' style='font-weight:bold'>&nbsp;%</font></td>"+
                            "<td style='text-align: center;'> <input type='text' id='frm1601EQ:txtTaxbeWithHeld"+iCtr+"' name='frm1601EQ:txtTaxbeWithHeld[]' style='text-align:right; width:16em !important' value='0.00' readonly /> </td>" +
                            "</tr>") ;
                        setTimeout("d.getElementById('frm1601EQ:txtAtcCd"+iCtr+"').disabled = true; setInputTextControl_HorizontalAlignment('frm1601EQ:txtTaxBase"+iCtr+"', 4);" +
                        "d.getElementById('frm1601EQ:txtTaxbeWithHeld"+iCtr+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601EQ:txtTaxbeWithHeld"+iCtr+"', 4);" +
                        "d.getElementById('frm1601EQ:txtTaxRate"+iCtr+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601EQ:txtTaxRate"+iCtr+"', 4);" +
                            "getRequiredWithheld("+iCtr+");", 100);

                        if (d.getElementById('AtcCode'+i).value == "N/A") {
                            setTimeout("d.getElementById('frm1601EQ:txtTaxRate"+iCtr+"').disabled = false;", 100);
                        }
                        waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601EQ:txtTaxBase"+iCtr+"', 15, 2); d.getElementById('frm1601EQ:txtTaxBase"+iCtr+"').value = '" + taxbasetemp + "'" , 100);
                        waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601EQ:txtTaxbeWithHeld"+iCtr+"', 15, 2); getRequiredWithheld(" + iCtr + ");", 100);
                        iCtr++; 
                    }
                }
                if(itemNum <= 18){
                    for(i=iCtr; i <= 6; i++){
                        itemNum++;
                        $('#tbodyComputeTax').html(  d.getElementById('tbodyComputeTax').innerHTML +
                        "<tr>" +
                        "<td><font size='2' style='font-weight:bold; width:1em !important'>"+itemNum+"&nbsp;&nbsp;</font>"+
                            " <input type='text' id='frm1601EQ:txtAtcCd"+i+"' name='frm1601EQ:txtAtcCd[]'  style='text-align: center; width:10em !important' value='' disabled/></td>" +
                        "<td style='text-align: center;'> <input type='text' id='frm1601EQ:txtTaxBase"+i+"' name='frm1601EQ:txtTaxBase[]' style='width:17em !important; text-align:right' value='' disabled/> </td>" +
                        "<td style='text-align: center;'> <input type='text' id='frm1601EQ:txtTaxRate"+i+"' name='frm1601EQ:txtTaxRate[]' style='text-align: center;width: 160px;' value='' disabled /><font size='2' style='font-weight:bold'>&nbsp;%</font></td>"+
                        "<td style='text-align: center;'> <input type='text' id='frm1601EQ:txtTaxbeWithHeld"+i+"' name='frm1601EQ:txtTaxbeWithHeld[]' style='text-align:right; width:16em !important' value='0.00' disabled /> </td>" +
                        "</tr>") ;
                        iCtr++; 
                    }
                }

            }else{
                countAtcChecked = 0;
                d.getElementById('lblOtherTax').style.visibility = "visible";
                var table1 = d.getElementById("tblPartIIComputeTax");
                var iCtr1 = table1.rows.length; iCtr1--;
                var table2 = d.getElementById("tblPartIIOtherTax");
                var iCtr2 = table2.rows.length; iCtr2 += 5;

                for(i = 1 ; i <= listATCtable.rows.length; i++ ){
                    ATCCodeList[i] = d.getElementById('AtcCode'+i).checked;
                    // check if checked id'ed ATC
                    if (d.getElementById('AtcCode'+i).checked == true ){
                        countAtcChecked ++;
                        itemNum ++;
                        var taxbasetemp = "";
                        for(var tempCount = 0 ; tempCount < tempATC.length; tempCount++) {
                            if(tempATC[tempCount] == d.getElementById('AtcCode'+i).value){
                                taxbasetemp = tempATCTaxbase[tempCount];
                                break;
                            }
                        }

                        if(countAtcChecked <= 6){
                            $('#tbodyComputeTax').html(  d.getElementById('tbodyComputeTax').innerHTML +
                                "<tr>" +
                                "<td><font size='2' style='font-weight:bold; width:1em !important'>"+itemNum+"&nbsp;&nbsp;</font>"+
                                    " <input type='text' id='frm1601EQ:txtAtcCd"+iCtr1+"' name='frm1601EQ:txtAtcCd[]' style='text-align: center; width:10em !important' value='"+ d.getElementById('AtcCode'+i).value + "'/>&nbsp;&nbsp;&nbsp;</td>" +
                                "<td class='text-center'> <input type='text' id='frm1601EQ:txtTaxBase"+iCtr1+"' name='frm1601EQ:txtTaxBase[]' style='width:17em !important; text-align:right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld("+iCtr1+"); computeofTotalWithheldTax()' value='"+ taxbasetemp + "'/> </td>" +
                                "<td class='text-center'> <input type='text' id='frm1601EQ:txtTaxRate"+iCtr1+"' name='frm1601EQ:txtTaxRate[]' style='text-align: center; width: 150px' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld("+iCtr1+"); computeofTotalWithheldTax()' value='"+ d.getElementById('txtRate'+i).innerHTML +"' readonly /><font size='2' style='font-weight:bold'>&nbsp;%</font></td>"+
                                "<td class='text-center'> <input type='text' id='frm1601EQ:txtTaxbeWithHeld"+iCtr1+"' name='frm1601EQ:txtTaxbeWithHeld[]' style='text-align:right; width:16em !important' value='0.00' readonly /> </td>" +
                                "</tr>") ;
                            setTimeout("d.getElementById('frm1601EQ:txtAtcCd"+iCtr1+"').disabled = true; setInputTextControl_HorizontalAlignment('frm1601EQ:txtTaxBase"+iCtr1+"', 4);" +
                            "d.getElementById('frm1601EQ:txtTaxbeWithHeld"+iCtr1+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601EQ:txtTaxbeWithHeld"+iCtr1+"', 4);" +
                            "d.getElementById('frm1601EQ:txtTaxRate"+iCtr1+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601EQ:txtTaxRate"+iCtr1+"', 4);" +
                                "getRequiredWithheld("+iCtr1+");", 100);

                            if (d.getElementById('AtcCode'+i).value == "N/A") {
                                setTimeout("d.getElementById('frm1601EQ:txtTaxRate"+iCtr1+"').disabled = false;", 100);
                            }
                            waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601EQ:txtTaxBase"+iCtr1+"', 15, 2); d.getElementById('frm1601EQ:txtTaxBase"+iCtr1+"').value = '" + taxbasetemp + "'" , 100);
                            waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601EQ:txtTaxbeWithHeld"+iCtr1+"', 15, 2); getRequiredWithheld(" + iCtr1 + ");", 100);
                            iCtr1++;
                        }else{
                            itemNum2 ++;
                            $('#tbodyOtherTax').html(  d.getElementById('tbodyOtherTax').innerHTML +
                            "<tr>" +
                            "<td><font size='2' style='font-weight:bold; width:1em !important'>"+itemNum2+"&nbsp;&nbsp;</font>"+
                                " <input type='text' id='frm1601EQ:txtAtcCd"+iCtr2+"' name='frm1601EQ:txtAtcCd[]' style='text-align: center; width:10em !important' value='"+ d.getElementById('AtcCode'+i).value + "' readonly/></td>" +
                            "<td> <input type='text' id='frm1601EQ:txtTaxBase"+iCtr2+"' name='frm1601EQ:txtTaxBase[]' style='width:17em !important; text-align:right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld("+iCtr2+"); computeofTotalWithheldTax(); computeTotalOtherWithheldTax()' value='"+ taxbasetemp + "'/> </td>" +
                            "<td> <input type='text' id='frm1601EQ:txtTaxRate"+iCtr2+"'  name='frm1601EQ:txtTaxRate[]' style='text-align: center; width: 100px' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld("+iCtr2+"); computeofTotalWithheldTax(); computeTotalOtherWithheldTax()' value='"+ d.getElementById('txtRate'+i).innerHTML +"' readonly /><font size='2' style='font-weight:bold'>&nbsp;%</font></td>"+
                            "<td> <input type='text' id='frm1601EQ:txtTaxbeWithHeld"+iCtr2+"' name='frm1601EQ:txtTaxbeWithHeld[]' style='text-align:right; width:16em !important' value='0.00' readonly /> </td>" +
                            "</tr>") ;
                        setTimeout("d.getElementById('frm1601EQ:txtAtcCd"+iCtr2+"').disabled = true; setInputTextControl_HorizontalAlignment('frm1601EQ:txtTaxBase"+iCtr2+"', 4);" +
                        "d.getElementById('frm1601EQ:txtTaxbeWithHeld"+iCtr2+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601EQ:txtTaxbeWithHeld"+iCtr2+"', 4);" +
                        "d.getElementById('frm1601EQ:txtTaxRate"+iCtr2+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601EQ:txtTaxRate"+iCtr2+"', 4);" +
                            "getRequiredWithheld("+iCtr2+");", 100);

                        if (d.getElementById('AtcCode'+i).value == "N/A") {
                            setTimeout("d.getElementById('frm1601EQ:txtTaxRate"+iCtr2+"').disabled = false;", 100);
                        }
                        waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601EQ:txtTaxBase"+iCtr2+"', 15, 2); d.getElementById('frm1601EQ:txtTaxBase"+iCtr2+"').value = '" + taxbasetemp + "'" , 100);
                        waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601EQ:txtTaxbeWithHeld"+iCtr2+"', 15, 2); getRequiredWithheld(" + iCtr2 + ");", 100);
                        iCtr2++;
                        }
                    }
                }
            }
            setTimeout("computeofTotalWithheldTax()", 100);
            setTimeout("computeTotalOtherWithheldTax()", 100);
            cancelPartIIATC();
        }catch(e){
            alert('exception : '+e.message);
        }
    }

    //Computation of withheld in ATC part II
    function computeofTotalWithheldTax()
    {
        var i;
        var totalsum = 0;
        var totalRows = ((d.getElementById('tblPartIIComputeTax').rows.length + d.getElementById('tblPartIIOtherTax').rows.length)-4);
        for(i = 1 ; i <= totalRows ; i ++)
        {
            totalsum = totalsum + NumWithComma(d.getElementById('frm1601EQ:txtTaxbeWithHeld'+i).value);

        }
        d.getElementById('frm1601EQ:txtTax19').value = formatCurrency(totalsum);
        computeTotalTaxCredit();
        computeOfTotalAmtDue();
    }

    //Computation of withheld in ATC part II other selected ATC
    function computeTotalOtherWithheldTax(){
        var totalOtherTax = 0;
        var totalOtherTaxRows = ((d.getElementById('tblPartIIComputeTax').rows.length + d.getElementById('tblPartIIOtherTax').rows.length)-4);
        for(var i = 7 ; i <= totalOtherTaxRows ; i ++)
        {
            totalOtherTax = totalOtherTax + NumWithComma(d.getElementById('frm1601EQ:txtTaxbeWithHeld'+i).value);
        }
        d.getElementById('frm1601EQ:txtTotalOtherTax').value = formatCurrency(totalOtherTax);
    }

    //Computation Tax withheld per row -markp
    function getRequiredWithheld(numIndex)
    {
        d.getElementById('frm1601EQ:txtTaxbeWithHeld'+numIndex).value = formatCurrency(NumWithComma(d.getElementById('frm1601EQ:txtTaxBase' + numIndex).value) * NumWithComma(d.getElementById('frm1601EQ:txtTaxRate' + numIndex).value) / 100);
    }

    //Computation of Total Amount Still Due -markp
    function computeOfTotalAmtDue(){
        d.getElementById('frm1601EQ:txtTax30').value = formatCurrency(NumWithComma(d.getElementById('frm1601EQ:txtTax25').value) + NumWithComma(d.getElementById("frm1601EQ:txtTax29").value));
        var totalAmtDue = parseFloat(d.getElementById('frm1601EQ:txtTax30').value);
        if(totalAmtDue < 0){
            d.getElementById('frm1601EQ:ifRefund').disabled = false;
            d.getElementById('frm1601EQ:ifIssueCert').disabled = false;
            d.getElementById('frm1601EQ:ifCarriedOver').disabled = false;
        }else{
            d.getElementById('frm1601EQ:ifRefund').checked = false;
            d.getElementById('frm1601EQ:ifIssueCert').checked = false;
            d.getElementById('frm1601EQ:ifCarriedOver').checked = false;
            d.getElementById('frm1601EQ:ifRefund').disabled = true;
            d.getElementById('frm1601EQ:ifIssueCert').disabled = true;
            d.getElementById('frm1601EQ:ifCarriedOver').disabled = true;
        }
    }

    //Computation of Item 21 to 24 -mark p.
    function computeTotalTaxCredit(){
        d.getElementById('frm1601EQ:txtTax24').value = formatCurrency(NumWithComma(d.getElementById('frm1601EQ:txtTax20').value) + NumWithComma(d.getElementById('frm1601EQ:txtTax21').value) + NumWithComma(d.getElementById('frm1601EQ:txtTax22').value) + NumWithComma(d.getElementById('frm1601EQ:txtTax23').value));

        //Compute Tax Still Due Item 25
        d.getElementById('frm1601EQ:txtTax25').value = formatCurrency(NumWithComma(d.getElementById('frm1601EQ:txtTax19').value) - NumWithComma(d.getElementById('frm1601EQ:txtTax24').value));

        computeOfTotalAmtDue();
    }

    //Computation of Penalties Item 26 to 29 - mark p.
    function computePenalties() {
        var tax17D = NumWithComma(d.getElementById("frm1601EQ:txtTax26").value) + NumWithComma(d.getElementById("frm1601EQ:txtTax27").value) + NumWithComma(d.getElementById("frm1601EQ:txtTax28").value);
        d.getElementById("frm1601EQ:txtTax29").value = formatCurrency(tax17D);
        computeOfTotalAmtDue();
    }

    //Check if Refund
    function checkRefund(){
        if(d.getElementById('frm1601EQ:ifRefund').checked){
            d.getElementById('frm1601EQ:ifIssueCert').checked = false;
            d.getElementById('frm1601EQ:ifCarriedOver').checked = false;
        }
    }

    //Check if Issue Cert
    function checkIssueCert(){
        if(d.getElementById('frm1601EQ:ifIssueCert').checked){
            d.getElementById('frm1601EQ:ifRefund').checked = false;
            d.getElementById('frm1601EQ:ifCarriedOver').checked = false;
        }
    }

    //Check if Carried Over
    function checkCarriedOver(){
        if(d.getElementById('frm1601EQ:ifCarriedOver').checked){
            d.getElementById('frm1601EQ:ifRefund').checked = false;
            d.getElementById('frm1601EQ:ifIssueCert').checked = false;
        }
    }

    //Validating all fields of the form
    var dt = new Date();
    function validateForm(){
        //validate Year
        if( (d.getElementById('frm1601EQ:txtYear').value == "")){
            alert("Please enter a valid year on Item 1.");
            d.getElementById('frm1601EQ:txtYear').focus();
            return false;
        }else if( d.getElementById('frm1601EQ:txtYear').value > dt.getFullYear()){
            alert("Invalid entry on Item 1. Entry should not be a future Date.");
            d.getElementById('frm1601EQ:txtYear').value = dt.getFullYear();
            d.getElementById('frm1601EQ:txtYear').focus();
            return false;
        }else if( d.getElementById('frm1601EQ:txtYear').value < 2018){
            alert("Invalid entry on Item 1. Entry should not be a previous year from 2018.")
            d.getElementById('frm1601EQ:txtYear').value = "";
            d.getElementById('frm1601EQ:txtYear').focus();
            return false;
        }else{
            //entry is from 2018 to curent year.
        }

        //Validate Quarter
        if(d.getElementById('frm1601EQ:optQuarter:1').checked){
            if(d.getElementById('frm1601EQ:txtYear').value < dt.getFullYear()){
                d.getElementById('frm1601EQ:optQuarter:1').checked = true;
            }else{
                if(dt.getMonth() >= 3){ //this suppose is 3 = month of april
                     d.getElementById('frm1601EQ:optQuarter:1').checked = true;
                }else{
                    alert("Unable to select first Quarter due to the current date. Payment should be made after the Quarter");
                    d.getElementById('frm1601EQ:optQuarter:1').checked = false;
                    return false;
                 }
            }
        }else if(d.getElementById('frm1601EQ:optQuarter:2').checked){
            if(d.getElementById('frm1601EQ:txtYear').value < dt.getFullYear()){
                d.getElementById('frm1601EQ:optQuarter:2').checked = true;
            }else{
                if(dt.getMonth() >= 6){
                    d.getElementById('frm1601EQ:optQuarter:2').checked = true;
                }else{
                    alert("Unable to select second Quarter due to the current date. Payment should be made after the Quarter");
                    d.getElementById('frm1601EQ:optQuarter:2').checked = false;
                    return false;
                }
            }
        }else if(d.getElementById('frm1601EQ:optQuarter:3').checked){
            if(d.getElementById('frm1601EQ:txtYear').value < dt.getFullYear()){
                d.getElementById('frm1601EQ:optQuarter:3').checked = true;
            }else{
                if(dt.getMonth() >= 9){
                    d.getElementById('frm1601EQ:optQuarter:3').checked = true;
                }else{
                    alert("Unable to select third Quarter due to the current date. Payment should be made after the Quarter");
                    d.getElementById('frm1601EQ:optQuarter:3').checked = false;
                    return false;
                }
            }
        }else if(d.getElementById('frm1601EQ:optQuarter:4').checked){
            if(d.getElementById('frm1601EQ:txtYear').value < dt.getFullYear()){
                d.getElementById('frm1601EQ:optQuarter:4').checked = true;
            }else{
                alert("Unable to select fourth Quarter due to the current date. Payment should be made after the Quarter");
                d.getElementById('frm1601EQ:optQuarter:4').checked = false;
                return false;
            }
        }else{
            alert("Please select Quarter on Item 2");
            return false;
        }

        if(d.getElementById('frm1601EQ:optWithheld:Y').checked == false && d.getElementById('frm1601EQ:optWithheld:N').checked == false ){
            alert("Please select an option for Item 4.")
            return false;
        }
        if(d.getElementById('frm1601EQ:optCategory:P').checked == false && d.getElementById('frm1601EQ:optCategory:G').checked == false){
            alert("Please select an option for Item 11.");
            return false;
        }

        if((d.getElementById('frm1601EQ:txtTIN1').value == "" || d.getElementById('frm1601EQ:txtTIN2').value == "" || d.getElementById('frm1601EQ:txtTIN3').value == "" || d.getElementById('frm1601EQ:txtBranchCode').value == "")){
            alert("Please enter a valid TIN number on Item 6.");
            return false;
        }
       
        if((d.getElementById('frm1601EQ:txtTaxpayerName').value == "")){
            alert("Please enter a valid Taxpayer Name on Item 8.");
            return false;
        }
        if((d.getElementById('frm1601EQ:txtTelNum').value == "")){
            alert("Please enter a valid Telephone Number on Item 10.");
            return false;
        }
        if((d.getElementById('frm1601EQ:txtAddress').value == "")){
            alert("Please enter Taxpayer's Registered Address on Item 9.");
            return false;
        }
        if((d.getElementById('frm1601EQ:txtZipCode').value == "")){
            alert("Please enter Taxpayer's Zip Code on Item 9A.");
            return false;
        }
        if((d.getElementById('txtEmail').value == "")){
            alert("Please enter valid Email Address on Item 12.");
            return false;
        }
        if ( d.getElementById('frm1601EQ:optWithheld:Y').checked == true){
            if(d.getElementById('frm1601EQ:txtAtcCd1').value == ""){
                alert("Please fill up Part II Computation of Tax if item 4 is set to Yes.")
                showPartIIATC();
                return;
            }else{
                var indexwithheld = 1;
                for (indexwithheld = 1 ; indexwithheld <= (( d.getElementById('tblPartIIComputeTax').rows.length + d.getElementById('tblPartIIOtherTax').rows.length)-4)  ; indexwithheld++){
                    if( d.getElementById('frm1601EQ:txtAtcCd'+indexwithheld).value != "")
                    {
                        if( d.getElementById('frm1601EQ:txtTaxBase'+ indexwithheld).value == "" || d.getElementById('frm1601EQ:txtTaxBase'+ indexwithheld).value == 0.00 )
                        {
                            alert("Please enter a valid value for tax base for " + d.getElementById('frm1601EQ:txtAtcCd'+indexwithheld).value + "." )
                            return false;
                        }
                    }
                }
            } 
        }

        d.getElementById('hPartIITableSize').value = d.getElementById('tblPartIIComputeTax').rows.length - 1;
        d.getElementById('frm1601EQ:cmdValidate').disabled = true;
        d.getElementById('frm1601EQ:cmdEdit').disabled = false;
        d.getElementById('btnUpload').disabled = false;

        disableAllControl();

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
        return;
    }


    // Disable all fields after validating the Form
    var disableElem = true;
    var enableElem = false;

    function disableAllControl()
    {
        //buttons
        @if($action != 'view')
        d.getElementById('frm1601EQ:btnFinalCopy').disabled = false;
        @endif
        //Part I Header
        d.getElementById('frm1601EQ:txtYear').disabled = true;
        d.getElementById('frm1601EQ:optQuarter:1').disabled = true;
        d.getElementById('frm1601EQ:optQuarter:2').disabled = true;
        d.getElementById('frm1601EQ:optQuarter:3').disabled = true;
        d.getElementById('frm1601EQ:optQuarter:4').disabled = true;
        d.getElementById('frm1601EQ:optAmend:Y').disabled = true;
        d.getElementById('frm1601EQ:optAmend:N').disabled = true;
        d.getElementById('frm1601EQ:optWithheld:Y').disabled = true;
        d.getElementById('frm1601EQ:optWithheld:N').disabled = true;
        d.getElementById('frm1601EQ:txtNoSheets').disabled = true;

        //Part I BG Info
        d.getElementById('frm1601EQ:txtTIN1').disabled = true;
        d.getElementById('frm1601EQ:txtTIN2').disabled = true;
        d.getElementById('frm1601EQ:txtTIN3').disabled = true;
        d.getElementById('frm1601EQ:txtBranchCode').disabled = true;
        d.getElementById('frm1601EQ:txtRDOCode').disabled = true;
        d.getElementById('frm1601EQ:txtTaxpayerName').disabled = true;
        d.getElementById('frm1601EQ:txtAddress').disabled = true;
        d.getElementById('frm1601EQ:txtAddress2').disabled = true;
        d.getElementById('frm1601EQ:txtZipCode').disabled = true;
        d.getElementById('frm1601EQ:txtTelNum').disabled = true;
        d.getElementById('txtEmail').disabled = true;
        d.getElementById('frm1601EQ:optCategory:P').disabled = true;
        d.getElementById('frm1601EQ:optCategory:G').disabled = true;

        //Part II ATC
        d.getElementById('frm1601EQ:txtTax20').disabled = true;
        d.getElementById('frm1601EQ:txtTax21').disabled = true;
        d.getElementById('frm1601EQ:txtTax22').disabled = true;
        d.getElementById('frm1601EQ:txtTax23').disabled = true;
        d.getElementById('frm1601EQ:txtTax26').disabled = true;
        d.getElementById('frm1601EQ:txtTax27').disabled = true;
        d.getElementById('frm1601EQ:txtTax28').disabled = true;


        //
        for(i = 1 ; i <= ((d.getElementById('tblPartIIComputeTax').rows.length + d.getElementById('tblPartIIOtherTax').rows.length)-4) ; i ++)
        {
            d.getElementById('frm1601EQ:txtTaxBase'+i).disabled = true;
        }

        d.getElementById('btnClearOtherAtc').disabled = true;
        d.getElementById('btnAddATCPartII').disabled = true;
        d.getElementById('btnPrintOtherAtc').disabled = false;
        d.getElementById('btnPrint').disabled = false;
        disableElem;
        enableElem;
    } // end disabled all


    function enableAllControl(){
        d.getElementById('frm1601EQ:txtYear').disabled = false;
        d.getElementById('frm1601EQ:optQuarter:1').disabled = false;
        d.getElementById('frm1601EQ:optQuarter:2').disabled = false;
        d.getElementById('frm1601EQ:optQuarter:3').disabled = false;
        d.getElementById('frm1601EQ:optQuarter:4').disabled = false;
        d.getElementById('frm1601EQ:optAmend:Y').disabled = false;
        d.getElementById('frm1601EQ:optAmend:N').disabled = false;
        d.getElementById('frm1601EQ:optWithheld:Y').disabled = false;
        d.getElementById('frm1601EQ:optWithheld:N').disabled = false;
        d.getElementById('frm1601EQ:txtNoSheets').disabled = false;

        d.getElementById('frm1601EQ:optCategory:P').disabled = false;
        d.getElementById('frm1601EQ:optCategory:G').disabled = false;

        d.getElementById('frm1601EQ:txtTax20').disabled = false;
        d.getElementById('frm1601EQ:txtTax21').disabled = false;
        d.getElementById('frm1601EQ:txtTax23').disabled = false;
        d.getElementById('frm1601EQ:txtTax26').disabled = false;
        d.getElementById('frm1601EQ:txtTax27').disabled = false;
        d.getElementById('frm1601EQ:txtTax28').disabled = false;

        if(d.getElementById('frm1601EQ:txtAtcCd1').value != ""){
            for(i = 1 ; i <= ((d.getElementById('tblPartIIComputeTax').rows.length + d.getElementById('tblPartIIOtherTax').rows.length)-4) ; i ++){
                d.getElementById('frm1601EQ:txtTaxBase'+i).disabled = false;
            }   
        }
        

        if(d.getElementById('frm1601EQ:optAmend:Y').checked == true){
            d.getElementById('frm1601EQ:txtTax22').disabled = false;
        } else {
            d.getElementById('frm1601EQ:txtTax22').disabled = true;
        }
        d.getElementById('btnPrintOtherAtc').disabled = true;
        d.getElementById('btnClearOtherAtc').disabled = false;
        d.getElementById('btnOtherTax').disabled = false;
        d.getElementById('btnAddATCPartII').disabled = false;
        d.getElementById('frm1601EQ:cmdValidate').disabled = false;
        d.getElementById('frm1601EQ:cmdEdit').disabled = true;
        d.getElementById('frm1601EQ:btnFinalCopy').disabled = true;
        d.getElementById('btnPrint').disabled = true;

        if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
        d.getElementById('frm1601EQ:txtYear').disabled = true;
        }

        disableElem;
        enableElem;
        document.getElementById('frm1601EQ:txtTIN1').disabled = true; document.getElementById('frm1601EQ:txtTIN2').disabled = true; document.getElementById('frm1601EQ:txtTIN3').disabled = true; document.getElementById('frm1601EQ:txtBranchCode').disabled = true;
    }

    function enabletaxrate(){
        for(i = 1 ; i < ( d.getElementById('tblPartIIComputeTax').rows.length) ; i ++)
        {
            if (d.getElementById('frm1601EQ:txtAtcCd'+i).value == "N/A")
                d.getElementById('frm1601EQ:txtTaxRate'+i).disabled = false;
        }
    }

    function disabletaxrate(){
        for(i = 1 ; i < ( d.getElementById('tblPartIIComputeTax').rows.length) ; i ++)
        {
            d.getElementById('frm1601EQ:txtTaxRate'+i).disabled = true;
        }
    }

    //OTHER SELECTED ATC
    function clearpart2(){
        for(i = 7 ; i < ( d.getElementById('tblPartIIOtherTax').rows.length+5) ; i ++)
        {
            d.getElementById('frm1601EQ:txtTaxBase'+i).value = "";
            d.getElementById('frm1601EQ:txtTaxbeWithHeld'+i).value = formatCurrency(0.00);
        }
        d.getElementById('frm1601EQ:txtTotalOtherTax').value = formatCurrency(0.00);
        computeofTotalWithheldTax();
    }

    //When "NO" Withheld - markp
    function changeTaxWithheldNO() {
        if(taxWheldFlag){
            if(d.getElementById('frm1601EQ:txtAtcCd1').value != ""){
                if(confirm("You are about to change the value . Doing this will clear all \n computation fields Do you wish to proceed?")){
                    d.getElementById('frm1601EQ:txtTax19').value = (0).toFixed(2);
                    d.getElementById('frm1601EQ:txtTax20').value = (0).toFixed(2);
                    d.getElementById('frm1601EQ:txtTax21').value = (0).toFixed(2);
                    d.getElementById('frm1601EQ:txtTax22').value = (0).toFixed(2);
                    d.getElementById('frm1601EQ:txtTax23').value = (0).toFixed(2);
                    d.getElementById('frm1601EQ:txtTax24').value = (0).toFixed(2);
                    d.getElementById('frm1601EQ:txtTax25').value = (0).toFixed(2);
                    d.getElementById('frm1601EQ:txtTax26').value = (0).toFixed(2);
                    d.getElementById('frm1601EQ:txtTax27').value = (0).toFixed(2);
                    d.getElementById('frm1601EQ:txtTax28').value = (0).toFixed(2);
                    d.getElementById('frm1601EQ:txtTax29').value = (0).toFixed(2);
                    d.getElementById('frm1601EQ:txtTax30').value = (0).toFixed(2);
                    $('#tbodyComputeTax').html("");
                    for(i =1 ; i < d.getElementById('tbllistAtcCode').rows.length; i++) {
                        d.getElementById('AtcCode'+i).checked = false;
                    }
                    d.getElementById('lblOtherTax').style.visibility = "hidden";
                    // draw empty table
                    $('#tbodyComputeTax tr').remove();
                    $('#tbodyOtherTax tr').remove();
                    populateAtcPart2();
                    taxWheldFlag = false;
                } else {
                    d.getElementById('frm1601EQ:optWithheld:Y').checked = true;
                    taxWheldFlag = true;
                }
             }else{
                taxWheldFlag = false;
             }
         }
    }

    function initialValidateBeforeSave() {
            if( (d.getElementById('frm1601EQ:txtTIN1').value == "" || d.getElementById('frm1601EQ:txtTIN2').value == "" || d.getElementById('frm1601EQ:txtTIN3').value == "" || d.getElementById('frm1601EQ:txtBranchCode').value == "")  )
            {
                alert("Please enter a valid TIN number on Item 6.");
                return false;
            }
          
            if( (d.getElementById('frm1601EQ:txtTaxpayerName').value == "")  )
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
    function printme() {
        $('#bg').hide(); //800
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
                    if (elem[i].id == "frm1601EQ:txtRDOCode") { //rule out the select of driveSelectTPExport as it is giving error
                        $( elem[i] ).hide();
                        var label = "<div class='labels' style='font-size:12px;' >".concat(elem[i].options[elem[i].selectedIndex].innerHTML).concat("&nbsp;</div>");
                        $( elem[i] ).after(label);
                    }
                }
            }
        }   
        
        $('.printButtonClass').hide();
        $("#formPaper").show();
        $("#formPaper").css({ 'margin-top': '-70px' });
        
        window.print();

        $('.printButtonClass').show();
        $("#formPaper").css({ 'border': '#CCC 1px solid' });


        d.getElementById('btnOtherTax').disabled = true;

    }

    function printModal() {
        alert("This form must be printed on an A4 Size Paper. Please update your Printer Settings to ensure the correct printout of the form.\n\n" +
                  "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166 and all Headers & Footers must be set to empty.");

        $('#bg').hide();
        $('body').css({ 'zoom': '94%' });
        $('#modalOtherAtc').removeClass("modalShow");
        $('#modalOtherAtc').addClass("modalPrint");

        $('input').each(function () {
            if (this.type == 'button') {
                if (this.id != 'test') {
                    $(this).addClass('previewButtonClass');
                }
            }
        });

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
                    document.getElementById(elem[i].id).style.height="14px";
                    document.getElementById(elem[i].id).style.fontSize="12px";
                }
            }
        }

        $('a').each(function () {
            if (this.id.length > 1) {
                document.getElementById(this.id).disabled = true;
            }
        });

        $('#printMenu').show('blind');
        if ($('#formMenu').css('display') != 'none') {
            $('#formMenu').hide('blind');
        }
        window.print();
    }
    function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
              
                var data = form.serialize();
                save('1601EQ',data);
                
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
        saveAndExit('1601EQ',data);
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

        submitAndSave('1601EQ', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1601EQ';
    }
</script>
@endsection