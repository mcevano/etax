@extends('layouts.app')
@section('title', '| BIR Form No. 1602Qv2018')
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
        <button type="button" class="btn btn-danger btn-exit" id="1602Qv2018" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="1602Qv2018" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1602Qv2018' company='{{$company->id}}'>Okay</button>
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
        <div id="container" >
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 876px; ">
    
                <table border="0" width="790" cellspacing="0" cellpadding="0" align="center" style=" background-repeat: repeat-x;">
                    <tr>
                        <td>
                            <!--Form Paper-->
                            <div id="formPaper">
                                <div id="Page1">
                                    <table width="790" border="0" cellspacing="0" cellpadding="0">
                                        <!--Top Header-->
                                        <tr>
                                            <td>
                                                <table width="741" border="0" cellspacing="0" cellpadding="0" style="height: 56px;">
                                                    <tr>
                                                        <td width="25%" valign="bottom" style="padding-left: 2px;">
                                                            <img  class="barcodes"  width="80" height="25" src="{{ asset('images/bcs_new.png') }}">
                                                        </td>
                                                        <td width="50%" valign="middle" align="center">
                                                            <img width="210" height="50" alt="birlogo" src="{{ asset('images/header_logo.png') }}">
                                                        </td>
                                                        <td width="25%" valign="middle">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Top Header-->
                                        <!--Form Title-->
                                        <tr>
                                            <td>
                                                <table width="741" style="height:90px;" border="1" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" valign="center" style="text-align:center !important">
                                                                <label face="Arial" size="1">BIR Form No.
                                                                    <br>
                                                                </label>
                                                                <font face="Arial" size="6" style="font-weight:bold;">1602Q</font><br>
                                                                <label face="Arial" size="1">January 2018</label>
                                                                <br>
                                                                <label face="Arial" size="1">
                                                                    <b>Page 1</b>
                                                                </label>
                                                            </td>
                                                            <td width="60%" align="center">
                                                                <font size="5" style="font-weight:bold;">Quarterly Remittance Return</font>
                                                                <br>
                                                                    <label size="3" style="font-weight: bold;">of Final Taxes Withheld on Interest Paid on Deposits and
                                                                        Deposits Substitutes/Trusts/Etc.
                                                                    </label>
                                                                <label face="Arial" size="1">
                                                                    <i>Enter all required information in CAPITAL LETTERS using BLACK
                                                                        ink. Mark applicable boxes with an "X". Two copies MUST
                                                                        be filled with the BIR and one held by the Taxpayer.</i>
                                                                </label>
                                                            </td>
                                                            <td width="20%" valign="top">
                                                                <div style="padding-top: 12px">
                                                                    <img class="barcodes" src="{{ asset('images/Bar Codes/1602QP1.png') }}">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Form Title-->
                                        <!--1 to 5-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td width="100" valign="top" class="tblFormTd">
                                                            <font class="item-number">1</font>
                                                            <font size="1" style="font-size: 11px;">For the Year</font>
                                                        </td>
                                                        <td width="230" valign="top" class="tblFormTd">
                                                            <font class="item-number">2</font>
                                                            <font size="1" style="font-size: 11px;">Quarter</font>
                                                        </td>
                                                        <td width="130" valign="top" class="tblFormTd">
                                                            <font class="item-number">3</font>
                                                            <font size="1" style="font-size: 11px;">Amended Return?</font>
                                                        </td>
                                                        <td width="150" valign="top" class="tblFormTd">
                                                            <font class="item-number">4</font>
                                                            <font size="1" style="font-size: 11px;">Any Taxes Withheld</font>
                                                        </td>
                                                        <td valign="top" class="tblFormTd">
                                                            <font class="item-number">5</font>
                                                            <font size="1" style="font-size: 11px;">No. of Sheet/s Attached</font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td width="100" valign="top" class="tblFormTd" style="text-align: center">
                                                            <input type="text" value="" size="4" name="frm1602Q:txtYear" maxlength="4" id="frm1602Q:txtYear" onblur="blockletterWithout2Decimal(this);validateYear()"
                                                                onkeypress="return wholenumber(this, event)" />
                                                        </td>
                                                        <td width="230" valign="top" class="tblFormTd" style="text-align: center">
                                                            <input type="radio" value="1" name="frm1602Q:qtr" id="frm1602Q:qtr_1" />
                                                            <label for="frm1602Q:qtr_1" style="font-size:12px;">1st</label>
                                                            
                                                            <input type="radio" value="2" name="frm1602Q:qtr" id="frm1602Q:qtr_2" />
                                                            <label for="frm1602Q:qtr_2" style="font-size:12px;">2nd</label>
                                                            
                                                            <input type="radio" value="3" name="frm1602Q:qtr" id="frm1602Q:qtr_3" />
                                                            <label for="frm1602Q:qtr_3" style="font-size:12px;">3rd</label>
                                                            
                                                            <input type="radio" value="4" name="frm1602Q:qtr" id="frm1602Q:qtr_4" />
                                                            <label for="frm1602Q:qtr_4" style="font-size:12px;">4th</label>
                                                            
                                                        </td>
                                                        <td width="130" valign="top" class="tblFormTd" style="text-align: center">
                                                            <input type="radio" value="Y" name="frm1602Q:AmendedRtn" id="frm1602Q:AmendedRtn1" />
                                                            <label for="frm1602Q:AmendedRtn1" style="font-size:11px;">Yes</label>
                                                            <input type="radio" value="N" name="frm1602Q:AmendedRtn" id="frm1602Q:AmendedRtn2" />
                                                            <label for="frm1602Q:AmendedRtn2" style="font-size:11px;">No</label>
                                                        </td>
                                                        <td width="150" valign="top" class="tblFormTd" style="text-align: center">
                                                            <input type="radio" value="Y" name="frm1602Q:OptTaxWithheld" id="frm1602Q:OptTaxWithheld1" onclick="TaxWithhelOption();" />
                                                            <label for="frm1602Q:OptTaxWithheld1" style="font-size:11px;">Yes</label>
                                                            <input type="radio" value="N" name="frm1602Q:OptTaxWithheld" id="frm1602Q:OptTaxWithheld2" onclick="TaxWithhelOption();" />
                                                            <label for="frm1602Q:OptTaxWithheld2" style="font-size:11px;">No</label>
                                                        </td>
                                                        <td valign="top" class="tblFormTd" style="text-align: center">
                                                            <input type="text" value="0" style="text-align: right;" size="4" name="frm1602Q:txtSheets" maxlength="2" id="frm1602Q:txtSheets"
                                                                onkeypress="return wholenumber(this, event)" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End 1 to 5-->
    
                                        <!--Background Information-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTdPart">
                                                            <div align="center">
                                                                <font size="2" style="font-weight:bold;">Part I - Background Information</font>
                                                            </div>
    
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--Backgroun Information-->
    
                                        <!--Item 6 to 7-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <td valign="top" class="tblFormTd">
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    <font class="item-number">6</font>
                                                                </td>
                                                                <td>
                                                                    <font size="1" style="font-size: 11px;">Taxpayer Identification Number (TIN)</font>
                                                                    <font size="2" face="Arial" style="padding-left: 100px;">
                                                                        <input type="text" value="{{$company->tin1}}" size="2" name="frm1602Q:txtTIN1" maxlength="3" id="frm1602Q:txtTIN1" onkeypress="return wholenumber(this, event)"
                                                                        />&nbsp;&nbsp;/&nbsp;&nbsp;
                                                                        <input type="text" value="{{$company->tin2}}" size="2" name="frm1602Q:txtTIN2" maxlength="3" id="frm1602Q:txtTIN2" onkeypress="return wholenumber(this, event)"
                                                                        />&nbsp;&nbsp;/&nbsp;&nbsp;
                                                                        <input type="text" value="{{$company->tin3}}" size="2" name="frm1602Q:txtTIN3" maxlength="3" id="frm1602Q:txtTIN3" onkeypress="return wholenumber(this, event)"
                                                                        />&nbsp;&nbsp;/&nbsp;&nbsp;
                                                                        <input type="text" value="{{$company->tin4}}" size="2" name="frm1602Q:txtBranchCode" maxlength="3" id="frm1602Q:txtBranchCode" onkeypress="return letternumber(event)"
                                                                        />
                                                                    </font>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td valign="top" class="tblFormTd">
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    <font class="item-number">7</font>
                                                                    <font size="1" style="font-size: 11px;">RDO Code</font>
                                                                </td>
                                                                <td id="rdoSelect">
                                                                    <select class='iceSelOneMnu' id='frm1602Q:txtRDOCode' name='frm1602Q:txtRDOCode' size='1' disabled='true' >
                                                                    <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
    
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 6 to 7-->

                                        
    
                                        <!--Item 8-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <td valign="top" class="tblFormTd">
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <font class="item-number">8</font>
                                                                            </td>
                                                                            <td>
                                                                                <font size="1" style="font-size: 11px;">Withholding Agent's Name (Last Name, First Name,
                                                                                    Middle Name for Individual OR Registered
                                                                                    Name for Non-Individual)</font>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>&nbsp;</td>
                                                                            <td>
                                                                                <input type="text" value="{{$company->registered_name}}" size="100" name="frm1602Q:txtTaxpayerName" id="frm1602Q:txtTaxpayerName" maxlength="70" disabled="true"
                                                                                    onblur="return capital(this, event)" />
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            
                                                        </table>
                                                    </td>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--Item 8-->
    
                                        <!--Item 9 to 9A-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <td width="300" valign="top" class="tblFormTd">
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <font class="item-number">9</font>
                                                                            </td>
                                                                            <td style="padding-left: 5px;">
                                                                                <label size="1" style="font-size: 11px;">
                                                                                    Registered Address (Indicate complete address. If branch, indicate the branch address. If the registered address is different
                                                                                    from the current address, go to the RDO to
                                                                                    updated registered address by using BIR Form
                                                                                    No. 1905)
                                                                                </label>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                &nbsp;
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" value="{{$company->address}}" size="110" name="frm1602Q:txtAddress" maxlength="150" id="frm1602Q:txtAddress" disabled="true"
                                                                                    onblur="return capital(this, event)" />
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td valign="top" class="tblFormTd">
                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td>
                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <font class="item-number">9A</font>
                                                                            </td>
                                                                            <td>
                                                                                <font size="1" style="font-size: 11px;">
                                                                                    Zip Code
                                                                                </font>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                &nbsp;
                                                                            </td>
                                                                            <td style="padding-top: 11px;">
                                                                                <input type="text" value="{{$company->zip_code}}" size="4" name="frm1602Q:txtZipCode" maxlength="12" id="frm1602Q:txtZipCode" disabled="true" onkeypress="return wholenumber(this, event)"
                                                                                />
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 9-->
    
                                        <!--Item 10 to 11-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784" height="23">
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">10</font>
                                                            <font size="1" style="font-size: 11px;">
                                                                Contact Number
                                                            </font>
    
                                                            <input type="text" value="{{$company->tel_number}}" size="30" name="frm1602Q:txtTelNum" maxlength="20" id="frm1602Q:txtTelNum" disabled="true" onkeypress="return wholenumber(this, event)"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">11</font>
                                                            <font size="1" style="padding-right: 30px;font-size: 11px;">
                                                                Category of Withholding Agent
                                                            </font>
                                                            <input type="radio" value="P" name="frm1602Q:OptCategoryAgent" id="frm1602Q:OptCategoryAgent1" onclick="getPrivateWithholdingAgentATC();"
                                                            />
                                                            <label for="frm1602Q:OptCategoryAgent1" style="font-size:11px;">Private</label>
                                                            <input type="radio" value="G" name="frm1602Q:OptCategoryAgent" id="frm1602Q:OptCategoryAgent2" onclick="getPrivateWithholdingAgentATC();"
                                                            />
                                                            <label for="frm1602Q:OptCategoryAgent2" style="font-size:11px;">Government</label>
    
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 10 to 11-->
    
                                        <!--Item 12-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <td class="tblFormTd">
                                                        <font class="item-number">12</font>
                                                        <font size="1" style="font-size: 11px;">
                                                            Email Address
                                                        </font>
                                                        <input type="text" value="{{$company->email_address}}" style="margin-left: 10px;" size="105" name="txtEmail" maxlength="70" id="txtEmail" disabled="true"
                                                        />
                                                    </td>
    
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 12-->
    
                                        <!--Item 13 to 13A-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784" height="23">
                                                    <tr>
                                                        <td class="tblFormTd" valign="top">
                                                            <table width="174" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td>
                                                                        <font class="item-number">13</font>
                                                                        <font size="1" style="font-size: 11px;">
                                                                            Are there payees availing of tax relief under Special Law or International Tax Treaty?
                                                                        </font>
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" value="Y" name="frm1602Q:OptSpecialTax" id="frm1602Q:OptSpecialTax1" onclick="DrpListTreaty();" />
                                                                        <label for="frm1602Q:OptSpecialTax1" style="font-size:11px;">Yes</label>
                                                                        <input type="radio" value="N" name="frm1602Q:OptSpecialTax" id="frm1602Q:OptSpecialTax2" onclick="DrpListTreaty();" />
                                                                        <label for="frm1602Q:OptSpecialTax2" style="font-size:11px;">No</label>
                                                                    </td>
                                                                </tr>
    
                                                            </table>
                                                        </td>
                                                        <td class="tblFormTd" valign="top">
                                                            <table width="174" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td>
                                                                        <font class="item-number">13A</font>
                                                                        <font size="1" style="font-size: 11px;">If yes, specify</font>
                                                                        <select style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; background-color: rgb(220, 220, 220);" size="1" name="frm1602Q:lstSpecialTax"
                                                                            id="frm1602Q:lstSpecialTax" disabled="true">
                                                                            <option value="0" selected="selected"> </option>
                                                                            <option value="1">Special Rate</option>
                                                                            <option value="2">International Tax Treaty</option>
                                                                            <option value="3">Both</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
    
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 13 to 13A-->
    
                                        <!--Part II Header-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTdPart">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td style="text-align: center;">
                                                                        <font size="2" style="font-weight:bold;">Part II - Computation of Tax</font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Part II Header-->
    
                                        <!--Item 14-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 80%;">
                                                            <font class="item-number">14</font>
                                                            <font size="1" style="font-size: 11px;">
                                                                Taxes Withheld for the Quarter Based on Regular Rates
                                                                <a href="#" id="frm1602Q:txtSched1"  onclick="ShowSchedule1to3();"><em>(From Part IV - Schedule 1)</em></a>
                                                            </font>
                                                        </td>
                                                        <td style="width: 20%;" class="tblFormTd">
                                                            <input id="frm1602Q:txt14" name="frm1602Q:txt14" size="20" maxlength="25" style="text-align: right;" type="text" value="0.00"
                                                                disabled="true" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 14-->
    
                                        <!--Item 15-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 80%;">
                                                            <font class="item-number">15</font>
                                                            <font size="1" style="font-size: 11px;">
                                                                Taxes Withheld for the Quarter Based on Tax Treaty Rates
                                                                <a href="#" id="frm1602Q:txtSched2" onclick="ShowSchedule1to3();"><em>(From Part IV - Schedule 2)</em></a>
                                                            </font>
                                                        </td>
                                                        <td style="width: 20%;" class="tblFormTd">
                                                            <input id="frm1602Q:txt15" name="frm1602Q:txt15" size="20" maxlength="25" style="text-align: right;" type="text" value="0.00"
                                                                disabled="true" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 15-->
    
                                        <!--Item 16-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 80%;">
                                                            <font class="item-number">16</font>
                                                            <font size="1" style="font-size: 11px;">
                                                                Taxes Withheld for the Quarter Based on Preferential Rates
                                                                <a href="#" id="frm1602Q:txtSched3" onclick="ShowSchedule1to3();"><em>(From Part IV - Schedule 3)</em></a>
                                                            </font>
                                                        </td>
                                                        <td style="width: 20%;" class="tblFormTd">
                                                            <input id="frm1602Q:txt16" name="frm1602Q:txt16" size="20" maxlength="25" style="text-align: right;" type="text" value="0.00"
                                                                disabled="true" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 16-->
    
                                        <!--Item 17-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 80%;">
                                                            <font class="item-number">17</font>
                                                            <font size="1" style="font-size: 11px;">
                                                                Total Taxes Withheld for the Quarter (Sum of Items 14 to 16)
                                                            </font>
                                                        </td>
                                                        <td style="width: 20%;" class="tblFormTd">
                                                            <input id="frm1602Q:txt17" name="frm1602Q:txt17" size="20" maxlength="25" style="text-align: right;" type="text" value="0.00"
                                                                disabled="true" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 17-->
    
                                        <!--Item 18-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 80%;">
                                                            <font class="item-number">18</font>
                                                            <font size="1" style="font-size: 11px;">
                                                                Less: Remittances Made: 1
                                                                <sup>st</sup> Month of the Quarter
                                                            </font>
                                                        </td>
                                                        <td style="width: 20%;" class="tblFormTd">
                                                            <input id="frm1602Q:txt18" name="frm1602Q:txt18" size="20" maxlength="25" style="text-align: right;" type="text" value="0.00"
                                                                onkeypress="return numbersonly(this, event)" onblur="round(this,2); computeAll();"
                                                            />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 18-->
    
                                        <!--Item 19-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 80%;">
                                                            <font class="item-number">19</font>
                                                            <font size="1" style="padding-left: 120px;font-size: 11px;">
                                                                2
                                                                <sup>nd</sup> Month of the Quarter
                                                            </font>
                                                        </td>
                                                        <td style="width: 20%;" class="tblFormTd">
                                                            <input id="frm1602Q:txt19" name="frm1602Q:txt19" size="20" maxlength="25" style="text-align: right;" type="text" value="0.00"
                                                                onkeypress="return numbersonly(this, event)" onblur="round(this,2); computeAll();"
                                                            />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 19-->
    
                                        <!--Item 20-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 80%;">
                                                            <font class="item-number">20</font>
                                                            <font size="1" style="padding-left: 25px;font-size: 11px;">
                                                                Tax Remitted in Return Previously Filed, if this is an amended return
                                                            </font>
                                                        </td>
                                                        <td style="width: 20%;" class="tblFormTd">
                                                            <input id="frm1602Q:txt20" name="frm1602Q:txt20" size="20" maxlength="25" style="text-align: right;" type="text" value="0.00"
                                                                onkeypress="return numbersonly(this, event)" onblur="round(this,2); computeAll();"
                                                            />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 20-->
    
                                        <!--Item 21-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 80%;">
                                                            <font class="item-number">21</font>
                                                            <font size="1" style="padding-left: 25px;font-size: 11px;">
                                                                Over-remittance from Previous Quarter of the same taxable year
                                                            </font>
                                                        </td>
                                                        <td style="width: 20%;" class="tblFormTd">
                                                            <input id="frm1602Q:txt21" name="frm1602Q:txt21" size="20" maxlength="25" style="text-align: right;" type="text" value="0.00"
                                                                onkeypress="return numbersonly(this, event)" onblur="round(this,2); computeAll();"
                                                            />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 21-->
    
                                        <!--Item 22-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 80%;">
                                                            <font class="item-number">22</font>
                                                            <font size="1" style="font-size: 11px;">
                                                                Total Remittances Made (Sum of Items 18 to 21)
                                                            </font>
                                                        </td>
                                                        <td style="width: 20%;" class="tblFormTd">
                                                            <input id="frm1602Q:txt22" name="frm1602Q:txt22" size="20" maxlength="25" style="text-align: right;" type="text" value="0.00"
                                                                disabled="true" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 22-->
    
                                        <!--Item 23-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 80%;">
                                                            <font class="item-number">23</font>
                                                            <font size="1" style="font-size: 11px;">
                                                                <b>Tax Still Due</b> / (Over-remittance) (Item 17 Less Item 22)
                                                            </font>
                                                        </td>
                                                        <td style="width: 20%;" class="tblFormTd">
                                                            <input id="frm1602Q:txt23" name="frm1602Q:txt23" size="20" maxlength="25" style="text-align: right;" type="text" value="0.00"
                                                                disabled="true" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 23-->
    
                                        <!--Item 24-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 80%;">
                                                            <font size="1" style="padding-left: 20px;">Add Penalties:</font>
                                                            <font class="item-number">24</font>
                                                            <font size="1" style="font-size: 11px;">
                                                                Surcharge
                                                            </font>
                                                        </td>
                                                        <td style="width: 20%;" class="tblFormTd">
                                                            <input id="frm1602Q:txt24" name="frm1602Q:txt24" size="20" maxlength="25" style="text-align: right;" type="text" value="0.00"
                                                                onkeypress="return numbersonly(this, event)" onblur="round(this,2); computeAll();"
                                                            />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 24-->
    
                                        <!--Item 25-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 80%;">
                                                            <font class="item-number" style="padding-left: 95px;">25</font>
                                                            <font size="1" style="font-size: 11px;">
                                                                Interest
                                                            </font>
                                                        </td>
                                                        <td style="width: 20%;" class="tblFormTd">
                                                            <input id="frm1602Q:txt25" name="frm1602Q:txt25" size="20" maxlength="25" style="text-align: right;" type="text" value="0.00"
                                                                onkeypress="return numbersonly(this, event)" onblur="round(this,2); computeAll();"
                                                            />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 25-->
    
                                        <!--Item 26-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 80%;">
                                                            <font class="item-number" style="padding-left: 95px;">26</font>
                                                            <font size="1" style="font-size: 11px;">
                                                                Compromise
                                                            </font>
                                                        </td>
                                                        <td style="width: 20%;" class="tblFormTd">
                                                            <input id="frm1602Q:txt26" name="frm1602Q:txt26" size="20" maxlength="25" style="text-align: right;" type="text" value="0.00"
                                                                onkeypress="return numbersonly(this, event)" onblur="round(this,2); computeAll();"
                                                            />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 26-->
    
                                        <!--Item 27-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 80%;">
                                                            <font class="item-number" style="padding-left: 95px;">27</font>
                                                            <font size="1" style="font-size: 11px;">
                                                                Total Penalties (Sum of Items 24 to 26)
                                                            </font>
                                                        </td>
                                                        <td style="width: 20%;" class="tblFormTd">
                                                            <input id="frm1602Q:txt27" name="frm1602Q:txt27" size="20" maxlength="25" style="text-align: right;" type="text" value="0.00"
                                                                disabled="true" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 27-->
    
                                        <!--Item 28-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 80%;">
                                                            <font class="item-number">28</font>
                                                            <font size="1" style="font-size: 11px;">
                                                                <b>TOTAL AMOUNT STILL DUE</b> / (Over-remittance) (Sum of Items
                                                                23 and 27)
                                                            </font>
                                                        </td>
                                                        <td style="width: 20%;" class="tblFormTd">
                                                            <input id="frm1602Q:txt28" name="frm1602Q:txt28" size="20" maxlength="25" style="text-align: right;" type="text" value="0.00"
                                                                disabled="true" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Item 28-->
    
                                        <!--Over remittance-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd">
    
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td style="width: 40%">
                                                                        <font size="1" style="padding-left: 10px;font-size: 11px;">
                                                                            If over-remittance, mark one (1) box only
                                                                        </font>
                                                                        <input type="radio" value="Refund" name="frm1602Q:OverRemittance" id="frm1602Q:OverRemittance1" disabled="true" />
                                                                        <label for="frm1602Q:OverRemittance1" style="font-size:11px;">To be refunded</label>
                                                                    </td>
                                                                    <td style="width: 25%">
                                                                        <input type="radio" value="Certificate" name="frm1602Q:OverRemittance" id="frm1602Q:OverRemittance2" disabled="true" />
                                                                        <label for="frm1602Q:OverRemittance2" style="font-size:11px;">To be issued Tax Credit Certificate</label>
                                                                    </td>
                                                                    <td style="width: 35%">
                                                                        <table>
                                                                            <tr>
                                                                                <td>
                                                                                    <input type="radio" value="Calendar" name="frm1602Q:OverRemittance" id="frm1602Q:OverRemittance3" disabled="true" />
                                                                                </td>
                                                                                <td>
                                                                                    <label for="frm1602Q:OverRemittance3" style="font-size:11px;">
                                                                                        To be carried over to the next quarter within the same calendar year (not applicable for succeeding year)
                                                                                    </label>
                                                                                </td>
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
                                        <!--End Over remittance-->
    
                                        <!--Jurat-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="784">
                                                    <tr>
                                                        <td class="tblFormTd" style="padding: 5px 5px; text-indent: 15px;">
                                                            <font size="1" style="font-size: 11px;">
                                                                We declare under the penalties of perjury that this remittance return, and all its attachments, have been made in good faith
                                                                , verified by us, and to the best of our knowledge and belief,
                                                                is true and correct, pursuant pursuant to the provisions of the
                                                                National Internal Revenue Code, as amended, and the regulations
                                                                issued under authority thereof. (If Authorized Representative,
                                                                attach authorization letter)
                                                            </font>
                                                        </td>
    
    
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Jurat-->
    
                                        <!--Signature-->
                                        <tr>
                                            <td>
                                                <table class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTd" colspan="5" valign="top" class="tblFormTd" height="80" style="background-color: #FFF; vertical-align: bottom;">
    
    
                                                            <div style="text-align: center;">
                                                                ___________________________________________________________
                                                            </div>
    
                                                            <div style="text-align: center;">
                                                                <font size="1">
                                                                    Signature over Printed Name of President / Vice President /
                                                                </font>
                                                            </div>
    
                                                            <div style="text-align: center;">
                                                                <font size="1">
                                                                    Authorized Officer or Representative / Tax Agent (Indicate Title / Designation and TIN)
                                                                </font>
                                                            </div>
    
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Signature-->
    
                                        <!--Accreditation No, Date of Issue, Date of Expiry-->
                                        <tr>
                                            <td>
                                                <table class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 25%; text-align: center;">
                                                            <font size="1" style="font-size: 11px;">
                                                                Tax Accreditation No./
                                                                <br/> Attorney's Roll No. (If Applicable)
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 25%; background-color: #FFF;">
    
                                                        </td>
                                                        <td class="tblFormTd" style="width: 12%; text-align: center;">
                                                            <font size="1" style="font-size: 11px;">
                                                                Date of Issue
                                                                <br/> (MM/DD/YYYY)
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 13%; background-color: #FFF;">
    
                                                        </td>
                                                        <td class="tblFormTd" style="width: 12%; text-align: center;">
                                                            <font size="1" style="font-size: 11px;">
                                                                Date of Expiry
                                                                <br/> (MM/DD/YY)
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 13%; background-color: #FFF;">
    
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Accreditation No, Date of Issue, Date of Expiry-->
    
                                        <!--Details of Payment Header-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td valign="top" class="tblFormTd" style="text-align: center;">
                                                            <font size="2" style="font-weight:bold;">Part III - Details of Payment</font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Details of Payment Header-->
    
                                        <!--Details of Payment-->
                                        <tr>
                                            <td>
                                                <table class="tblForm">
                                                    <!--Title-->
                                                    <tr>
                                                        <td valign="top" class="tblFormTd" style="text-align: center; width: 30%;">
                                                            <font size="1" style="font-size: 11px;">Particulars</font>
                                                        </td>
                                                        <td valign="top" class="tblFormTd" style="text-align: center; width: 15%;">
                                                            <font size="1" style="font-size: 11px;">Drawee Bank / Agency</font>
                                                        </td>
                                                        <td valign="top" class="tblFormTd" style="text-align: center; width: 10%;">
                                                            <font size="1" style="font-size: 11px;">Number</font>
                                                        </td>
                                                        <td valign="top" class="tblFormTd" style="text-align: center; width: 15%;">
                                                            <font size="1" style="font-size: 11px;">Date (MM/DD/YY)</font>
                                                        </td>
                                                        <td valign="top" class="tblFormTd" style="text-align: center; width: 30%;">
                                                            <font size="1" style="font-size: 11px;">Amount</font>
                                                        </td>
                                                    </tr>
                                                    <!--End Title-->
                                                    <tr valign="center" height="22">
                                                        <td class="tblFormTd">
                                                            <font class="item-number">29</font>
                                                            <font size="1" style="font-size: 11px;">Cash Bank</font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;">
    
                                                        </td class="tblFormTd" style="background-color: #FFF;">
                                                        <td class="tblFormTd" style="background-color: #FFF;">
    
                                                        </td class="tblFormTd">
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <tr valign="center" height="22">
                                                        <td class="tblFormTd">
                                                            <font class="item-number">30</font>
                                                            <font size="1">Check</font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
    
                                                    </tr>
                                                    <tr valign="center" height="22">
                                                        <td colspan="2" class="tblFormTd">
                                                            <font class="item-number">31</font>
                                                            <font size="1">Tax Debit Memo</font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
    
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" class="tblFormTd">
                                                            <font class="item-number">32</font>
                                                            <font size="1">Others (specify below)</font>
                                                        </td>
                                                    </tr>
                                                    <tr valign="center" height="22">
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <tr valign="top" height="80">
                                                        <td colspan="4" class="tblFormTd" style="background-color: #FFF; padding-left: 5px;">
                                                            <font size="1" style="font-size: 11px;">Machine Validation / Revenue Official Receipt Details (if not filed
                                                                with an Authorized Agent Bank)</font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF; padding-left: 5px;">
                                                            <font size="1" style="font-size: 11px;">Stamp of Receiving Office / AAB and Date of Receipt (RO's Signature
                                                                / Bank Teller's Initial)
                                                            </font>
                                                        </td>
                                                    </tr>
    
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Details of Payment-->
    
                                    </table>
                                    
                                </div>
                                <!--Page 2-->
                                <div id="Page2" style="display: none;">
                                    <table width="790" border="0" cellspacing="0" cellpadding="0">
                                        <!--Header-->
                                        <tr>
                                            <td>
                                                <table width="741" style="height:90px;" border="1" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" valign="center" style="text-align:center !important">
                                                                <label face="Arial" size="1">BIR Form No.</label>
                                                                <br>
                                                                <font face="Arial" size="6" style="font-weight:bold;">1602Q
    
                                                                </font>
                                                                <label face="Arial" size="1">January 2018</label>
                                                                <br>
                                                                <label face="Arial" size="1">
                                                                    <b>Page 2</b>
                                                                </label>
                                                            </td>
                                                            <td width="60%" align="center">
                                                                <font size="5" style="font-weight:bold;">Quarterly Remittance Return</font>
                                                                <br>
                                                                <p style="font-weight:bold;">
                                                                    <font size="3">of Final Taxes Withheld on Interest Paid on Deposits and
                                                                        Deposits Substitutes/Trusts/Etc.
                                                                    </font>
                                                                </p>
                                                            </td>
                                                            <td width="20%" valign="top">
                                                                <div style="padding-top: 12px">
                                                                    <img class="barcodes"  src="{{ asset('images/Bar Codes/1602QP2.png') }}">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
    
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Header-->
    
                                        <!--TIN Agent's Name-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 40%;">
                                                            <font size="1" style="font-size: 11px;">TIN</font>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 60%;">
                                                            <font size="1" style="font-size: 11px;">Withholding Agent's Name</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="{{$company->tin1.'-'.$company->tin2.'-'.$company->tin3.'-'.$company->tin4}}" size="45" name="frm1602Q:txtPage2TIN" maxlength="70" id="frm1602Q:txtPage2TIN" disabled="true"
                                                                onblur="return capital(this, event)" />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="{{$company->registered_name}}" size="70" name="frm1602Q:txtPage2Agent" maxlength="70" id="frm1602Q:txtPage2Agent" disabled="true"
                                                                onblur="return capital(this, event)" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End TIN Agent's Name-->
                                        <!--Part IV Title-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTdPart">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td style="text-align: center;">
                                                                        <font size="2" style="font-weight:bold;">Part IV - Details of Taxes Withheld</font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Part IV Title-->
                                        <!--Schedule 1 Title-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                Schedule 1
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                - Details of Interest Payments and Tax Withheld Based on
                                                            </font>
    
                                                            <font size="1" style="font-weight:bold;font-size: 11px;">
                                                                Regular RATES
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Schedule 1 Title-->
    
                                        <!--Schedule 1-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr style="text-align: center;">
                                                        <td class="tblFormTd" style="width: 10%;">
                                                            <font size="1" style="font-size: 11px;">
                                                                ATC
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 35%;">
                                                            <font size="1" style="font-size: 11px;">
                                                                Total Interest / Yield Paid / Accrued / Amount
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 5%;">
                                                            <font size="1" style="font-size: 11px;">
                                                                Tax Rate
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 15%;">
                                                            <label size="1" style="font-size: 11px;">
                                                                BSP Exchange Rate on the Date of Remittance
                                                            </label>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 35%;">
                                                            <font size="1" style="font-size: 11px;">
                                                                Taxes Withheld
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <!--Savings Deposit-->
                                                    <tr>
                                                        <td colspan="5" class="tblFormTd">
                                                            <font class="item-number">
                                                                Savings Deposit
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                1
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                WI161
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Amount1" name="frm1602Q:txtSched1Amount1" size="40" maxlength="25" style="text-align: right;"
                                                                type="text" value="0.00" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched1(this.value, 20, 'frm1602Q:txtSched1Tax1');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                20%
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Tax1" name="frm1602Q:txtSched1Tax1" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                2
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                WC161
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Amount2" name="frm1602Q:txtSched1Amount2" size="40" maxlength="25" style="text-align: right;"
                                                                type="text" value="0.00" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched1(this.value, 20, 'frm1602Q:txtSched1Tax2');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                20%
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Tax2" name="frm1602Q:txtSched1Tax2" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" />
                                                        </td>
                                                    </tr>
                                                    <!--End Savings Deposit-->
    
                                                    <!--Time Deposit-->
                                                    <tr>
                                                        <td colspan="5" class="tblFormTd">
                                                            <font class="item-number">
                                                                Time Deposit
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                3
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                WI161
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Amount3" name="frm1602Q:txtSched1Amount3" size="40" maxlength="25" style="text-align: right;"
                                                                type="text" value="0.00" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched1(this.value, 20, 'frm1602Q:txtSched1Tax3');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                20%
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Tax3" name="frm1602Q:txtSched1Tax3" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                4
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                WC161
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Amount4" name="frm1602Q:txtSched1Amount4" size="40" maxlength="25" style="text-align: right;"
                                                                type="text" value="0.00" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched1(this.value, 20, 'frm1602Q:txtSched1Tax4');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                20%
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Tax4" name="frm1602Q:txtSched1Tax4" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" />
                                                        </td>
                                                    </tr>
                                                    <!--End Time Deposit-->
    
                                                    <!--Government Securities-->
                                                    <tr>
                                                        <td colspan="5" class="tblFormTd">
                                                            <font class="item-number">
                                                                Government Securities
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                5
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                WI162
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Amount5" name="frm1602Q:txtSched1Amount5" size="40" maxlength="25" style="text-align: right;"
                                                                type="text" value="0.00" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched1(this.value, 20, 'frm1602Q:txtSched1Tax5');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                20%
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Tax5" name="frm1602Q:txtSched1Tax5" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                6
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                WC162
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Amount6" name="frm1602Q:txtSched1Amount6" size="40" maxlength="25" style="text-align: right;"
                                                                type="text" value="0.00" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched1(this.value, 20, 'frm1602Q:txtSched1Tax6');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                20%
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Tax6" name="frm1602Q:txtSched1Tax6" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" />
                                                        </td>
                                                    </tr>
                                                    <!--End Government Securities-->
    
                                                    <!--Deposit Substitutes/Others-->
                                                    <tr>
                                                        <td colspan="5" class="tblFormTd">
                                                            <font class="item-number">
                                                                Deposit Substitutes / Others
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                7
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                WI163
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Amount7" name="frm1602Q:txtSched1Amount7" size="40" maxlength="25" style="text-align: right;"
                                                                type="text" value="0.00" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched1(this.value, 20, 'frm1602Q:txtSched1Tax7');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                20%
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Tax7" name="frm1602Q:txtSched1Tax7" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                8
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                WC163
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Amount8" name="frm1602Q:txtSched1Amount8" size="40" maxlength="25" style="text-align: right;"
                                                                type="text" value="0.00" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched1(this.value, 20, 'frm1602Q:txtSched1Tax8');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                20%
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Tax8" name="frm1602Q:txtSched1Tax8" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" />
                                                        </td>
                                                    </tr>
                                                    <!--End Deposit Substitutes/Others-->
    
                                                    <!--Pre-terminated Long-Term Deposits / Investments-->
                                                    <tr>
                                                        <td colspan="5" class="tblFormTd">
                                                            <font class="item-number">
                                                                Pre-terminated Long-Term Deposits / Investments
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                9
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                WI440
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Amount9" name="frm1602Q:txtSched1Amount9" size="40" maxlength="25" style="text-align: right;"
                                                                type="text" value="0.00" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched1(this.value, 20, 'frm1602Q:txtSched1Tax9');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                20%
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Tax9" name="frm1602Q:txtSched1Tax9" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                10
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                WI441
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Amount10" name="frm1602Q:txtSched1Amount10" size="40" maxlength="25" style="text-align: right;"
                                                                type="text" value="0.00" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched1(this.value, 12, 'frm1602Q:txtSched1Tax10');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                12%
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Tax10" name="frm1602Q:txtSched1Tax10" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                11
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                WI442
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Amount11" name="frm1602Q:txtSched1Amount11" size="40" maxlength="25" style="text-align: right;"
                                                                type="text" value="0.00" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched1(this.value, 5, 'frm1602Q:txtSched1Tax11');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                5%
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Tax11" name="frm1602Q:txtSched1Tax11" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                12
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                WC440
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Amount12" name="frm1602Q:txtSched1Amount12" size="40" maxlength="25" style="text-align: right;"
                                                                type="text" value="0.00" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched1(this.value, 20, 'frm1602Q:txtSched1Tax12');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                20%
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Tax12" name="frm1602Q:txtSched1Tax12" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" />
                                                        </td>
                                                    </tr>
                                                    <!--End Pre-terminated Long-Term Deposits / Investments-->
    
                                                    <!--Foreign Currency Deposit-->
                                                    <tr>
                                                        <td colspan="5" class="tblFormTd">
                                                            <font class="item-number">
                                                                Foreign Currency Deposit
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                13
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                WI170
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Amount13" name="frm1602Q:txtSched1Amount13" size="40" maxlength="25" style="text-align: right;"
                                                                type="text" value="0.00" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched1BspRate('frm1602Q:txtSched1Amount13', 15, 'frm1602Q:txtSched1Rate13', 'frm1602Q:txtSched1Tax13')"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                15%
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Rate13" name="frm1602Q:txtSched1Rate13" size="14" maxlength="6" style="text-align: right;" type="text"
                                                                value="0.00" onkeypress="return numbersonly(this, event)" onblur="round(this,2); computeSched1BspRate('frm1602Q:txtSched1Amount13', 15, 'frm1602Q:txtSched1Rate13', 'frm1602Q:txtSched1Tax13')"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Tax13" name="frm1602Q:txtSched1Tax13" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                14
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                WC170
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Amount14" name="frm1602Q:txtSched1Amount14" size="40" maxlength="25" style="text-align: right;"
                                                                type="text" value="0.00" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched1BspRate('frm1602Q:txtSched1Amount14', 15, 'frm1602Q:txtSched1Rate14', 'frm1602Q:txtSched1Tax14')"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                15%
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Rate14" name="frm1602Q:txtSched1Rate14" size="14" maxlength="6" style="text-align: right;" type="text"
                                                                value="0.00" onkeypress="return numbersonly(this, event)" onblur="round(this,2); computeSched1BspRate('frm1602Q:txtSched1Amount14', 15, 'frm1602Q:txtSched1Rate14', 'frm1602Q:txtSched1Tax14')"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Tax14" name="frm1602Q:txtSched1Tax14" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" />
                                                        </td>
                                                    </tr>
                                                    <!--End Foreign Currency Deposit-->
    
                                                    <!--On Amounts Withdrawn from Decent's Deposit Account-->
                                                    <tr>
                                                        <td colspan="5" class="tblFormTd">
                                                            <font class="item-number">
                                                                On Amounts Withdrawn from Decent's Deposit Account
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                15
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                WI165
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Amount15" name="frm1602Q:txtSched1Amount15" size="40" maxlength="25" style="text-align: right;"
                                                                type="text" value="0.00" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched1(this.value, 6, 'frm1602Q:txtSched1Tax15');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                6%
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Tax15" name="frm1602Q:txtSched1Tax15" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" />
                                                        </td>
                                                    </tr>
                                                    <!--End On Amounts Withdrawn from Decent's Deposit Account-->
    
                                                    <!--Total Schedule 1-->
                                                    <tr>
                                                        <td colspan="4" class="tblFormTd">
                                                            <font class="item-number">
                                                                16
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                Total Taxes Withheld Based on Regular Rates (Sums of Items 1 to 15) (To Part II, Item 14)
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input id="frm1602Q:txtSched1Total" name="frm1602Q:txtSched1Total" size="40" disabled="true" style="text-align: right;" type="text"
                                                                value="0.00" onblur="round(this,2);" />
                                                        </td>
                                                    </tr>
                                                    <!--Total Schedule 1-->
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Schedule 1-->
    
                                        <!--Schedule 2-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                Schedule 2
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                - Details of Interest Payments and Tax Withheld Based on
                                                            </font>
                                                            <font style="font-weight: bold;">
                                                                TAX TREATY RATES
                                                            </font>
                                                            <font size="1" style="font-size: 11px;">
                                                                (attach additional sheets /s, if necessary)
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--Details-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 12%; text-align: center;">
                                                            <label size="1" style="font-size: 11px;">
                                                                Treaty Code
                                                                <br/> (Refer to Sched 5)
                                                            </label>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 15%; text-align: center;">
                                                            <label size="1" style="font-size: 11px;">
                                                                ATC
                                                                <br/> (same ATC in Sched 1)
                                                            </label>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 33%; text-align: center;">
                                                            <font size="1" style="font-size: 11px;">
                                                                Total Interest
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 5%; text-align: center;">
                                                            <font size="1" style="font-size: 11px;">
                                                                Tax
                                                                <br/> Rate
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 35%; text-align: center;">
                                                            <font size="1" style="font-size: 11px;">
                                                                Taxes Withheld
                                                            </font>
                                                        </td>
    
                                                    </tr>
                                                    <!--End Item 1-->
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                1
                                                            </font>
                                                            <input type="text" value="" size="6" maxlength="3" style="width: 69px;" name="frm1602Q:txtSched2TreatyCode1" id="frm1602Q:txtSched2TreatyCode1"
                                                                onblur="validateTreatyCode(this); return capital(this, event);" />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="" size="14" name="frm1602Q:txtSched2ATC1" maxlength="5" id="frm1602Q:txtSched2ATC1" onblur="validateATC(this); return capital(this, event);"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="0.00" size="38" id="frm1602Q:txtSched2Interest1" name="frm1602Q:txtSched2Interest1" maxlength="25"
                                                                style="text-align: right;" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); 
                                                                    computeSched2('frm1602Q:txtSched2Interest1', 'frm1602Q:txtSched2TaxRate1', 'frm1602Q:txtSched2TaxesWithheld1');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="0.00" size="2" name="frm1602Q:txtSched2TaxRate1" maxlength="4" id="frm1602Q:txtSched2TaxRate1"
                                                                onkeypress="return numbersonly(this, event)" style="text-align: right;"
                                                                onblur="round(this,2); computeSched2('frm1602Q:txtSched2Interest1', 'frm1602Q:txtSched2TaxRate1', 'frm1602Q:txtSched2TaxesWithheld1');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="0.00" size="40" id="frm1602Q:txtSched2TaxesWithheld1" name="frm1602Q:txtSched2TaxesWithheld1" maxlength="25"
                                                                style="text-align: right;" disabled="true" />
                                                        </td>
    
                                                    </tr>
                                                    <!--End Item 1-->
    
                                                    <!--Item 2-->
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                2
                                                            </font>
                                                            <input type="text" value="" size="6" name="frm1602Q:txtSched2TreatyCode2" maxlength="3" style="width: 69px;" id="frm1602Q:txtSched2TreatyCode2"
                                                                onblur="validateTreatyCode(this); return capital(this, event)" />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="" size="14" name="frm1602Q:txtSched2ATC2" maxlength="5" id="frm1602Q:txtSched2ATC2" onblur="validateATC(this); return capital(this, event);"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="0.00" size="38" id="frm1602Q:txtSched2Interest2" name="frm1602Q:txtSched2Interest2" maxlength="25"
                                                                style="text-align: right;" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); 
                                                                    computeSched2('frm1602Q:txtSched2Interest2', 'frm1602Q:txtSched2TaxRate2', 'frm1602Q:txtSched2TaxesWithheld2');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="0.00" size="2" name="frm1602Q:txtSched2TaxRate2" maxlength="4" id="frm1602Q:txtSched2TaxRate2"
                                                                style="text-align: right;" onblur="round(this,2); computeSched2('frm1602Q:txtSched2Interest2', 'frm1602Q:txtSched2TaxRate2', 'frm1602Q:txtSched2TaxesWithheld2')"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="0.00" size="40" id="frm1602Q:txtSched2TaxesWithheld2" name="frm1602Q:txtSched2TaxesWithheld2" maxlength="25"
                                                                style="text-align: right;" disabled="true" />
                                                        </td>
                                                    </tr>
                                                    <!--End Item 2-->
    
                                                    <!--Total-->
                                                    <tr>
                                                        <td colspan="4" class="tblFormTd">
                                                            <font class="item-number">
                                                                3
                                                            </font>
                                                            <font size="1">
                                                                Total Taxes Withheld Based on Tax Treaty Rates (Sums of Items 1 and 2) (To Part II, Item 15)
                                                            </font>
    
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="0.00" size="40" id="frm1602Q:txtSched2Total" name="frm1602Q:txtSched2Total" maxlength="25"
                                                                style="text-align: right;" disabled="true" />
                                                        </td>
                                                    </tr>
                                                    <!--End Total-->
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Details-->
    
                                        <!--End Schedule 2-->
    
                                        <!--Schedule 3-->
                                        <!--Title-->
                                        <tr>
                                            <td>
    
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                Schedule 3
                                                            </font>
                                                            <font size="1">
                                                                - Details of Interest Payments and Tax Withheld on Taxpayers (TPs) Enjoying
                                                                <b>PREFERENTIAL RATES</b> (attach additional sheet/s, if necessary)
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
    
                                            </td>
                                        </tr>
                                        <!--End Title-->
    
                                        <!--Details-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <!--Header-->
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 20%; text-align: center;">
                                                            <font size="1">
                                                                Investment Promotion
                                                                <br/> Agency (IPA) Code
                                                                <br/> (Refer to Sched 6)
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 6%; text-align: center;">
                                                            <font size="1">
                                                                ATC
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                Total Interest
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                Tax
                                                                <br/> Rate
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                Taxes Withheld
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <!--End Header-->
    
                                                    <!--Items 1 to 3-->
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                1
                                                            </font>
                                                            <input type="text" value="" size="18" maxlength="6" name="frm1602Q:txtSched3IPA1" style="width: 152px;" id="frm1602Q:txtSched3IPA1" onblur="validateIPA(this); return capital(this, event);"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                <b>WC390</b>
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="0.00" size="38" id="frm1602Q:txtSched3TotInterest1" name="frm1602Q:txtSched3TotInterest1" maxlength="15"
                                                                style="text-align: right;" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched3('frm1602Q:txtSched3TotInterest1', 'frm1602Q:txtSched3TaxRate1', 'frm1602Q:txtSched3TaxWithheld1');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="0.00" size="2" maxlength="4" name="frm1602Q:txtSched3TaxRate1" id="frm1602Q:txtSched3TaxRate1"
                                                                onkeypress="return numbersonly(this, event)" style="text-align: right;"
                                                                onblur="round(this,2); computeSched3('frm1602Q:txtSched3TotInterest1', 'frm1602Q:txtSched3TaxRate1', 'frm1602Q:txtSched3TaxWithheld1');"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="0.00" size="40" id="frm1602Q:txtSched3TaxWithheld1" name="frm1602Q:txtSched3TaxWithheld1" style="text-align: right;"
                                                                disabled="true" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                2
                                                            </font>
                                                            <input type="text" value="" size="18" maxlength="6" style="width: 152px;" name="frm1602Q:txtSched3IPA2" id="frm1602Q:txtSched3IPA2" onblur="validateIPA(this); return capital(this, event)"
                                                            />
    
                                                        </td>
                                                        <td class="tblFormTd" style="text-align: center;">
                                                            <font size="1">
                                                                <b>WC390</b>
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="0.00" size="38" id="frm1602Q:txtSched3TotInterest2" name="frm1602Q:txtSched3TotInterest2" maxlength="15"
                                                                style="text-align: right;" onkeypress="return numbersonly(this, event);"
                                                                onblur="round(this,2); computeSched3('frm1602Q:txtSched3TotInterest2', 'frm1602Q:txtSched3TaxRate2', 'frm1602Q:txtSched3TaxWithheld2')"
                                                            />
    
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="0.00" size="2" maxlength="4" name="frm1602Q:txtSched3TaxRate2" id="frm1602Q:txtSched3TaxRate2"
                                                                style="text-align: right;" onkeypress="return numbersonly(this, event)"
                                                                onblur="round(this,2); computeSched3('frm1602Q:txtSched3TotInterest2', 'frm1602Q:txtSched3TaxRate2', 'frm1602Q:txtSched3TaxWithheld2')"
                                                            />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="0.00" size="40" id="frm1602Q:txtSched3TaxWithheld2" name="frm1602Q:txtSched3TaxWithheld2" maxlength="15"
                                                                style="text-align: right;" disabled="true" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" class="tblFormTd">
                                                            <font class="item-number">
                                                                3
                                                            </font>
                                                            <font size="1">
                                                                Total Taxes Withheld on TPs Enjoying Preferential Rates (Sum of Items 1 &amp; 2) (To Part II, Item 16)
                                                            </font>
    
                                                        </td>
    
                                                        <td class="tblFormTd">
                                                            <input type="text" value="0.00" size="40" id="frm1602Q:txtSched3Total" name="frm1602Q:txtSched3Total" maxlength="15" style="text-align: right;"
                                                                disabled="true" />
                                                        </td>
                                                    </tr>
                                                    <!--End Items 1 to 3-->
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Details-->
    
                                        <!--End Schedule 3-->
    
                                        <!--Schedule 4-->
                                        <!--Title-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                Schedule 4
                                                            </font>
                                                            <font size="1">
                                                                - Summary of Interest / Yield Paid and Accrued for the Month
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Title-->
    
                                        <!--Header-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td rowspan="2" class="tblFormTd" style="width: 30%; text-align: center;">
                                                            <font size="1">
                                                                Particulars
                                                            </font>
                                                        </td>
                                                        <td colspan="3" class="tblFormTd" style="text-align: center;">
                                                            <b>BANKS</b>
                                                        </td>
    
                                                        <td rowspan="2" class="tblFormTd" style="width: 30%; text-align: center;">
                                                            <font size="1">
                                                                Institutions Other Than Banks
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
    
                                                        <td class="tblFormTd" style="width: 15%; text-align: center;">
                                                            <font size="1">
                                                                Regular Banking Unit
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 20%; text-align: center;">
                                                            <font size="1">
                                                                Foreign Currency Deposit
                                                                <br/> Unit
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 15%; text-align: center;">
                                                            <font size="1">
                                                                Total
                                                            </font>
                                                        </td>
    
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd" style="padding-left: 3px;">
                                                            <font size="1">
                                                                1. On Deposit Liabilities
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd" style="padding-left: 25px;">
                                                            <font size="1">
                                                                Taxable
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd" style="padding-left: 25px;">
                                                            <font size="1">
                                                                Exempt
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
    
                                                    <!--Item 2-->
                                                    <tr>
                                                        <td class="tblFormTd" style="padding-left: 3px;">
                                                            <font size="1">
                                                                2. On Bills Payables / Borrowed Funds
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd" style="padding-left: 25px;">
                                                            <font size="1">
                                                                Taxable
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd" style="padding-left: 25px;">
                                                            <font size="1">
                                                                Exempt
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <!--End Item 2-->
    
                                                    <!--Item 3-->
                                                    <tr>
                                                        <td class="tblFormTd" style="padding-left: 3px;">
                                                            <font size="1">
                                                                3. Long Term Deposit on Investment
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd" style="padding-left: 25px;">
                                                            <font size="1">
                                                                Four (4) years to less than five (5) years
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd" style="padding-left: 25px;">
                                                            <font size="1">
                                                                Three (3) years to less than four (4) years
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd" style="padding-left: 25px;">
                                                            <font size="1">
                                                                Less than Three (3) years
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd" style="padding-left: 25px;">
                                                            <font size="1">
                                                                Exempt
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <!--End Item 3-->
    
                                                    <!--Item 4-->
                                                    <tr>
                                                        <td class="tblFormTd" style="padding-left: 3px;">
                                                            <font size="1">
                                                                4. Others
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd" style="padding-left: 25px;">
                                                            <font size="1">
                                                                Taxable
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd" style="padding-left: 25px;">
                                                            <font size="1">
                                                                Exempt
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd" style="padding-left: 3px;">
                                                            <font size="1">
                                                                Total Interest Expense per Books / FS
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                        <td class="tblFormTd" style="background-color: #FFF;"></td>
                                                    </tr>
                                                    <!--End Item 4-->
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Header-->
    
                                        <!--End Schedule 4-->
    
                                    </table>
                                </div>
                                <!--End Page 2-->
    
                                <!--Page 3-->
                                <div id="Page3" style="display: none;">
                                    <table width="790" border="0" cellspacing="0" cellpadding="0">
                                        <!--Header-->
                                        <tr>
                                            <td>
                                                <table width="741" style="height:90px;" border="1" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" valign="center" style="text-align:center !important">
                                                                <font face="Arial" size="1">BIR Form No.
                                                                    <br>
                                                                </font>
                                                                <font face="Arial" size="6" style="font-weight:bold;">1602Q
    
                                                                </font>
                                                                <font face="Arial" size="1">January 2018</font>
                                                                <br>
                                                                <font face="Arial" size="1">
                                                                    <b>Page 3</b>
                                                                </font>
                                                            </td>
                                                            <td width="60%" align="center">
                                                                <font size="5" style="font-weight:bold;">Quarterly Remittance Return</font>
                                                                <br>
                                                                <p style="font-weight:bold;">
                                                                    <font size="3">of Final Taxes Withheld on Interest Paid on Deposits and
                                                                        Deposits Substitutes/Trusts/Etc.
                                                                    </font>
                                                                </p>
                                                            </td>
                                                            <td width="20%" valign="top">
                                                                <div style="padding-top: 12px">
                                                                    <img class="barcodes"  src="{{ asset('images/Bar Codes/1602QP3.png') }}">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Header-->
    
                                        <!--TIN Agent's Name-->
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTd" style="width: 40%;">
                                                            <font size="1">TIN</font>
                                                        </td>
                                                        <td class="tblFormTd" style="width: 60%;">
                                                            <font size="1">Withholding Agent's Name</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="{{$company->tin1.'-'.$company->tin2.'-'.$company->tin3.'-'.$company->tin4}}" size="45" name="frm1602Q:txtPage3TIN" maxlength="70" id="frm1602Q:txtPage3TIN" disabled="true"
                                                                onblur="return capital(this, event)" />
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <input type="text" value="{{$company->registered_name}}" size="70" name="frm1602Q:txtPage3Agent" maxlength="70" id="frm1602Q:txtPage3Agent" disabled="true"
                                                                onblur="return capital(this, event)" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End TIN Agent's Name-->
    
                                        <!--Schedule 5-->
                                        <!--Schedule 5 Title-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                Schedule 5
                                                            </font>
                                                            <font size="1">
                                                                - Tax Treaty Code
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Schedule 5 Title-->
    
                                        <!--Schedule 5 Details-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <!--Header-->
                                                    <tr style="text-align: center;">
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Treaty
                                                                <br/> Code
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Country
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Treaty
                                                                <br/> Code
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Country
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Treaty
                                                                <br/> Code
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Country
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Treaty
                                                                <br/> Code
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Country
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Treaty
                                                                <br/> Code
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Country
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Treaty
                                                                <br/> Code
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Country
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Treaty
                                                                <br/> Code
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Country
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <!--End Header-->
    
                                                    <!--Row 1-->
                                                    <tr style="text-align: center;">
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                AU
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Australia
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                CA
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Canada
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                DE
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Germany
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                JP
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Japan
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                NG
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Nigeria
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                SG
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Singapore
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                UAE
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                United Arab Emirates
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <!--End Row 1-->
    
                                                    <!--Row 2-->
                                                    <tr style="text-align: center;">
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                AT
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Austria
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                CN
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                China
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                HU
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Hungary
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                KR
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Korea
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                NO
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Norway
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                ES
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Spain
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                GB
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                United Kingdom
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <!--End Row 2-->
    
                                                    <!--Row 3-->
                                                    <tr style="text-align: center;">
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                BH
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Bahrain
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                CZ
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Czech Republic
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                IN
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                India
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                KW
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Kuwait
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                PK
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Pakistan
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                SE
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Sweden
                                                            </font>
                                                        </td>
                                                        <td rowspan="2" class="tblFormTd">
                                                            <font size="1">
                                                                US
                                                            </font>
                                                        </td>
                                                        <td rowspan="2" class="tblFormTd">
                                                            <font size="1">
                                                                United States of
                                                                <br/> America
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <!--End Row 3-->
    
                                                    <!--Row 4-->
                                                    <tr style="text-align: center;">
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                BD
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Bangladesh
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                DK
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Denmark
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                ID
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Indonesia
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                MY
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Malaysia
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                PL
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Poland
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                CH
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Switzerland
                                                            </font>
                                                        </td>
    
                                                    </tr>
                                                    <!--End Row 4-->
    
                                                    <!--Row 5-->
                                                    <tr style="text-align: center;">
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                BE
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Belgium
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                FI
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Finland
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                IL
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Israel
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                NL
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Netherlands
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                RO
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Romania
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                TH
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Thailand
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                VN
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Vietnam
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <!--End Row 5-->
    
                                                    <!--Row 6-->
                                                    <tr style="text-align: center;">
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                BR
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Brazil
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                FR
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                France
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                IT
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Italy
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                NZ
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                New Zealand
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                RU
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Russia
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                        <td class="tblFormTd">
    
                                                        </td>
                                                    </tr>
                                                    <!--End Row 6-->
    
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Schedule 5 Details-->
                                        <!--End Schedule 5-->
    
                                        <!--Schedule 6-->
    
                                        <!--Schedule 6 Title-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <font class="item-number">
                                                                Schedule 6
                                                            </font>
                                                            <font size="1">
                                                                - Investment Promotion Agency Tabulation
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--Schedule 6 Title-->
    
                                        <!--Schedule 5 Details-->
                                        <tr>
                                            <td>
                                                <table width="784" border="0" cellspacing="0" cellpadding="0" class="tblForm">
    
                                                    <!--Row 1-->
                                                    <tr style="text-align: center;">
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                APECO
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Aurora Pacific Economic Zone and Freeport Authority
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                CDC
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Clark Development Authority
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                SBMA
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Subic Bay Metropolitan Authority
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <!--End Row 1-->
    
                                                    <!--Row 2-->
                                                    <tr style="text-align: center;">
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                AFAB
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Authority of the Freeport Area of Bataan
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                JHMC
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                John Hay Management Corporation
                                                            </font>
                                                        </td>
                                                        <td rowspan="2" class="tblFormTd">
                                                            <font size="1">
                                                                TIEZA
                                                            </font>
                                                        </td>
                                                        <td rowspan="2" class="tblFormTd">
                                                            <font size="1">
                                                                Tourism Infrastructure and
                                                                <br/> Enterprise Zone Authority
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <!--End Row 2-->
    
                                                    <!--Row 3-->
                                                    <tr style="text-align: center;">
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                BCDA
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Bases Conversion and Development Authority
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                PEZA
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Philippine Economic Zone Authority
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <!--End Row 3-->
    
                                                    <!--Row 4-->
                                                    <tr style="text-align: center;">
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                BOI
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Board of Investments
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                PPMC
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Poro Point Management Corporation
                                                            </font>
                                                        </td>
                                                        <td rowspan="2" class="tblFormTd">
                                                            <font size="1">
                                                                ZCSEZA
                                                            </font>
                                                        </td>
                                                        <td rowspan="2" class="tblFormTd">
                                                            <font size="1">
                                                                Zamboanga City Special
                                                                <br/> Economic Zone Authority
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <!--End Row 4-->
    
                                                    <!--Row 5-->
                                                    <tr style="text-align: center;">
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                CEZA
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Cagayan Economic Zone Authority
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                RBOI-ARMM
                                                            </font>
                                                        </td>
                                                        <td class="tblFormTd">
                                                            <font size="1">
                                                                Regional Board of Investment-Autonomous Region of Muslim Mindanao
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <!--End Row 5-->
    
                                                </table>
                                            </td>
                                        </tr>
                                        <!--End Schedule 5 Details-->
    
    
                                        <!--End Schedule 6-->
    
                                    </table>
    
                                </div>
                                <!--End Page 3-->
                            </div>
                            <!--End Form Paper-->
                        </td>
                    </tr>
    
                    <!--Print Button-->
                    <tr>
                        <td class="tblForm" style="text-align: center;">
    
                            <table border="0" cellspacing="0" cellpadding="0" style="width: 876px;">
                                <tr>
                                    <td>
                                        <div align="center" class="printButtonClass">
                                            <br />
                                            <input class="printButtonClass" type="button" value="Prev" style="width: 100px;" name="frm1602Q:btnPrevPage" id="frm1602Q:btnPrevPage"
                                                onclick="processPrev();" />
                                            <input id="frm1602Q:txtCurrentPage" name="frm1602Q:txtCurrentPage" value="1" size="1" type="text" style="text-align:center;"
                                                onkeypress="return numbersonly(this, event);" onkeyup="goToPage(this);" />
                                            <span class=large>/&nbsp;</span>
                                            <input type="text" id="frm1602Q:txtMaxPage" readonly="true" size="2" value="3" style="text-align:center;" />&nbsp;
                                            <input class="printButtonClass" type="button" value="Next" style="width: 100px;" name="frm1602Q:btnNextPage" id="frm1602Q:btnNextPage"
                                                onclick="processNext();" />
                                            <br />
                                            <br />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table cellspacing="0" cellpadding="0" border="0" style="width: 876px;">
                                            <tbody>
                                                <tr valign="middle">
                                                    <td></td>
                                                    <td>
                                                        <div align="center">
                                                             @if($action != 'view')
                                                            <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm1602Q:cmdValidate" id="frm1602Q:cmdValidate"
                                                                onclick="validate()" />
                                                            <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm1602Q:cmdEdit" id="frm1602Q:cmdEdit"
                                                                onclick="enableAllControl()" />
                                                            <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                            <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();"
                                                            />
                                                            <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();"
                                                            />
                                                            <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1602Q:btnFinalCopy"
                                                                id="frm1602Q:btnFinalCopy" onclick="submitForm();" />
                                                            <div id="msg" class="printButtonClass" style="display:none;"></div>
                                                            @else
                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                             @endif 
                                                        </div>
                                                    </td>
                                                    <div id="DummyTxt" style='display:none;'> </div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!--End Print Button-->
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
    
        <div id="hiddenEnroll" style="display:none;">
            <input id="txtFinalFlag" class="FinalFlag" name="txtFinalFlag" type="text" onblur="" onkeypress="" value="0" maxlength="60"
            />
            <input id="txtEnroll" name="txtEnroll" type="text" onblur="" onkeypress="" value="N" maxlength="60" />
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
    <div id="responseWF" style="display:none;"><!--loaded files render here--></div>
        <div id="responseATC" style="display:none;"><!--loaded ATC files render here--></div>        
    <div id="responseTreatyCode" style="display:none;"><!--loaded Treaty Code files render here--></div>        
    <div id="responseRdo" style="display:none;"><!--loaded files render here--></div> 
@endsection

@section('scripts')
<script type="text/javascript">
    var isSubmitFinal = false;
    var isSubmit = false;

    var gIsReadOnly = false;

    var atcList = new Array();
    var atcCount = 0;
    var treatyList = new Array();
    var treatyCount = 0;

    var max_number = 10;

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
    var p3TPZip = "";
    var tp_lob = "";


    function atcPropertyJS(formType, atcCode, description, rate, category, base, compType, constTaxDue, minimum, maximum) {
        this.formType = formType;
        this.atcCode = atcCode;
        this.description = description;
        this.rate = rate;
        this.category = category;
        this.base = base;
        this.compType = compType;
        this.constTaxDue = constTaxDue;
        this.minimum = minimum;
        this.maximum = maximum;
    }

    function treatyPropertyJS(treatyCode, description) {
        this.treatyCode = treatyCode;
        this.description = description;
    }

    /*----------------------------------*/
    var d = document, XMLBGFile = '', data = '', XMLFile = '', XMLATCFile = '', XMLTreatyCdFile = '', msg = d.getElementById('msg'), flagB = true, flagC = true;
    var loader = d.getElementById('loader');
    /*----------------------------------*/

    function SectionBC() {
        this.SelTreatyCode = -1;
        this.SelATC = -1;
        this.txtAmtIncomePayment = '0.00';
        this.TxtTaxRate = '0.00';
        this.TxtRequiredWithheld = '0.00';
    }

    var viewForm = false;
    var secB = new Array();
    var secC = new Array();
    var secBToCommit = new Array();
    var secCToCommit = new Array();

    var TreatynameCode = new Array();
    var TreatynameDesc = new Array();
    var str = setTimeout("sleeptime()", 300);
    var globalEmail = "";

    function sleeptime() {
        clearInterval(str);
        init();

        var xmlFileName = document.getElementById('file_name').value;        
        fileName = xmlFileName;
        if (fileName != null && fileName.indexOf('.xml') > -1) {
            loadXML(fileName);
        
            d.getElementById('frm1602Q:txtYear').disabled = true;
            TaxWithhelOption();

            existingXMLFileName = fileName;
            if (gIsReadOnly) {
                window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false;",500);
                
            }
        } else {
            window.setTimeout("$('#loader').hide('blind');",100);
        }
        if ( $('#printMenu').css('display') != 'none' ) {
            $('#printMenu').hide('blind');
        }
        
        document.getElementById('frm1602Q:txtTIN1').disabled = true; 
        document.getElementById('frm1602Q:txtTIN2').disabled = true; 
        document.getElementById('frm1602Q:txtTIN3').disabled = true; 
        document.getElementById('frm1602Q:txtBranchCode').disabled = true;
        document.getElementById('frm1602Q:txtCurrentPage').value = "1";


        window.setTimeout("checkFinalCopyBtn('1602Qv2018')", 1000);
    }

    function rdoPropertyJS(rdoCode, description) {
        this.rdoCode = rdoCode;
        this.description = description;
    }

    var rdoList = new Array();

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
                d.getElementById('frm1602Q:cmdValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
        }
    }
   
    function pause(millis) {
        var d = new Date();
        var curDate = null;

        do { curDate = new Date(); }
        while (curDate - d < millis);
    }


    function loadData() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");

        var elem = document.getElementById('frmMain').elements;
        for (var i = 0; i < elem.length; i++) {

            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&           
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {

                    var fieldVal = String($("#response").html()).split(elem[i].id + '=');

                    if (fieldVal != null && fieldVal.length > 1) {
                        if (elem[i].id == 'frm1602Q:txtTaxpayerName' || elem[i].id == 'frm1602Q:txtAddress') {
                            elem[i].value = unescape(fieldVal[1]);
                        }
                        else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
                        else {
                            elem[i].value = fieldVal[1]; //all select-one and text values               
                        }
                    }
                }
                if (elem[i].type == 'radio') {

                    var rdoVal = String($("#response").html()).split(elem[i].id + '=');
                    if (rdoVal[1] == 'true') {

                        elem[i].checked = rdoVal[1];
                        //elem[i].onclick();
                    }
                }
                if (elem[i].type == 'checkbox') {

                    var chkboxVal = String($("#response").html()).split(elem[i].id + '=');
                    if (chkboxVal[1] == 'true') {
                        elem[i].checked = chkboxVal[1];
                    }
                }
            }

        }
    }

    function isItAnAmendedReturn(xmlFile) {
        if (d.getElementById('frm1602Q:AmendedRtn1').checked) {
            return true;
        } else {
            return false;
        }
    }

    function isItAFinalCopy(xmlFile) {
        var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
        fn = fsoXML.OpenTextFile(xmlFile, 1);
        var fnContent = fn.ReadAll();
        fn.Close();

        if (fnContent.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            return true;
        } else {
            return false;
        }
    }

    function loadXMLATC(fileLocation) {
        try {
            //This will load the ATC file with filename 'fileLocation' if it exists
            var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
            XMLATCFile = fsoXML.OpenTextFile(fileLocation, 1);

            if (XMLATCFile.AtEndOfStream)
                data = "";
            else {
                var responseATC = d.getElementById('responseATC'); //render file and write to hidden div
                responseATC.innerHTML = XMLATCFile.ReadAll(); //remove XML tag
            }
            XMLATCFile.Close(); //alert( responseATC.innerHTML ); //Debug           
            loadATC();  /*This will load ATC onto an array*/
        } catch (e) {
            msg.innerHTML = "ATC File not Found.";
        } //this will Alert File not Found if it doesn't exist
    }

    var atcCount = 0;

    function loadATC() {
        /*This will load data onto an array*/
        var response = d.getElementById("responseATC");

        var atcCnt = String(response.innerHTML).split('atcCount=');
        atcCount = atcCnt[1];

        var j = 0;
        //loads atcList from xml
        for (var i = 1; i <= atcCount; i++) {

            var atc = String(response.innerHTML).split('atc' + i + ':');
            var atcStr = atc[1];

            //Ensure that before writing to atcPropertyJS the formType 1602 is traceable in atcStr
            if (atcStr.indexOf('1602Q') >= 0) {
                var atcValues = atcStr.split('~');

                var formType = "1602Qv2018";
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
                //alert('1602Q successfully created array #'+i);

            } else {
                //alert('1602Q not found in array #'+i);
                continue;
            }
        }
    }

    function loadXMLTreaty(fileLocation) {
        try {
            //This will load the TreatyCode file with filename 'fileLocation' if it exists
            var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
            XMLTreatyFile = fsoXML.OpenTextFile(fileLocation, 1);

            if (XMLTreatyFile.AtEndOfStream)
                data = "";
            else {
                var responseTreaty = d.getElementById('responseTreatyCode'); //render file and write to hidden div
                responseTreaty.innerHTML = XMLTreatyFile.ReadAll(); //remove XML tag
            }
            XMLTreatyFile.Close(); //alert( responseTreaty.innerHTML ); //Debug         
            loadTreaty();   /*This will load ATC onto an array*/
        } catch (e) {
            msg.innerHTML = "Treaty Code File not Found.";
        } //this will Alert File not Found if it doesn't exist
    }

    function loadTreaty() {
        /*This will load data onto an array*/
        var response = d.getElementById("responseTreatyCode");

        var treatyCnt = String(response.innerHTML).split('treatyCount=');
        treatyCount = treatyCnt[1];

        var k = 0;
        //loads treatyList from xml
        for (var i = 1; i <= treatyCount; i++) {

            var treaty = String(response.innerHTML).split('treaty' + i + ':');
            var treatyStr = treaty[1];

            //Ensure that before writing to atcPropertyJS the formType 1602Q is traceable in treatyStr
            if (treatyStr.indexOf('1602') >= 0) {
                var treatyValues = treatyStr.split('~');
                var treatyCode = treatyValues[0];
                var description = treatyValues[1];

                var objTreaty = new treatyPropertyJS(treatyCode, description);
                treatyList[k] = objTreaty;
                k++;
                //alert('1602Q successfully created array #'+i);

            } else {
                //alert('1602Q not found in array #'+i);
                continue;
            }
        }
    }

    function init() {
        @if($action != 'view')
        d.getElementById('frm1602Q:btnFinalCopy').disabled = true;
        d.getElementById('frm1602Q:cmdEdit').disabled = true;
        d.getElementById('btnPrint').disabled = true;
        @else
        disableAllControl();
        @endif
    }

    function setInputTextControl_HorizontalAlignment(id, align) {
        if (d.getElementById(id) != null) {
            //d.getElementById(id).textIndent = parseInt(align);
            d.getElementById(id).style.textAlign = "right";
        }
    }
    function setInputTextControl_NumberFormatter(id, limit, deci) {
        if (d.getElementById(id) != null) {
            d.getElementById(id).size = parseInt(limit);
            d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed(parseInt(deci));
        }
    }

    function blockletter(e) {
        var number = parseFloat(e.value).toFixed(2);
        if (isNaN(number)) {
            //var zero = 0;
            //e.value = parseFloat(zero).toFixed(2);
            e.value = "0.00";
        } else {
            e.value = '' + number;
        }
    }

    function blockletterWithout2Decimal(e) {
        var number = parseFloat(e.value);
        if (isNaN(number)) {
            //var zero = 0;
            //e.value = parseFloat(zero).toFixed(2);
            e.value = "";
        } else {
            e.value = '' + number.toFixed(0);
        }
    }

    var ATCnameCode = new Array();
    var NaturePayment = new Array();
    var taxRate = new Array();

    function getPrivateWithholdingAgentATC() {
        ATCnameCode = new Array();
        NaturePayment = new Array();
        taxRate = new Array();
        //var atcSize = atcList.getSize();
        var atcSize = atcList.length;
        var i = 0;
        var j = 1;
        for (i = 0; i < atcSize; i++) {
            //var atc = atcList.get(i);
            var atc = atcList[i];
            if (atc.formType == "1602Qv2018" && atc.category == 'P') {
                //alert("a " + atc.description);
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j] = atc.description;
                taxRate[j++] = atc.rate;
            }
        }

    }


    //carlo functions
    function ShowSchedule1to3()
    {
        processNext();
    }

    function TaxWithhelOption()
    {
        if(d.getElementById('frm1602Q:OptTaxWithheld1').checked == true)
        {
            d.getElementById('frm1602Q:txtSched1').disabled = false;
            d.getElementById('frm1602Q:txtSched2').disabled = false;
            d.getElementById('frm1602Q:txtSched3').disabled = false;

            d.getElementById('frm1602Q:txtSched1Amount1').disabled = false;
            d.getElementById('frm1602Q:txtSched1Amount2').disabled = false;
            d.getElementById('frm1602Q:txtSched1Amount3').disabled = false;
            d.getElementById('frm1602Q:txtSched1Amount4').disabled = false;
            d.getElementById('frm1602Q:txtSched1Amount5').disabled = false;
            d.getElementById('frm1602Q:txtSched1Amount6').disabled = false;
            d.getElementById('frm1602Q:txtSched1Amount7').disabled = false;
            d.getElementById('frm1602Q:txtSched1Amount8').disabled = false;
            d.getElementById('frm1602Q:txtSched1Amount9').disabled = false;
            d.getElementById('frm1602Q:txtSched1Amount10').disabled = false;
            d.getElementById('frm1602Q:txtSched1Amount11').disabled = false;
            d.getElementById('frm1602Q:txtSched1Amount12').disabled = false;
            d.getElementById('frm1602Q:txtSched1Amount13').disabled = false;
            d.getElementById('frm1602Q:txtSched1Rate13').disabled = false;
            d.getElementById('frm1602Q:txtSched1Amount14').disabled = false;
            d.getElementById('frm1602Q:txtSched1Rate14').disabled = false;
            d.getElementById('frm1602Q:txtSched1Amount15').disabled = false;
            d.getElementById('frm1602Q:txtSched2TreatyCode1').disabled = false;
            d.getElementById('frm1602Q:txtSched2ATC1').disabled = false;
            d.getElementById('frm1602Q:txtSched2Interest1').disabled = false;
            d.getElementById('frm1602Q:txtSched2TaxRate1').disabled = false;
            d.getElementById('frm1602Q:txtSched2TreatyCode2').disabled = false;
            d.getElementById('frm1602Q:txtSched2ATC2').disabled = false;
            d.getElementById('frm1602Q:txtSched2Interest2').disabled = false;
            d.getElementById('frm1602Q:txtSched2TaxRate2').disabled = false;
            d.getElementById('frm1602Q:txtSched3IPA1').disabled = false;
            d.getElementById('frm1602Q:txtSched3TotInterest1').disabled = false;
            d.getElementById('frm1602Q:txtSched3TaxRate1').disabled = false;
            d.getElementById('frm1602Q:txtSched3IPA2').disabled = false;
            d.getElementById('frm1602Q:txtSched3TotInterest2').disabled = false;
            d.getElementById('frm1602Q:txtSched3TaxRate2').disabled = false;
        }
        else{
            
            d.getElementById('frm1602Q:txtSched1').disabled = true;
            d.getElementById('frm1602Q:txtSched2').disabled = true;
            d.getElementById('frm1602Q:txtSched3').disabled = true;

            d.getElementById('frm1602Q:txtSched1Amount1').disabled = true;
            d.getElementById('frm1602Q:txtSched1Amount1').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Amount1').onblur();
            d.getElementById('frm1602Q:txtSched1Amount2').disabled = true;
            d.getElementById('frm1602Q:txtSched1Amount2').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Amount2').onblur();
            d.getElementById('frm1602Q:txtSched1Amount3').disabled = true;
            d.getElementById('frm1602Q:txtSched1Amount3').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Amount3').onblur();
            d.getElementById('frm1602Q:txtSched1Amount4').disabled = true;
            d.getElementById('frm1602Q:txtSched1Amount4').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Amount4').onblur();
            d.getElementById('frm1602Q:txtSched1Amount5').disabled = true;
            d.getElementById('frm1602Q:txtSched1Amount5').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Amount5').onblur();
            d.getElementById('frm1602Q:txtSched1Amount6').disabled = true;
            d.getElementById('frm1602Q:txtSched1Amount6').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Amount6').onblur();
            d.getElementById('frm1602Q:txtSched1Amount7').disabled = true;
            d.getElementById('frm1602Q:txtSched1Amount7').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Amount7').onblur();
            d.getElementById('frm1602Q:txtSched1Amount8').disabled = true;
            d.getElementById('frm1602Q:txtSched1Amount8').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Amount8').onblur();
            d.getElementById('frm1602Q:txtSched1Amount9').disabled = true;
            d.getElementById('frm1602Q:txtSched1Amount9').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Amount9').onblur();
            d.getElementById('frm1602Q:txtSched1Amount10').disabled = true;
            d.getElementById('frm1602Q:txtSched1Amount10').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Amount10').onblur();
            d.getElementById('frm1602Q:txtSched1Amount11').disabled = true;
            d.getElementById('frm1602Q:txtSched1Amount11').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Amount11').onblur();
            d.getElementById('frm1602Q:txtSched1Amount12').disabled = true;
            d.getElementById('frm1602Q:txtSched1Amount12').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Amount12').onblur();
            d.getElementById('frm1602Q:txtSched1Amount13').disabled = true;
            d.getElementById('frm1602Q:txtSched1Amount13').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Amount13').onblur();
            d.getElementById('frm1602Q:txtSched1Rate13').disabled = true;
            d.getElementById('frm1602Q:txtSched1Rate13').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Rate13').onblur();
            d.getElementById('frm1602Q:txtSched1Amount14').disabled = true;
            d.getElementById('frm1602Q:txtSched1Amount14').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Amount14').onblur();
            d.getElementById('frm1602Q:txtSched1Rate14').disabled = true;
            d.getElementById('frm1602Q:txtSched1Rate14').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Rate14').onblur();
            d.getElementById('frm1602Q:txtSched1Amount15').disabled = true;
            d.getElementById('frm1602Q:txtSched1Amount15').value = "0.00";
            d.getElementById('frm1602Q:txtSched1Amount15').onblur();
            d.getElementById('frm1602Q:txtSched2TreatyCode1').disabled = true;
            d.getElementById('frm1602Q:txtSched2TreatyCode1').value = "";
            d.getElementById('frm1602Q:txtSched2ATC1').disabled = true;
            d.getElementById('frm1602Q:txtSched2ATC1').value = "";
            d.getElementById('frm1602Q:txtSched2Interest1').disabled = true;
            d.getElementById('frm1602Q:txtSched2Interest1').value = "0.00";
            d.getElementById('frm1602Q:txtSched2Interest1').onblur();
            d.getElementById('frm1602Q:txtSched2TaxRate1').disabled = true;
            d.getElementById('frm1602Q:txtSched2TaxRate1').value = "0.00";
            d.getElementById('frm1602Q:txtSched2TaxRate1').onblur();
            d.getElementById('frm1602Q:txtSched2TreatyCode2').disabled = true;
            d.getElementById('frm1602Q:txtSched2TreatyCode2').value = "";
            d.getElementById('frm1602Q:txtSched2ATC2').disabled = true;
            d.getElementById('frm1602Q:txtSched2ATC2').value = "";
            d.getElementById('frm1602Q:txtSched2Interest2').disabled = true;
            d.getElementById('frm1602Q:txtSched2Interest2').value = "0.00";
            d.getElementById('frm1602Q:txtSched2Interest2').onblur();
            d.getElementById('frm1602Q:txtSched2TaxRate2').disabled = true;
            d.getElementById('frm1602Q:txtSched2TaxRate2').value = "0.00";
            d.getElementById('frm1602Q:txtSched2TaxRate2').onblur();
            d.getElementById('frm1602Q:txtSched3IPA1').disabled = true;
            d.getElementById('frm1602Q:txtSched3IPA1').value = "";
            d.getElementById('frm1602Q:txtSched3TotInterest1').disabled = true;
            d.getElementById('frm1602Q:txtSched3TotInterest1').value = "0.00";
            d.getElementById('frm1602Q:txtSched3TotInterest1').onblur();
            d.getElementById('frm1602Q:txtSched3TaxRate1').disabled = true;
            d.getElementById('frm1602Q:txtSched3TaxRate1').value = "0.00";
            d.getElementById('frm1602Q:txtSched3TaxRate1').onblur();
            d.getElementById('frm1602Q:txtSched3IPA2').disabled = true;
            d.getElementById('frm1602Q:txtSched3IPA2').value = "";
            d.getElementById('frm1602Q:txtSched3TotInterest2').disabled = true;
            d.getElementById('frm1602Q:txtSched3TotInterest2').value = "0.00";
            d.getElementById('frm1602Q:txtSched3TotInterest2').onblur();
            d.getElementById('frm1602Q:txtSched3TaxRate2').disabled = true;
            d.getElementById('frm1602Q:txtSched3TaxRate2').value = "0.00";
            d.getElementById('frm1602Q:txtSched3TaxRate2').onblur();


        }
    }

    function validateSched2()
    {
        if(d.getElementById('frm1602Q:txtSched2TreatyCode1').value != "")
        {
            if(d.getElementById('frm1602Q:txtSched2ATC1').value == "")
            {
                alert("Please fill up ATC field in Schedule 2 row 1.");
                return false;
            }
        }

        if(d.getElementById('frm1602Q:txtSched2ATC1').value != "")
        {
            if(d.getElementById('frm1602Q:txtSched2TreatyCode1').value == "")
            {
                alert("Please fill up Treaty Code field in Schedule 2 row 1.");
                return false;
            }
        }

        if(NumWithComma(d.getElementById('frm1602Q:txtSched2Interest1').value) > 0)
        {
            if(d.getElementById('frm1602Q:txtSched2TreatyCode1').value == "" || d.getElementById('frm1602Q:txtSched2ATC1').value == "")
            {
                alert("Please fill up Schedule 2 row 1 completely.");
                return false;
            }
        }

        if(NumWithComma(d.getElementById('frm1602Q:txtSched2TaxRate1').value) > 0)
        {
            if(d.getElementById('frm1602Q:txtSched2TreatyCode1').value == "" || d.getElementById('frm1602Q:txtSched2ATC1').value == "")
            {
                alert("Please fill up Schedule 2 row 1 completely.");
                return false;
            }
        }


        if(d.getElementById('frm1602Q:txtSched2TreatyCode2').value != "")
        {
            if(d.getElementById('frm1602Q:txtSched2ATC2').value == "")
            {
                alert("Please fill up ATC field in Schedule 2 row 2.");
                return false;
            }
        }

        if(d.getElementById('frm1602Q:txtSched2ATC2').value != "")
        {
            if(d.getElementById('frm1602Q:txtSched2TreatyCode2').value == "")
            {
                alert("Please fill up Treaty Code field in Schedule 2 row 2.");
                return false;
            }
        }

        if(NumWithComma(d.getElementById('frm1602Q:txtSched2Interest2').value) > 0)
        {
            if(d.getElementById('frm1602Q:txtSched2TreatyCode2').value == "" || d.getElementById('frm1602Q:txtSched2ATC2').value == "")
            {
                alert("Please fill up Schedule 2 row 2 completely.");
                return false;
            }
        }

        if(NumWithComma(d.getElementById('frm1602Q:txtSched2TaxRate2').value) > 0)
        {
            if(d.getElementById('frm1602Q:txtSched2TreatyCode2').value == "" || d.getElementById('frm1602Q:txtSched2ATC2').value == "")
            {
                alert("Please fill up Schedule 2 row 12 completely.");
                return false;
            }
        }

        return true;
    }

    function validateSched3()
    {
        if(NumWithComma(d.getElementById('frm1602Q:txtSched3TotInterest1').value) > 0)
        {
            if(d.getElementById('frm1602Q:txtSched3IPA1').value == "")
            {
                alert("Please fill up Schedule 3 row 1 completely.");
                return false;
            }
        }

        if(NumWithComma(d.getElementById('frm1602Q:txtSched3TaxRate1').value) > 0)
        {
            if(d.getElementById('frm1602Q:txtSched3IPA1').value == "")
            {
                alert("Please fill up Schedule 3 row 1 completely.");
                return false;
            }
        }

        if(NumWithComma(d.getElementById('frm1602Q:txtSched3TotInterest2').value) > 0)
        {
            if(d.getElementById('frm1602Q:txtSched3IPA2').value == "")
            {
                alert("Please fill up Schedule 3 row 2 completely.");
                return false;
            }
        }

        if(NumWithComma(d.getElementById('frm1602Q:txtSched3TaxRate2').value) > 0)
        {
            if(d.getElementById('frm1602Q:txtSched3IPA2').value == "")
            {
                alert("Please fill up Schedule 3 row 2 completely.");
                return false;
            }
        }

        return true;
    }

    function quarterPeriod()
    {
        var qtrPeriod = "";

        if(d.getElementById('frm1602Q:qtr_1').checked == true)
        {
            qtrPeriod = "Q1";
        }
        if(d.getElementById('frm1602Q:qtr_2').checked == true)
        {
            qtrPeriod = "Q2";
        }
        if(d.getElementById('frm1602Q:qtr_3').checked == true)
        {
            qtrPeriod = "Q3";
        }
        if(d.getElementById('frm1602Q:qtr_4').checked == true)
        {
            qtrPeriod = "Q4";
        }

        return qtrPeriod;
    }

    function DrpListTreaty()
    {
        if(d.getElementById('frm1602Q:OptSpecialTax1').checked == true)
        {
            d.getElementById('frm1602Q:lstSpecialTax').disabled = false;

            d.getElementById('frm1602Q:txtSched2TreatyCode1').disabled = false;
            d.getElementById('frm1602Q:txtSched2ATC1').disabled = false;
            d.getElementById('frm1602Q:txtSched2Interest1').disabled = false;
            d.getElementById('frm1602Q:txtSched2TaxRate1').disabled = false;

            d.getElementById('frm1602Q:txtSched2TreatyCode2').disabled = false;
            d.getElementById('frm1602Q:txtSched2ATC2').disabled = false;
            d.getElementById('frm1602Q:txtSched2Interest2').disabled = false;
            d.getElementById('frm1602Q:txtSched2TaxRate2').disabled = false;

        }
        else if(d.getElementById('frm1602Q:OptSpecialTax2').checked == true){

            d.getElementById('frm1602Q:lstSpecialTax').selectedIndex = 0;
            d.getElementById('frm1602Q:lstSpecialTax').disabled = true;


            d.getElementById('frm1602Q:txtSched2TreatyCode1').value = "";
            d.getElementById('frm1602Q:txtSched2ATC1').value = "";
            d.getElementById('frm1602Q:txtSched2Interest1').value = "0.00";
            d.getElementById('frm1602Q:txtSched2TaxRate1').value = "0.00";
            d.getElementById('frm1602Q:txtSched2TaxesWithheld1').value = "0.00";

            d.getElementById('frm1602Q:txtSched2TreatyCode2').value = "";
            d.getElementById('frm1602Q:txtSched2ATC2').value = "";
            d.getElementById('frm1602Q:txtSched2Interest2').value = "0.00";
            d.getElementById('frm1602Q:txtSched2TaxRate2').value = "0.00";
            d.getElementById('frm1602Q:txtSched2TaxesWithheld2').value = "0.00";


            d.getElementById('frm1602Q:txtSched2TreatyCode1').disabled = true;
            d.getElementById('frm1602Q:txtSched2ATC1').disabled = true;
            d.getElementById('frm1602Q:txtSched2Interest1').disabled = true;
            d.getElementById('frm1602Q:txtSched2TaxRate1').disabled = true;

            d.getElementById('frm1602Q:txtSched2TreatyCode2').disabled = true;
            d.getElementById('frm1602Q:txtSched2ATC2').disabled = true;
            d.getElementById('frm1602Q:txtSched2Interest2').disabled = true;
            d.getElementById('frm1602Q:txtSched2TaxRate2').disabled = true;
        }

        computeSched2Total();
        computeAll();
    }

    function computeAll()
    {
        computeItem17();
        computeItem22();
        computeItem23();
        computeItem27();
        computeItem28();
    }

    //validation of item 28 included here
    function computeItem28()
    {
        var item28 = NumWithComma(d.getElementById('frm1602Q:txt23').value) + NumWithComma(d.getElementById('frm1602Q:txt27').value);

        d.getElementById('frm1602Q:txt28').value = formatCurrency(item28);

        if(item28 < 0)
        {
            enableOverRemittanceOpts();
        }
        else{
            disableOverRemittanceOpts();
        }
    }

    function enableOverRemittanceOpts()
    {
        d.getElementById('frm1602Q:OverRemittance1').disabled = false;
        d.getElementById('frm1602Q:OverRemittance2').disabled = false;
        d.getElementById('frm1602Q:OverRemittance3').disabled = false;
    }

    function disableOverRemittanceOpts()
    {
        d.getElementById('frm1602Q:OverRemittance1').checked = false;
        d.getElementById('frm1602Q:OverRemittance2').checked = false;
        d.getElementById('frm1602Q:OverRemittance3').checked = false;

        d.getElementById('frm1602Q:OverRemittance1').disabled = true;
        d.getElementById('frm1602Q:OverRemittance2').disabled = true;
        d.getElementById('frm1602Q:OverRemittance3').disabled = true;
    }

    function computeItem27()
    {
        var item27 = NumWithComma(d.getElementById('frm1602Q:txt24').value) + NumWithComma(d.getElementById('frm1602Q:txt25').value) +
        NumWithComma(d.getElementById('frm1602Q:txt26').value);

        d.getElementById('frm1602Q:txt27').value = formatCurrency(item27);
    }

    function computeItem23()
    {
        var item23 = NumWithComma(d.getElementById('frm1602Q:txt17').value) - NumWithComma(d.getElementById('frm1602Q:txt22').value);

        d.getElementById('frm1602Q:txt23').value = formatCurrency(item23);
    }

    function computeItem22()
    {
        var item22 = NumWithComma(d.getElementById('frm1602Q:txt18').value) + NumWithComma(d.getElementById('frm1602Q:txt19').value) +
        NumWithComma(d.getElementById('frm1602Q:txt20').value) + NumWithComma(d.getElementById('frm1602Q:txt21').value);

        d.getElementById('frm1602Q:txt22').value = formatCurrency(item22);
    }

    function computeItem17()
    {
        var item17 = NumWithComma(d.getElementById('frm1602Q:txt14').value) + NumWithComma(d.getElementById('frm1602Q:txt15').value) + 
        NumWithComma(d.getElementById('frm1602Q:txt16').value);

        d.getElementById('frm1602Q:txt17').value = formatCurrency(item17);   
    }

    function validateIPA(obj)
    {
        var ipaCode = obj.value;
        var ipaCodeArray = ["", "APECO", "AFAB", "BCDA", "FOI", "CEZA", "CDC", "JHMC", "PEZA", "PPMC",
        "RBOI-ARMM", "SBMA", "TIEZA", "ZCSEZA"];

        for(var i=0; i<ipaCodeArray.length; i++)
        {
            if(ipaCode.toUpperCase() == ipaCodeArray[i])
            {
                return;
            }
        }

        alert("Invalid IPA Code! Please refer to IPA Codes in Schedule 6.");
        obj.value = "";
    }

    function computeSched3(objamount, objrate, objout)
    {
        var amount = NumWithComma(d.getElementById(objamount).value);
        var taxRate = NumWithComma(d.getElementById(objrate).value);

        var taxWithheld = amount * (taxRate / 100);

        d.getElementById(objout).value = formatCurrency(taxWithheld); 

        computeSched3Total();
    }

    function computeSched3Total()
    {
        var total = NumWithComma(d.getElementById('frm1602Q:txtSched3TaxWithheld1').value) + NumWithComma(d.getElementById('frm1602Q:txtSched3TaxWithheld2').value);

        d.getElementById('frm1602Q:txtSched3Total').value = formatCurrency(total);
        d.getElementById('frm1602Q:txt16').value = formatCurrency(total);

        computeAll();
    }

    function computeSched2(objamount, objrate, objout)
    {
        var amount = NumWithComma(d.getElementById(objamount).value);
        var taxRate = NumWithComma(d.getElementById(objrate).value);

        var taxWithheld = amount * (taxRate / 100);

        d.getElementById(objout).value = formatCurrency(taxWithheld); 

        computeSched2Total();
    }

    function computeSched2Total()
    {
       var total = NumWithComma(d.getElementById('frm1602Q:txtSched2TaxesWithheld1').value) + NumWithComma(d.getElementById('frm1602Q:txtSched2TaxesWithheld2').value);

       d.getElementById('frm1602Q:txtSched2Total').value = formatCurrency(total); 
       d.getElementById('frm1602Q:txt15').value = formatCurrency(total);

       computeAll();
    }

    function validateATC(obj)
    {
        var atcCode = obj.value;
        var atcCodeArray = ["", "WI161", "WC161", "WI162", "WC162", "WI163", "WC163", "WI440", "WI441",
        "WI442", "WC440", "WI170", "WC170", "WI165"];

        for(var i=0; i<atcCodeArray.length; i++)
        {
            if(atcCode.toUpperCase() == atcCodeArray[i])
            {
                return;
            }
        }

        alert("Invalid ATC Code! Please refer to the ATC Codes in Schedule 1.");
        obj.value = "";
    }

    function validateTreatyCode(obj)
    {
        var treatycode = obj.value;
        var treatyCodeArray = ["", "AU", "AT", "BH", "BD", "BE", "BR", "CA", "CN", "CZ", "DK", "FI", "FR",
        "DE", "HU", "IN", "ID", "IL", "IT", "JP", "KR", "KW", "MY", "NL", "KZ", "NG", "NO", "PK",
        "PL", "RO", "RU", "SG", "ES", "SE", "CH", "TH", "UAE", "GB", "US", "VN"];

        for(var i=0; i<treatyCodeArray.length; i++)
        {
            if(treatycode.toUpperCase() == treatyCodeArray[i])
            {
                return;
            }
        }

        alert("Invalid Treaty Code! Please refer to the treaty code in schedule 5.");
        obj.value = "";
    }

    function computeSched1(amount, rate, objout)
    {
        var taxWithheld = NumWithComma(amount) * (rate / 100)

        d.getElementById(objout).value = formatCurrency(taxWithheld);

        computeSched1Total();
    }

    function computeSched1BspRate(amount, rate, bsprate, objout)
    {
        var numAmount = document.getElementById(amount).value
        var numBspRate = document.getElementById(bsprate).value

        var taxWithheld = NumWithComma(numAmount) * (rate / 100) * NumWithComma(numBspRate);

        d.getElementById(objout).value = formatCurrency(taxWithheld);

        computeSched1Total();
    }

    function computeSched1Total()
    {
        var total = NumWithComma(d.getElementById('frm1602Q:txtSched1Tax1').value) + 
        NumWithComma(d.getElementById('frm1602Q:txtSched1Tax2').value) +
        NumWithComma(d.getElementById('frm1602Q:txtSched1Tax3').value) + 
        NumWithComma(d.getElementById('frm1602Q:txtSched1Tax4').value) +
        NumWithComma(d.getElementById('frm1602Q:txtSched1Tax5').value) + 
        NumWithComma(d.getElementById('frm1602Q:txtSched1Tax6').value) +
        NumWithComma(d.getElementById('frm1602Q:txtSched1Tax7').value) + 
        NumWithComma(d.getElementById('frm1602Q:txtSched1Tax8').value) +
        NumWithComma(d.getElementById('frm1602Q:txtSched1Tax9').value) + 
        NumWithComma(d.getElementById('frm1602Q:txtSched1Tax10').value) +
        NumWithComma(d.getElementById('frm1602Q:txtSched1Tax11').value) + 
        NumWithComma(d.getElementById('frm1602Q:txtSched1Tax12').value) +
        NumWithComma(d.getElementById('frm1602Q:txtSched1Tax13').value) + 
        NumWithComma(d.getElementById('frm1602Q:txtSched1Tax14').value) +
        NumWithComma(d.getElementById('frm1602Q:txtSched1Tax15').value);

        d.getElementById('frm1602Q:txtSched1Total').value = formatCurrency(total);
        d.getElementById('frm1602Q:txt14').value = formatCurrency(total);
        computeAll();
    }

    var currentPage = 1;
    var maxPage = 3;

    function goToPage(pageVal) {
        var newPage = pageVal.value;

        if (newPage <= maxPage && newPage >= 1) {
            $('#Page' + newPage).show('blind');
                $('#Page' + currentPage).hide('blind');
                currentPage = newPage;
        }
        else {
            alert("Invalid page.");
            pageVal.value = currentPage;
        }
    }

    function processNext() {
        if (currentPage < maxPage) {
            currentPage++;

            $('#Page' + currentPage).show('blind');
            $('#Page' + (currentPage - 1)).hide('blind');
            document.getElementById('frm1602Q:txtCurrentPage').value = currentPage;
        }
    }

    function processPrev() {
        if (currentPage > 1) {
            currentPage--;
            $('#Page' + currentPage).show('blind');
            $('#Page' + (currentPage + 1)).hide('blind');
            document.getElementById('frm1602Q:txtCurrentPage').value = currentPage;

            
        }
    }

    //end carlo function
   
    function validateYear() {

        var currentYear = new Date().getFullYear();
        if (d.getElementById("frm1602Q:txtYear").value < 2018) {
            alert("Please file using the old version of the form.");
            d.getElementById("frm1602Q:txtYear").value = "2018";
        }
        if (d.getElementById("frm1602Q:txtYear").value > currentYear) {
            alert("Invalid year. Year should not be later than the current year.");
            d.getElementById("frm1602Q:txtYear").value = currentYear;
        }
    }

    //validate form
    function validate() {
        var dt = new Date();
        if (d.getElementById('frm1602Q:txtYear').value == "") {
            alert("Please enter a valid year on Item 1."); return;
        }
        if( d.getElementById('frm1602Q:txtYear').value*1 > dt.getFullYear()*1   )
        {
            alert("Invalid date entry on Item no.1. Entry should not be later than Current Date.")
            return;
        }
        
        if (d.getElementById('frm1602Q:txtYear').value * 1 < 2018) {
            alert("Invalid date entry on Item 1. Entry should not be lower than 2018.")
            return;
        }

        if(d.getElementById('frm1602Q:qtr_1').checked==false && d.getElementById('frm1602Q:qtr_2').checked==false &&
        d.getElementById('frm1602Q:qtr_3').checked==false && d.getElementById('frm1602Q:qtr_4').checked==false)
        {
            alert("Please select an option in item number 2.")
            return;
        }

        if(d.getElementById('frm1602Q:AmendedRtn1').checked == false && d.getElementById('frm1602Q:AmendedRtn2').checked == false)
        {
            alert("Please select an option in item number 3.")
            return;
        }

        if ((d.getElementById('frm1602Q:txtTIN1').value == "" || d.getElementById('frm1602Q:txtTIN2').value == "" || d.getElementById('frm1602Q:txtTIN3').value == "" || d.getElementById('frm1602Q:txtBranchCode').value == "")) {
            alert("Please enter a valid TIN number on Item 5.");
            return;
        }
       
        if ((d.getElementById('frm1602Q:txtTaxpayerName').value == "")) {
            alert("Please enter a valid Taxpayer Name on Item 8.");
            return;
        }
        if ((d.getElementById('frm1602Q:txtTelNum').value == "")) {
            alert("Please enter a valid Telephone Number on Item 9.");
            return;
        }
        if ((d.getElementById('frm1602Q:txtAddress').value == "")) {
            alert("Please enter Taxpayer's Registered Address on Item 10.");
            return;
        }
        if ((d.getElementById('frm1602Q:txtZipCode').value == "")) {
            alert("Please enter Taxpayer's Zip Code on Item 11.");
            return;
        }

        if (d.getElementById('frm1602Q:OptTaxWithheld1').checked == false && d.getElementById('frm1602Q:OptTaxWithheld2').checked == false) {
            alert("Please select an option for Item 4."); return;
        }

        if (d.getElementById('frm1602Q:OptCategoryAgent1').checked == false && d.getElementById('frm1602Q:OptCategoryAgent2').checked == false) {
            alert("Please select an option for Item 11."); return;
        }

        if(d.getElementById('frm1602Q:OptSpecialTax1').checked == false && d.getElementById('frm1602Q:OptSpecialTax2').checked == false)
        {
            alert("Please select an option in item 13.");
            return;
        }

        if(d.getElementById('frm1602Q:OptSpecialTax1').checked == true)
        {
            if(d.getElementById('frm1602Q:lstSpecialTax').selectedIndex == 0)
            {
                alert('Please select an option in item 13A.')
                return;
            }
        }

        if (d.getElementById('frm1602Q:OptTaxWithheld1').checked == true) {
            if (d.getElementById('frm1602Q:txt14').value == 0 && d.getElementById('frm1602Q:txt15').value == 0 &&
            d.getElementById('frm1602Q:txt15').value == 0) {

                alert("Please fill up Part IV if item 4 is set to Yes."); 
                return;
            }
        }

        if(NumWithComma(d.getElementById('frm1602Q:txt28').value) < 0)
        {
            if(d.getElementById('frm1602Q:OverRemittance1').checked == false && d.getElementById('frm1602Q:OverRemittance2').checked == false
            && d.getElementById('frm1602Q:OverRemittance3').checked == false)
            {
                alert("Please select an option for over-remittance below item 28.");
                return;
            }
        }

        if(!validateSched2())
        {
            return;
        }

        if(!validateSched3())
        {
            return;
        }

        //buttons
        d.getElementById('frm1602Q:cmdValidate').disabled = true;
        d.getElementById('frm1602Q:cmdEdit').disabled = false;
        d.getElementById('frm1602Q:btnFinalCopy').disabled = false;
        d.getElementById('btnSave').disabled = false;
        d.getElementById('btnPrint').disabled = false;
       
        disableAllControl();

        alert("Validation successful. Click on 'Edit' if you wish to modify your entries.");
        return;
    }

    var disableElem = true;
    var enableElem = false;
    function disableAllControl() {
        //page 1
        d.getElementById('frm1602Q:txtSheets').disabled = true;
        d.getElementById('frm1602Q:txtTIN1').disabled = true;
        d.getElementById('frm1602Q:txtTIN2').disabled = true;
        d.getElementById('frm1602Q:txtTIN3').disabled = true;
        d.getElementById('frm1602Q:txtBranchCode').disabled = true;
        d.getElementById('frm1602Q:txtRDOCode').disabled = true;
        //d.getElementById('frm1602Q:txtLineBus').disabled = true;
        d.getElementById('frm1602Q:txtTaxpayerName').disabled = true;
        d.getElementById('frm1602Q:txtTelNum').disabled = true;
        d.getElementById('frm1602Q:txtAddress').disabled = true;
        d.getElementById('frm1602Q:txtZipCode').disabled = true;


        d.getElementById('frm1602Q:txtYear').disabled = true;

        d.getElementById('frm1602Q:qtr_1').disabled = true;
        d.getElementById('frm1602Q:qtr_2').disabled = true;
        d.getElementById('frm1602Q:qtr_3').disabled = true;
        d.getElementById('frm1602Q:qtr_4').disabled = true;

        d.getElementById('frm1602Q:AmendedRtn1').disabled = true;
        d.getElementById('frm1602Q:AmendedRtn2').disabled = true;
        
     
        
        d.getElementById('frm1602Q:OptTaxWithheld1').disabled = true;
        d.getElementById('frm1602Q:OptTaxWithheld2').disabled = true;
        d.getElementById('frm1602Q:OptCategoryAgent1').disabled = true;
        d.getElementById('frm1602Q:OptCategoryAgent2').disabled = true;
        d.getElementById('frm1602Q:OptSpecialTax1').disabled = true;
        d.getElementById('frm1602Q:OptSpecialTax2').disabled = true;
        d.getElementById('frm1602Q:lstSpecialTax').disabled = true;

        d.getElementById('frm1602Q:txt18').disabled = true;
        d.getElementById('frm1602Q:txt19').disabled = true;
        d.getElementById('frm1602Q:txt20').disabled = true;
        d.getElementById('frm1602Q:txt21').disabled = true;
        d.getElementById('frm1602Q:txt24').disabled = true;
        d.getElementById('frm1602Q:txt25').disabled = true;
        d.getElementById('frm1602Q:txt26').disabled = true;

        d.getElementById('frm1602Q:OverRemittance1').disabled = true;
        d.getElementById('frm1602Q:OverRemittance2').disabled = true;
        d.getElementById('frm1602Q:OverRemittance3').disabled = true;

        //page 2

        d.getElementById('frm1602Q:txtSched1Amount1').disabled = true;
        d.getElementById('frm1602Q:txtSched1Amount2').disabled = true;
        d.getElementById('frm1602Q:txtSched1Amount3').disabled = true;
        d.getElementById('frm1602Q:txtSched1Amount4').disabled = true;
        d.getElementById('frm1602Q:txtSched1Amount5').disabled = true;
        d.getElementById('frm1602Q:txtSched1Amount6').disabled = true;
        d.getElementById('frm1602Q:txtSched1Amount7').disabled = true;
        d.getElementById('frm1602Q:txtSched1Amount8').disabled = true;
        d.getElementById('frm1602Q:txtSched1Amount9').disabled = true;
        d.getElementById('frm1602Q:txtSched1Amount10').disabled = true;
        d.getElementById('frm1602Q:txtSched1Amount11').disabled = true;
        d.getElementById('frm1602Q:txtSched1Amount12').disabled = true;
        d.getElementById('frm1602Q:txtSched1Amount13').disabled = true;
        d.getElementById('frm1602Q:txtSched1Rate13').disabled = true;
        d.getElementById('frm1602Q:txtSched1Amount14').disabled = true;
        d.getElementById('frm1602Q:txtSched1Rate14').disabled = true;
        d.getElementById('frm1602Q:txtSched1Amount15').disabled = true;
        d.getElementById('frm1602Q:txtSched2TreatyCode1').disabled = true;
        d.getElementById('frm1602Q:txtSched2ATC1').disabled = true;
        d.getElementById('frm1602Q:txtSched2Interest1').disabled = true;
        d.getElementById('frm1602Q:txtSched2TaxRate1').disabled = true;
        d.getElementById('frm1602Q:txtSched2TreatyCode2').disabled = true;
        d.getElementById('frm1602Q:txtSched2ATC2').disabled = true;
        d.getElementById('frm1602Q:txtSched2Interest2').disabled = true;
        d.getElementById('frm1602Q:txtSched2TaxRate2').disabled = true;
        d.getElementById('frm1602Q:txtSched3IPA1').disabled = true;
        d.getElementById('frm1602Q:txtSched3TotInterest1').disabled = true;
        d.getElementById('frm1602Q:txtSched3TaxRate1').disabled = true;
        d.getElementById('frm1602Q:txtSched3IPA2').disabled = true;
        d.getElementById('frm1602Q:txtSched3TotInterest2').disabled = true;
        d.getElementById('frm1602Q:txtSched3TaxRate2').disabled = true;

        disableElem;
        enableElem;
    }


    function enableAllControl() {
        //page 1
        d.getElementById('frm1602Q:txtYear').disabled = false;

        d.getElementById('frm1602Q:qtr_1').disabled = false;
        d.getElementById('frm1602Q:qtr_2').disabled = false;
        d.getElementById('frm1602Q:qtr_3').disabled = false;
        d.getElementById('frm1602Q:qtr_4').disabled = false;

        d.getElementById('frm1602Q:AmendedRtn1').disabled = false;
        d.getElementById('frm1602Q:AmendedRtn2').disabled = false;
        
     
        
        d.getElementById('frm1602Q:OptTaxWithheld1').disabled = false;
        d.getElementById('frm1602Q:OptTaxWithheld2').disabled = false;
        d.getElementById('frm1602Q:OptCategoryAgent1').disabled = false;
        d.getElementById('frm1602Q:OptCategoryAgent2').disabled = false;
        d.getElementById('frm1602Q:OptSpecialTax1').disabled = false;
        d.getElementById('frm1602Q:OptSpecialTax2').disabled = false;
        d.getElementById('frm1602Q:lstSpecialTax').disabled = false;

        d.getElementById('frm1602Q:txt18').disabled = false;
        d.getElementById('frm1602Q:txt19').disabled = false;
        d.getElementById('frm1602Q:txt20').disabled = false;
        d.getElementById('frm1602Q:txt21').disabled = false;
        d.getElementById('frm1602Q:txt24').disabled = false;
        d.getElementById('frm1602Q:txt25').disabled = false;
        d.getElementById('frm1602Q:txt26').disabled = false;

        d.getElementById('frm1602Q:OverRemittance1').disabled = false;
        d.getElementById('frm1602Q:OverRemittance2').disabled = false;
        d.getElementById('frm1602Q:OverRemittance3').disabled = false;

        //page 2

        d.getElementById('frm1602Q:txtSched1Amount1').disabled = false;
        d.getElementById('frm1602Q:txtSched1Amount2').disabled = false;
        d.getElementById('frm1602Q:txtSched1Amount3').disabled = false;
        d.getElementById('frm1602Q:txtSched1Amount4').disabled = false;
        d.getElementById('frm1602Q:txtSched1Amount5').disabled = false;
        d.getElementById('frm1602Q:txtSched1Amount6').disabled = false;
        d.getElementById('frm1602Q:txtSched1Amount7').disabled = false;
        d.getElementById('frm1602Q:txtSched1Amount8').disabled = false;
        d.getElementById('frm1602Q:txtSched1Amount9').disabled = false;
        d.getElementById('frm1602Q:txtSched1Amount10').disabled = false;
        d.getElementById('frm1602Q:txtSched1Amount11').disabled = false;
        d.getElementById('frm1602Q:txtSched1Amount12').disabled = false;
        d.getElementById('frm1602Q:txtSched1Amount13').disabled = false;
        d.getElementById('frm1602Q:txtSched1Rate13').disabled = false;
        d.getElementById('frm1602Q:txtSched1Amount14').disabled = false;
        d.getElementById('frm1602Q:txtSched1Rate14').disabled = false;
        d.getElementById('frm1602Q:txtSched1Amount15').disabled = false;
        d.getElementById('frm1602Q:txtSched2TreatyCode1').disabled = false;
        d.getElementById('frm1602Q:txtSched2ATC1').disabled = false;
        d.getElementById('frm1602Q:txtSched2Interest1').disabled = false;
        d.getElementById('frm1602Q:txtSched2TaxRate1').disabled = false;
        d.getElementById('frm1602Q:txtSched2TreatyCode2').disabled = false;
        d.getElementById('frm1602Q:txtSched2ATC2').disabled = false;
        d.getElementById('frm1602Q:txtSched2Interest2').disabled = false;
        d.getElementById('frm1602Q:txtSched2TaxRate2').disabled = false;
        d.getElementById('frm1602Q:txtSched3IPA1').disabled = false;
        d.getElementById('frm1602Q:txtSched3TotInterest1').disabled = false;
        d.getElementById('frm1602Q:txtSched3TaxRate1').disabled = false;
        d.getElementById('frm1602Q:txtSched3IPA2').disabled = false;
        d.getElementById('frm1602Q:txtSched3TotInterest2').disabled = false;
        d.getElementById('frm1602Q:txtSched3TaxRate2').disabled = false;


        d.getElementById('frm1602Q:cmdValidate').disabled = false;
        d.getElementById('btnSave').disabled = false;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1602Q:btnFinalCopy').disabled = true;
        d.getElementById('frm1602Q:cmdEdit').disabled = true;

        disableElem;
        enableElem;
    }

    function getRdo() {
        var data = "<select class='iceSelOneMnu' id='frm1602Q:txtRDOCode' name='frm1602Q:txtRDOCode' size='1' disabled='true' ><option value='000'> </option>";

        for (var i = 0; i < rdoList.length; i++) {
            var rdo = rdoList[i];
            data = data + "<option value='" + rdo.rdoCode + "'>" + rdo.description + "</option>";
        }
        data = data + "</select>"

        $('#rdoSelect').html(data);
    }

    function initialValidateBeforeSave() {
        if ((d.getElementById('frm1602Q:txtTIN1').value == "" || d.getElementById('frm1602Q:txtTIN2').value == "" || d.getElementById('frm1602Q:txtTIN3').value == "" || d.getElementById('frm1602Q:txtBranchCode').value == "")) {
            alert("Please enter a valid TIN number on Item 5.");
            return false;
        }
        
        if ((d.getElementById('frm1602Q:txtTaxpayerName').value == "")) {
            alert("Please enter a valid Withholding Agent's Name on Item 8.");
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

        $('#bg').hide(); //784
        $('.printSignFooterClass').css({ 'width': '94%', 'margin': 'auto', 'margin-top': '15px', 'display': 'block', 'position': 'relative', 'overflow': 'visible', 'page-break-before': 'avoid', 'background': '#ffffff' });
        $('.imgClass').css({ 'margin': 'auto', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });
       
        $('#label1').css({ 'display': 'none' });
        $('#label2').css({ 'display': 'none' });
        $('#formPaper').css({ 'max-width': '8.3in !important', 'border': '#000 3px solid !important' });
        $('#wrapper').css({ 'max-width': '8.3in !important' });
        $('#container').css({ 'max-width': '8.3in !important' });
        
        alert("This form must be printed on Legal Size Paper. Please update your Printer Settings (Set Paper Size to Legal under Preferences -> Advanced) to ensure the correct printout of the form.\n\n" +
            "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166, Enable Shrink-to-Fit must be unchecked, and all Headers & Footers must be set to empty.");

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
                if (elem[i].type == 'select-one') {
                    $(elem[i]).hide();
                    var label = "<div class='labels'>".concat(elem[i].options[elem[i].selectedIndex].innerHTML).concat("&nbsp;</div>");
                    $(elem[i]).after(label);
                }
            }
        }

        var activePage = document.getElementById('frm1602Q:txtCurrentPage').value;

        $('#Page1').show();
        $('#Page2').show();
        $('#Page3').show();

        $("#formPaper").css({ 'border': '1px solid #fff' });
        $("#Page1").css({ 'border': '3px solid #000' });
        $("#Page2").css({ 'margin-top': '80px', 'border': '3px solid #000' });
        $("#Page3").css({ 'margin-top': '80px', 'border': '3px solid #000' });

        $('.printButtonClass').hide();
        $("#formPaper").show();
        
        window.print();

        $('.printButtonClass').show();
        $("#Page"+activePage).css({ 'border': 'none' });
        $("#Page1").css({'border': '1px solid #fff' });
        $("#Page2").css({'border': '1px solid #fff' });
        $("#Page3").css({'border': '1px solid #fff' });

        if(activePage == "1"){
            $('#Page1').show();
            $('#Page2').hide();
            $('#Page3').hide();
        }else if(activePage == "2") {
            $('#Page1').hide();
            $('#Page2').show();
            $('#Page3').hide();
        }else{
            $('#Page1').hide();
            $('#Page2').hide();
            $('#Page3').show();
        }

        $('#printMenu').show('blind');
        if ($('#formMenu').css('display') != 'none') {
            $('#formMenu').hide('blind');
        }

        document.getElementById('frm1602Q:txtCurrentPage').disabled = false;
        document.getElementById('frm1602Q:txtCurrentPage').readOnly = false;
    }
    function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                console.log(form.serializeArray());
                var data = form.serialize();
                save('1602Qv2018',data);
                
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
        saveAndExit('1602Qv2018',data);
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

        submitAndSave('1602Qv2018', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1602Qv2018';
    } 
</script>
@endsection