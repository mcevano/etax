@extends('layouts.app')
@section('title', '| BIR Form No. 1701v2018')
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
        <button type="button" class="btn btn-danger btn-exit" id="1701v2018" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="1701v2018" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1701v2018' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 888px; ">
        <table border="0" width="800" cellspacing="0" cellpadding="0" align="center" style="background-repeat: repeat-x;">
        <tr><td>
                <div id="formPaper">
                    <div id="mainPages">
                        <!--Page 1-->
                        <div id="Page1Content">
                            <table width="800" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="300" valign="bottom">
                                        <p><img src="{{ asset('images/bcs_new.png') }}" width="80" /> </p>
                                    </td>
                                    <td>
                                        <img src="{{ asset('images/header_logo.png') }}" width="210" height="50px" />
                                    </td>
                                </tr>
                            </table>
                            <table width="800" border="1" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="120" valign="middle" style="text-align: center;">
                                        <label face="Arial" size="1px">BIR Form No.</label>
                                        <br/><font size="5px" style="font-weight:bold;">1701</font>
                                        <br/><label face="Arial" size="1px">January 2018 (ENCS)</label>
                                        <br/><label face="Arial" size="1px" style="font-weight:bold;">Page 1</label>
                                    </td>
                                    <td width="0" valign="center" style="text-align: center;">
                                        <font size="5px" style="font-weight:bold;">Annual Income Tax Return</font>
                                        <br/><font size="2px" style="font-weight:bold;">Individuals (including MIXED Income Earner), Estates and Trusts</font>
                                        <br><label face="Arial" size="1px">Enter all required information in CAPITAL LETTERS using BLACK ink. Mark all applicable boxes with an "X". Two copies MUST be filed with the BIR and one held by the Tax Filer.</label>
                                    </td>
                                    <td width="200" valign="center">
                                            <p><img src="{{ asset('images/Bar Codes/1701_p1.png') }}" width="220" height="75px" /> </p>
                                    </td>
                                </tr>
                            </table>
                            <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                <tr>
                                    <td class="tblFormTd" >
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">1</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">For the Year (YYYY) </font></td>
                                                <td>
                                                    <input type="text" value="" size="4" name="frm1701:txtPg1I1Year" maxlength="4" id="frm1701:txtPg1I1Year" onblur="blockletterWithout2Decimal(this);" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="tblFormTd" >
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">2</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Amended Return? </font></td>
                                                <td>
                                                    <input type="radio" value="Yes" name="frm1701:rdoPg1I2Amended" id="frm1701:rdoPg1I2AmendedYes" onclick="" /><label for="frm1701:rdoPg1I2AmendedYes" style="font-size:11px;" >Yes</label>
                                                </td>
                                                <td>
                                                    <input type="radio" value="No" name="frm1701:rdoPg1I2Amended" id="frm1701:rdoPg1I2AmendedNo" onclick="" checked /><label for="frm1701:rdoPg1I2AmendedNo" style="font-size:11px;" >No</label>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="tblFormTd" >
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">3</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Short Period Return? </font></td>
                                                <td>
                                                    <input type="radio" value="Yes" name="frm1701:rdoPg1I3ShortPeriod" id="frm1701:rdoPg1I3ShortPeriodYes" onclick="" /><label for="frm1701:rdoPg1I3ShortPeriodYes" style="font-size:11x;" >Yes</label>
                                                </td>
                                                <td>
                                                    <input type="radio" value="No" name="frm1701:rdoPg1I3ShortPeriod" id="frm1701:rdoPg1I3ShortPeriodNo" onclick="" checked /><label for="frm1701:rdoPg1I3ShortPeriodNo" style="font-size:11px;" >No</label>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!--Part 1-->
                            <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                <tr>
                                    <td colspan="2" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                        <div align="center"><font size="2" style="font-weight:bold;">PART I - BACKGROUND INFORMATION OF TAXPAYER/FILER </font></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tblFormTd" >
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">4</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Taxpayer Identification Number (TIN) </font></td>
                                                <td>
                                                    <input type="text" value="{{$company->tin1}}" size="3" name="frm1701:txtPg1I4TIN1" maxlength="3" id="frm1701:txtPg1I4TIN1" onkeypress="return wholenumber(this, event)" disabled />&nbsp;-&nbsp;
                                                    <input type="text" value="{{$company->tin2}}" size="3" name="frm1701:txtPg1I4TIN2" maxlength="3" id="frm1701:txtPg1I4TIN2" onkeypress="return wholenumber(this, event)" disabled />&nbsp;-&nbsp;
                                                    <input type="text" value="{{$company->tin3}}" size="3" name="frm1701:txtPg1I4TIN3" maxlength="3" id="frm1701:txtPg1I4TIN3" onkeypress="return wholenumber(this, event)" disabled />&nbsp;-&nbsp;
                                                    <input type="text" value="{{$company->tin4}}" size="5" name="frm1701:txtPg1I4BranchCode" maxlength="5" id="frm1701:txtPg1I4BranchCode" onkeypress="return letternumber(event)" disabled />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="250" class="tblFormTd" >
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">5</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">RDO Code </font></td>
                                                <td id="rdoSelect">
                                                        <select class='iceSelOneMnu' id='frm1701:txtPg1I5RDOCode' name='frm1701:txtPg1I5RDOCode' size='1' disabled >
                                                          <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                        </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tblFormTd" colspan="2">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">6</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Taxpayer Type </font></td>
                                                <td><input type="radio" value="SingleProprietor" name="frm1701:rdoPg1I6TaxpayerType" id="frm1701:rdoPg1I6TaxpayerTypeS" onclick="" /><label for="frm1701:rdoPg1I6TaxpayerTypeS" style="font-size:11px;" >Single Proprietor</label></td>
                                                <td><input type="radio" value="Professional" name="frm1701:rdoPg1I6TaxpayerType" id="frm1701:rdoPg1I6TaxpayerTypeP" onclick="" /><label for="frm1701:rdoPg1I6TaxpayerTypeP" style="font-size:11px;" >Professional</label></td>
                                                <td><input type="radio" value="Estate" name="frm1701:rdoPg1I6TaxpayerType" id="frm1701:rdoPg1I6TaxpayerTypeE" onclick="" /><label for="frm1701:rdoPg1I6TaxpayerTypeE" style="font-size:11px;" >Estate</label></td>
                                                <td><input type="radio" value="Trust" name="frm1701:rdoPg1I6TaxpayerType" id="frm1701:rdoPg1I6TaxpayerTypeT" onclick="" /><label for="frm1701:rdoPg1I6TaxpayerTypeT" style="font-size:11px;" >Trust</label></td>
                                                <td><input type="radio" value="CompensationEarner" name="frm1701:rdoPg1I6TaxpayerType" id="frm1701:rdoPg1I6TaxpayerTypeC" onclick="" /><label for="frm1701:rdoPg1I6TaxpayerTypeC" style="font-size:11px;" >Compensation Earner</label></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tblFormTd" colspan="2">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">7</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Alphanumeric Tax Code (ATC) </font></td>
                                                <td><input type="radio" value="II012" name="frm1701:rdoPg1I7ATC" id="frm1701:rdoPg1I7ATC_II012" onclick="" /><label for="frm1701:rdoPg1I7ATC_II012" style="font-size:10px;" >II012 Business Income-Graduated IT Rates</label></td>
                                                <td><input type="radio" value="II014" name="frm1701:rdoPg1I7ATC" id="frm1701:rdoPg1I7ATC_II014" onclick="" /><label for="frm1701:rdoPg1I7ATC_II014" style="font-size:10px;" >II014 Income from Profession-Graduated IT Rates</label></td>
                                                <td><input type="radio" value="II013" name="frm1701:rdoPg1I7ATC" id="frm1701:rdoPg1I7ATC_II013" onclick="" /><label for="frm1701:rdoPg1I7ATC_II013" style="font-size:10px;" >II013 Mixed Income-Graduated IT Rates</label></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td><input type="radio" value="II011" name="frm1701:rdoPg1I7ATC" id="frm1701:rdoPg1I7ATC_II011" onclick="" /><label for="frm1701:rdoPg1I7ATC_II011" style="font-size:10px;" >II011 Compensation Income</label></td>
                                                <td><input type="radio" value="II015" name="frm1701:rdoPg1I7ATC" id="frm1701:rdoPg1I7ATC_II015" onclick="" /><label for="frm1701:rdoPg1I7ATC_II015" style="font-size:10px;" >II015 Business Income-8% IT Rate</label></td>
                                                <td><input type="radio" value="II017" name="frm1701:rdoPg1I7ATC" id="frm1701:rdoPg1I7ATC_II017" onclick="" /><label for="frm1701:rdoPg1I7ATC_II017" style="font-size:10px;" >II017 Income from Profession-8% IT Rate</label></td>
                                                <td><input type="radio" value="II016" name="frm1701:rdoPg1I7ATC" id="frm1701:rdoPg1I7ATC_II016" onclick="" /><label for="frm1701:rdoPg1I7ATC_II016" style="font-size:10px;" >II016 Mixed Income-8% IT Rate</label></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tblFormTd" colspan="2">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">8</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Taxpayer's Name (Last Name, First Name, Middle Name)/ESTATE OF (First Name, Middle Name, Last Name)/TRUST FAO: (First Name, Middle Name, Last Name) </font></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td><input type="text" value="{{$company->registered_name}}" size="120" name="frm1701:txtPg1I8TaxpayerName" maxlength="50" id="frm1701:txtPg1I8TaxpayerName" onblur="return capital(this, event)" disabled /></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tblFormTd" colspan="2">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">9</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Registered Address </font><font style="font-size: 10px;"> (Indicate complete address. If the registered address is different from the current address, got to the RDO to update registered address by using BIR Form No. 1905) </font></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td><input type="text" value="{{$company->address}}" size="120" name="frm1701:txtPg1I9Address" maxlength="100" id="frm1701:txtPg1I9Address" onblur="return capital(this, event)" disabled /></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tblFormTd">
                                        <table>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td><input type="text" value="" size="80" name="frm1701:txtPg1I9Address2" maxlength="100" id="frm1701:txtPg1I9Address2" onblur="return capital(this, event)" disabled /></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="tblFormTd">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">9A</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">ZIP Code </font></td>
                                                <td><input type="text" value="{{$company->zip_code}}" size="2" name="frm1701:txtPg1I9AZipCode" maxlength="12" id="frm1701:txtPg1I9AZipCode" onkeypress="return wholenumber(this, event)" disabled /></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                <tr>
                                    <td class="tblFormTd">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">10</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Date of Birth (MM/DD/YYYY) </font></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td><input type="text" value="" size="20" name="frm1701:txtPg1I10BirthDate" id="frm1701:txtPg1I10BirthDate" maxlength="10" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="" /></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="tblFormTd">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">11</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Email Address </font></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td><input type="text" value="{{$company->email_address}}" size="90" name="txtEmail" maxlength="60" id="txtEmail" disabled /></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                <tr>
                                    <td class="tblFormTd">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">12</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Citizenship </font></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td><input type="text" value="" name="frm1701:txtPg1I12Citizenship" maxlength="20" id="frm1701:txtPg1I12Citizenship"  maxlength="20" onkeypress="" onblur="return capital(this, event)" /></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="tblFormTd">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">13</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Claiming Foreign Tax Credits? </font></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <input type="radio" value="Yes" name="frm1701:rdoPg1I13ForeignTaxCredits" id="frm1701:rdoPg1I13ForeignTaxCreditsYes" onclick="" /><label for="frm1701:rdoPg1I13ForeignTaxCreditsYes" style="font-size:11px;" >Yes</label>
                                                    <input type="radio" value="No" name="frm1701:rdoPg1I13ForeignTaxCredits" id="frm1701:rdoPg1I13ForeignTaxCreditsNo" onclick="" checked /><label for="frm1701:rdoPg1I13ForeignTaxCreditsNo" style="font-size:11px;" >No</label>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="tblFormTd">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">14</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Foreign Tax Number, if applicable </font></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <input type="text" value="" name="frm1701:txtPg1I14ForeignTaxNumber" id="frm1701:txtPg1I14ForeignTaxNumber" maxlength="20" onkeypress="return letternumber(event)" onblur="" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                <tr>
                                    <td class="tblFormTd">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">15</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Contact Number (Landline/Cellphone No.) </font></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td><input type="text" value="{{$company->tel_number}}" size="20" name="frm1701:txtPg1I15TelNum" maxlength="20" id="frm1701:txtPg1I15TelNum" onkeypress="return wholenumber(this, event)" disabled/></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="tblFormTd">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">16</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Civil Status (if applicable) </font></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <input type="radio" value="Single" name="frm1701:rdoPg1I16CivilStatus" id="frm1701:rdoPg1I16CivilStatusS" onclick="" /><label for="frm1701:rdoPg1I16CivilStatusS" style="font-size:11px;" >Single</label>
                                                    <input type="radio" value="Married" name="frm1701:rdoPg1I16CivilStatus" id="frm1701:rdoPg1I16CivilStatusM" onclick="" /><label for="frm1701:rdoPg1I16CivilStatusM" style="font-size:11px;" >Married</label>
                                                    <input type="radio" value="LegallySeparated" name="frm1701:rdoPg1I16CivilStatus" id="frm1701:rdoPg1I16CivilStatusLS" onclick="" /><label for="frm1701:rdoPg1I16CivilStatusLS" style="font-size:11px;" >Legally Separated</label>
                                                    <input type="radio" value="Widow" name="frm1701:rdoPg1I16CivilStatus" id="frm1701:rdoPg1I16CivilStatusW" onclick="" /><label for="frm1701:rdoPg1I16CivilStatusW" style="font-size:11px;" >Widow/er</label>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                <tr>
                                    <td class="tblFormTd">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">17</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">If married, spouse has income? </font></td>
                                                <td><input type="radio" value="Yes" name="frm1701:rdoPg1I17SpouseIncome" id="frm1701:rdoPg1I17SpouseIncomeYes" onclick="" /><label for="frm1701:rdoPg1I17SpouseIncomeYes" style="font-size:11px;" >Yes</label></td>
                                                <td><input type="radio" value="No" name="frm1701:rdoPg1I17SpouseIncome" id="frm1701:rdoPg1I17SpouseIncomeNo" onclick="" checked /><label for="frm1701:rdoPg1I17SpouseIncomeNo" style="font-size:11px;" >No</label></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="tblFormTd">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">18</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Filling Status </font></td>
                                                <td><input type="radio" value="Joint" name="frm1701:rdoPg1I18FilingStatus" id="frm1701:rdoPg1I18FilingStatusJ" onclick="" /><label for="frm1701:rdoPg1I18FilingStatusJ" style="font-size:11px;" >Joint Filing</label></td>
                                                <td><input type="radio" value="Separate" name="frm1701:rdoPg1I18FilingStatus" id="frm1701:rdoPg1I18FilingStatusS" onclick="" /><label for="frm1701:rdoPg1I18FilingStatusS" style="font-size:11px;" >Separate Filing</label></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                <tr>
                                    <td class="tblFormTd">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">19</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Income <span style="font-weight: bold;"> EXEMPT</span> from Income Tax? </font></td>
                                                <td><input type="radio" value="Yes" name="frm1701:rdoPg1I19IncomeExempt" id="frm1701:rdoPg1I19IncomeExemptYes" onclick="verifyAddAttachment(true,this,true,'TAX FILER');" /><label for="frm1701:rdoPg1I19IncomeExemptYes" style="font-size:11px;" >Yes</label></td>
                                                <td><input type="radio" value="No" name="frm1701:rdoPg1I19IncomeExempt" id="frm1701:rdoPg1I19IncomeExemptNo" onclick="verifyAddAttachment(false,this,true,'TAX FILER');" /><label for="frm1701:rdoPg1I19IncomeExemptNo" style="font-size:11px;" >No</label></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td colspan="3"><font size="1" style="font-weight: bold;">[If yes, fill out also consolidation of ALL activities per Tax Regime (Part X)] </font></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="tblFormTd">
                                        <table>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">20</font></td>
                                                <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Income subject to <span style="font-weight: bold;"> SPECIAL/PREFERENTIAL RATE</span>? </font></td>
                                                <td><input type="radio" value="Yes" name="frm1701:rdoPg1I20IncomeSpecial" id="frm1701:rdoPg1I20IncomeSpecialYes" onclick="verifyAddAttachment(true,this,false,'TAX FILER');" /><label for="frm1701:rdoPg1I20IncomeSpecialYes" style="font-size:11px;" >Yes</label></td>
                                                <td><input type="radio" value="No" name="frm1701:rdoPg1I20IncomeSpecial" id="frm1701:rdoPg1I20IncomeSpecialNo" onclick="verifyAddAttachment(false,this,false,'TAX FILER');" /><label for="frm1701:rdoPg1I20IncomeSpecialNo" style="font-size:11px;" >No</label></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td colspan="3"><font size="1" style="font-weight: bold;">[If yes, fill out also consolidation of ALL activities per Tax Regime (Part X)] </font></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                <tr>
                                    <td class="tblFormTd">
                                        <table>
                                            <tr>
                                                <td width="80" rowspan="2">
                                                        <font size="2" style="font-weight:bold;">21</font>
                                                        <label size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Rate*<br/> (choose one)</label>
                                                </td>
                                                <td width="720">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="250">
                                                                <input type="radio" value="Graduated"  name="frm1701:rdoPg1I21TaxRate" id="frm1701:rdoPg1I21TaxRateG" onclick="" />
                                                                <label for="frm1701:rdoPg1I21TaxRateG" style="font-size:11px;" >Graduated Rates<br/> (Choose Method of Deduction in Item 21A)</label>
                                                            </td>
                                                            <td  width="470" valign="top" style="border-bottom: #AAAAAA 1px solid; border-left: #AAAAAA 1px solid;">
                                                                <table>
                                                                    <tr>
                                                                        <td width="11"><font size="2" style="font-weight:bold;">21A</font></td>
                                                                        <td width="459" colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Method of Deduction (choose one) </font></td>
                                                                    </tr>
                                                                    <tr valign="top">
                                                                        <td>&nbsp;</td>
                                                                        <td width="134">
                                                                            <input type="radio" value="Itemized"  name="frm1701:rdoPg1I21AMethodDeduction" id="frm1701:rdoPg1I21AMethodDeductionI" onclick="" />
                                                                            <label for="frm1701:rdoPg1I21AMethodDeductionI" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Itemized Deduction<br/> [Sec. 34(A-J), NIRC]</label>
                                                                        </td>
                                                                        <td width="325">
                                                                            <input type="radio" value="OSD"  name="frm1701:rdoPg1I21AMethodDeduction" id="frm1701:rdoPg1I21AMethodDeductionO" onclick="" />
                                                                            <label for="frm1701:rdoPg1I21AMethodDeductionO" style="font-size:11px;" >Optional Standard Deduction (OSD) <br/> [40% of Gross Sales/Receipts/Revenues/Fees [Sec. 34(L), NIRC]]</label>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="720">
                                                        <input type="radio" value="Percentage"  name="frm1701:rdoPg1I21TaxRate" id="frm1701:rdoPg1I21TaxRateP" onclick="" />
                                                        <label for="frm1701:rdoPg1I21TaxRateP" style="font-size:11px;" >8%  in lieu of Graduated Rates under Sec. 24(A) & Percentage Tax under Sec. 116 of NIRC 
                                                            <br/> [available if gross sales/receipts and other non-operating income do not exceed Three million pesos (P3M)]</label>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!--Part 2-->
                            <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                <tr>
                                    <td colspan="3" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                        <div align="center">
                                            <font size="2" style="font-weight:bold;">PART II - TOTAL TAX PAYABLE </font>
                                            <font style="font-size:11px;">(Do NOT Enter Centavos; 49 Centavos or Less drop down; 50 or more round up) </font>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="400" class="tblFormTd" align="center"><font size="2" style="font-weight:bold;">Particular </font></td>
                                    <td width="200" class="tblFormTd" align="center"><font size="2" style="font-weight:bold;">A. Taxpayer/Filer </font></td>
                                    <td width="200" class="tblFormTd" align="center"><font size="2" style="font-weight:bold;">B. Spouse</font></td>
                                </tr>
                                <tr>
                                    <td class="tblFormTd" colspan="3">
                                        <table>
                                            <tr>
                                                <td width="11"><font size="2" style="font-weight:bold;">22</font></td>
                                                <td width="389">
                                                    <font size="1" style="font-weight:bold;font-size: 11px;">Tax Due </font>
                                                    <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">(From Part VI Item 5)</font>
                                                </td>
                                                <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I22ATaxDue" id="frm1701:txtPg1I22ATaxDue" disabled /></td>
                                                <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I22BTaxDue" id="frm1701:txtPg1I22BTaxDue" disabled /></td>
                                            </tr>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">23</font></td>
                                                <td>
                                                        <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Total Tax Credits/Payments (From Part VII Item 10)</font>
                                                </td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I23A" id="frm1701:txtPg1I23A" disabled /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I23B" id="frm1701:txtPg1I23B" disabled /></td>
                                            </tr>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;">24</font></td>
                                                <td>
                                                    <font size="1" style="font-weight:bold;font-size: 11px;">Tax Payable/(Overpayment) </font>
                                                    <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">(Item 22 Less Item 23)</font>
                                                </td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I24ATaxPayable" id="frm1701:txtPg1I24ATaxPayable" disabled /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I24BTaxPayable" id="frm1701:txtPg1I24BTaxPayable" disabled /></td>
                                            </tr>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;" >25</font></td>
                                                <td>
                                                    <label size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Portion of Tax Payable Allowed for 2nd Installment to be paid on or before October 15 (50% or less of Item 22)</label>
                                                </td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I25A" id="frm1701:txtPg1I25A" onblur="round(this,2);computeTxtPg1I26('taxpayer');" onkeypress="return wholenumber(this, event)" /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I25B" id="frm1701:txtPg1I25B" onblur="round(this,2);computeTxtPg1I26('spouse');" onkeypress="return wholenumber(this, event)" /></td>
                                            </tr>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;" >26</font></td>
                                                <td>
                                                    <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Amount of Tax payable/(Overpayment) (Item 24 Less Item 25)</font>
                                                </td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I26A" id="frm1701:txtPg1I26A" disabled /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I26B" id="frm1701:txtPg1I26B" disabled /></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td width="100">
                                                                <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Add: Penalties </font>
                                                            </td>
                                                            <td>
                                                                <font size="2" style="font-weight:bold;">27&nbsp;</font>
                                                                <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Interest </font>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I27A" id="frm1701:txtPg1I27A" onblur="round(this,2);computeTxtPg1I30('taxpayer');" onkeypress="return wholenumber(this, event)" /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I27B" id="frm1701:txtPg1I27B" onblur="round(this,2);computeTxtPg1I30('spouse');" onkeypress="return wholenumber(this, event)" /></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td width="100">&nbsp;</td>
                                                            <td>
                                                                <font size="2" style="font-weight:bold;">28&nbsp;</font>
                                                                <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Surcharge </font>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I28A" id="frm1701:txtPg1I28A" onblur="round(this,2);computeTxtPg1I30('taxpayer');" onkeypress="return wholenumber(this, event)" /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I28B" id="frm1701:txtPg1I28B" onblur="round(this,2);computeTxtPg1I30('spouse');" onkeypress="return wholenumber(this, event)" /></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td width="100">&nbsp;</td>
                                                            <td>
                                                                <font size="2" style="font-weight:bold;">29&nbsp;</font>
                                                                <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Compromise </font>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I29A" id="frm1701:txtPg1I29A" onblur="round(this,2);computeTxtPg1I30('taxpayer');" onkeypress="return wholenumber(this, event)" /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I29B" id="frm1701:txtPg1I29B" onblur="round(this,2);computeTxtPg1I30('spouse');" onkeypress="return wholenumber(this, event)" /></td>
                                            </tr>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;" >30</font></td>
                                                <td>
                                                    <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Penalties (Sum of Items 27 to 29) </font>
                                                </td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I30A" id="frm1701:txtPg1I30A" disabled /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I30B" id="frm1701:txtPg1I30B" disabled /></td>
                                            </tr>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;" >31</font></td>
                                                <td>
                                                    <font size="1" style="font-weight:bold;font-size: 11px;" >Total Amount Payable/(Overpayment) </font>
                                                    <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">(Sum of Items 26 and 30) </font>
                                                </td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I31ATotalAmtPyble" id="frm1701:txtPg1I31ATotalAmtPyble" disabled /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I31BTotalAmtPyble" id="frm1701:txtPg1I31BTotalAmtPyble" disabled /></td>
                                            </tr>
                                            <tr>
                                                <td><font size="2" style="font-weight:bold;" >32</font></td>
                                                <td>
                                                    <font size="1" style="font-weight:bold;font-size: 11px;" >Aggregate Amount Payable/(Overpayment) </font>
                                                    <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">(Sum of Items 26 and 30)</font>
                                                </td>
                                                <td align="center" colspan="2"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg1I32AggregateAmtPyble" id="frm1701:txtPg1I32AggregateAmtPyble" disabled /></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="tblFormTd">
                                        <table>
                                            <tr>
                                                <td colspan="3"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">If overpayment, mark one (1) box only. (Once the choice is made, the same is irrevocable) </font></td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" value="Refund" name="frm1701:rdoPg1Overpayment" id="frm1701:rdoPg1OverpaymentRefund" onclick="" /><label for="frm1701:rdoPg1OverpaymentRefund" style="font-size:11px;" >To be refunded </label></td>
                                                <td><input type="radio" value="TCC" name="frm1701:rdoPg1Overpayment" id="frm1701:rdoPg1OverpaymentTCC" onclick="" /><label for="frm1701:rdoPg1OverpaymentTCC" style="font-size:11px;" >To be issued a Tax Credit Certificate (TCC) </label></td>
                                                <td><input type="radio" value="CarryOver" name="frm1701:rdoPg1Overpayment" id="frm1701:rdoPg1OverpaymentCarryOver" onclick="" /><label for="frm1701:rdoPg1OverpaymentCarryOver" style="font-size:11px;" >To be carried over as a tax credit for next year/quarter </label></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="tblFormTd">
                                        <table border="1" cellspacing="0" cellpadding="0" style="font-family:arial; font-size:10px; text-align: center; vertical-align: top; table-layout: fixed;">
                                            <col width="70%" />
                                            <col width="30%" />
                                            <tr>
                                                <td colspan="2" style="text-align: left; ">&nbsp;&nbsp;&nbsp;&nbsp;I declare under the penalties of perjury that this return, and all its attachments, have been made in good faith, verified by me, and to the best of my knowledge and belief, are 
                                                    true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof. Further, I give my consent to the processing of my information as contemplated under the *Data Privacy Act of 2012 (R.A. No. 10173) 
                                                    for legitimate and lawful purposes. (If signed by an Authorized Representative, indicate TIN and attach authorization letter)<br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center; background-color: white;">
                                                    <br><br><br>_____________________________________________________________
                                                    <br>Printed Name and Signature of Taxpayer/Authorized Representative
                                                </td>
                                                <td  class="tblFormTd">
                                                    <div align="center">
                                                        <font size="2" style="font-weight:bold;">33</font>&nbsp;
                                                        <font size="1" face="Arial, Helvetica, sans-serif">Number of Attachments </font>
                                                        <input type="text" value="00" style="text-align: right;" size="1" maxlength="2" name="frm1701:txtPg1I33NumberOfAttachments" id="frm1701:txtPg1I33NumberOfAttachments" onkeypress="return wholenumber(this, event)" />
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!--Part 3-->
                            <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                <tr>
                                    <td colspan="5" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                        <div align="center">
                                            <font size="2" style="font-weight:bold;">PART III - DETAILS OF PAYMENT </font>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%"><div align="center"><font size="1" style="font-weight:bold;">Particulars </font></div></td>
                                    <td width="15%"><div align="center"><font size="1" style="font-weight:bold;">Drawee Bank/Agency </font></div></td>
                                    <td width="20%"><div align="center"><font size="1" style="font-weight:bold;">Number </font></div></td>
                                    <td width="20%"><div align="center"><font size="1" style="font-weight:bold;">Date (MM/DD/YYYY) </font></div></td>
                                    <td width="25%"><div align="center"><font size="1" style="font-weight:bold;">Amount </font></div></td>
                                </tr>
                                <tr>
                                    <td><font size="2" style="font-weight:bold;">&nbsp;34&nbsp;&nbsp;&nbsp;</font><font size="1">Cash/Bank Debit Memo </font></td>
                                    <td align="center"><input type="text" value="" size="20" maxlength="50" id="frm1701:txtPg1I34Agency" disabled /></td>
                                    <td align="center"><input type="text" value="" size="20" maxlength="50" id="frm1701:txtPg1I34Number" disabled /></td>
                                    <td align="center"><input type="text" value="" size="20" maxlength="10" id="frm1701:txtPg1I34Date" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled /></td>
                                    <td align="center"><input type="text" value="" style="text-align: right" size="20" maxlength="50" id="frm1701:txtPg1I34Amount" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled /></td>
                                </tr>
                                <tr>
                                    <td><font size="2" style="font-weight:bold;">&nbsp;35&nbsp;&nbsp;&nbsp;</font><font size="1">Check </font></td>
                                    <td align="center"><input type="text" value="" size="20" maxlength="50" id="frm1701:txtPg1I35Agency" disabled /></td>
                                    <td align="center"><input type="text" value="" size="20" maxlength="50" id="frm1701:txtPg1I235Number" disabled /></td>
                                    <td align="center"><input type="text" value="" size="20" maxlength="10" id="frm1701:txtPg1I35Date" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled /></td>
                                    <td align="center"><input type="text" value="" style="text-align: right" size="20" maxlength="50" id="frm1701:txtPg1I35Amount" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled /></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><font size="2" style="font-weight:bold;">&nbsp;36&nbsp;&nbsp;&nbsp;</font><font size="1">Tax Debit Memo </font></td>
                                    <td align="center"><input type="text" value="" size="20" maxlength="50" id="frm1701:txtPg1I36Number" disabled /></td>
                                    <td align="center"><input type="text" value="" size="20" maxlength="10" id="frm1701:txtPg1I36Date" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled /></td>
                                    <td align="center"><input type="text" value="" style="text-align: right" size="20" maxlength="50" id="frm1701:txtPg1I36Amount" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled /></td>
                                </tr>
                                <tr>
                                    <td colspan="5"><font size="2" style="font-weight:bold;">&nbsp;37&nbsp;&nbsp;&nbsp;</font><font size="1">Others (specify below) </font></td>
                                </tr>
                                <tr>
                                    <td><input type="text" value="" size="20" maxlength="50" id="frm1701:txtPg1I37Particular" disabled /></td>
                                    <td align="center"><input type="text" value="" size="20" maxlength="50" id="frm1701:txtPg1I37Agency" disabled /></td>
                                    <td align="center"><input type="text" value="" size="20" maxlength="50" id="frm1701:txtPg1I37Number" disabled /></td>
                                    <td align="center"><input type="text" value="" size="20" maxlength="10" id="frm1701:txtPg1I37Date" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled /></td>
                                    <td align="center"><input type="text" value="" style="text-align: right" size="20" maxlength="50" id="frm1701:txtPg1I37Amount" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled /></td>
                                </tr>
                            </table>
                            <table border="1" cellspacing="0" cellpadding="0" style="font-size:10px; text-align: left; vertical-align: top;">
                                <tr>
                                    <td width="57%" style="background-color: white;">Machine Validation/Revenue Official Receipt Details (If not filed with an Authorized Agent Bank)<br /><br /><br /><br /><br /></td>
                                    <td width="43%" style="background-color: white;">Stamp of Receiving Office/AAB and Date of Receipt<br/> (RO's Signature/Bank Teller's Initial)<br /><br /><br /><br /><br /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: left; font-family:arial; font-size:10px;">NOTE: *The BIR Data Privacy Policy is in the BIR website (www.bir.gov.ph) <br></td> 
                                </tr>
                            </table>
                        </div>
                        <!--Page 2-->
                        <div id="Page2Content" style="display:none;">
                            <table width="800" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <table width="800" border="1" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="120" valign="middle" style="text-align: center;">
                                                    <font face="Arial" size="1px">BIR Form No.</font>
                                                    <br/><font size="5px" style="font-weight:bold;">1701</font>
                                                    <br/><font face="Arial" size="1px">January 2018 (ENCS)</font>
                                                    <br/><font face="Arial" size="1px" style="font-weight:bold;">Page 2</font>
                                                </td>
                                                <td width="0" valign="center" style="text-align: center;">
                                                    <font size="5px" style="font-weight:bold;">Annual Income Tax Return</font>
                                                    <br/><font size="2px" style="font-weight:bold;">Individuals (including MIXED Income Earner), Estates and Trusts</font>
                                                </td>
                                                <td width="200" valign="center">
                                                        <p><img src="{{ asset('images/Bar Codes/1701_p1.png') }}" width="220" height="75px" /> </p>
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
                                                <td width="60%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Taxpayer/Filer's Last Name</font></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <font size="2" face="Arial">
                                                        <input type="text" value="{{$company->tin1}}" size="3" name="frm1701:txtPg2TIN1" maxlength="3" id="frm1701:txtPg2TIN1" disabled />
                                                        <input type="text" value="{{$company->tin2}}" size="3" name="frm1701:txtPg2TIN2" maxlength="3" id="frm1701:txtPg2TIN2" disabled />
                                                        <input type="text" value="{{$company->tin3}}" size="3" name="frm1701:txtPg2TIN3" maxlength="3" id="frm1701:txtPg2TIN3" disabled />
                                                        <input type="text" value="{{$company->tin4}}" size="5" name="frm1701:txtPg2BranchCode" maxlength="5" id="frm1701:txtPg2BranchCode" disabled />
                                                    </font>
                                                </td>
                                                <?php 
                                                    $lastname = explode(",", $company['registered_name'])
                                                ?>
                                                <td><input type="text" value="{{$lastname[0]}}" size="80" name="frm1701:txtPg2TaxpayerName" maxlength="50" id="frm1701:txtPg2TaxpayerName" disabled /></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <!-- Part 4 Spouse background info -->
                                <tr>
                                    <td>
                                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="2" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                    <div align="center"><font size="2" style="font-weight:bold;">PART IV - Background Information of Spouse </font></div>
                                                </td>
                                            </tr>
                                            <!-- Spouse Item 1 & 2 -->
                                            <tr>
                                                <td class="tblFormTd" >
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">1</font></td>
                                                            <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Spouse's Taxpayer Identification Number (TIN) </font></td>
                                                            <td>
                                                                <input type="text" value="" size="3" name="frm1701:txtPg2I1TIN1" maxlength="3" id="frm1701:txtPg2I1TIN1" onkeypress="return wholenumber(this, event)" />&nbsp;-&nbsp;
                                                                <input type="text" value="" size="3" name="frm1701:txtPg2I1TIN2" maxlength="3" id="frm1701:txtPg2I1TIN2" onkeypress="return wholenumber(this, event)"  />&nbsp;-&nbsp;
                                                                <input type="text" value="" size="3" name="frm1701:txtPg2I1TIN3" maxlength="3" id="frm1701:txtPg2I1TIN3" onkeypress="return wholenumber(this, event)"  />&nbsp;-&nbsp;
                                                                <input type="text" value="" size="5" name="frm1701:txtPg2I1BranchCode" maxlength="5" id="frm1701:txtPg2I1BranchCode" onkeypress="return letternumber(event)"  />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="250" class="tblFormTd" >
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">2</font></td>
                                                            <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">RDO Code </font></td>
                                                            <td id="rdoSelect2">
                                                                    
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!-- Spouse Item 3 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="2">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">3</font></td>
                                                            <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Filer's Spouse Type </font></td>
                                                            <td><input type="radio" value="SingleProprietor" name="frm1701:rdoPg2I3SpouseType" id="frm1701:rdoPg2I3SpouseTypeS" onclick="" /><label for="frm1701:rdoPg2I3SpouseTypeS" style="font-size:11px;" >Single Proprietor</label></td>
                                                            <td><input type="radio" value="Professional" name="frm1701:rdoPg2I3SpouseType" id="frm1701:rdoPg2I3SpouseTypeP" onclick="" /><label for="frm1701:rdoPg2I3SpouseTypeP" style="font-size:11px;" >Professional</label></td>
                                                            <td><input type="radio" value="CompensationEarner" name="frm1701:rdoPg2I3SpouseType" id="frm1701:rdoPg2I3SpouseTypeC" onclick="" /><label for="frm1701:rdoPg2I3SpouseTypeC" style="font-size:11px;" >Compensation Earner</label></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!-- Spouse Item 4 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="2">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">4</font></td>
                                                            <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Alphanumeric Tax Code (ATC) </font></td>
                                                            <td><input type="radio" value="II012" name="frm1701:rdoPg2I4ATC" id="frm1701:rdoPg2I4ATC_II012" onclick="" /><label for="frm1701:rdoPg2I4ATC_II012" style="font-size:11px;" >II012 Business Income-Graduated IT Rates</label></td>
                                                            <td><input type="radio" value="II014" name="frm1701:rdoPg2I4ATC" id="frm1701:rdoPg2I4ATC_II014" onclick="" /><label for="frm1701:rdoPg2I4ATC_II014" style="font-size:11px;" >II014 Income from Profession-Graduated IT Rates</label></td>
                                                            <td><input type="radio" value="II013" name="frm1701:rdoPg2I4ATC" id="frm1701:rdoPg2I4ATC_II013" onclick="" /><label for="frm1701:rdoPg2I4ATC_II013" style="font-size:11px;" >II013 Mixed Income-Graduated IT Rates</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td><input type="radio" value="II011" name="frm1701:rdoPg2I4ATC" id="frm1701:rdoPg2I4ATC_II011" onclick="" /><label for="frm1701:rdoPg2I4ATC_II011" style="font-size:11px;" >II011 Compensation Income</label></td>
                                                            <td><input type="radio" value="II015" name="frm1701:rdoPg2I4ATC" id="frm1701:rdoPg2I4ATC_II015" onclick="" /><label for="frm1701:rdoPg2I4ATC_II015" style="font-size:11px;" >II015 Business Income-8% IT Rate</label></td>
                                                            <td><input type="radio" value="II017" name="frm1701:rdoPg2I4ATC" id="frm1701:rdoPg2I4ATC_II017" onclick="" /><label for="frm1701:rdoPg2I4ATC_II017" style="font-size:11px;" >II017 Income from Profession-8% IT Rate</label></td>
                                                            <td><input type="radio" value="II016" name="frm1701:rdoPg2I4ATC" id="frm1701:rdoPg2I4ATC_II016" onclick="" /><label for="frm1701:rdoPg2I4ATC_II016" style="font-size:11px;" >II016 Mixed Income-8% IT Rate</label></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!-- Spouse Item 5 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="2">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">5</font></td>
                                                            <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Spouse's Name <i>(Last Name, First Name, Middle Name)</i> </font></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td><input type="text" value="" size="120" name="frm1701:txtPg2I5SpouseName" maxlength="50" id="frm1701:txtPg2I5SpouseName" onblur="return capital(this, event)" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>                                          
                                        </table>
                                        <!-- Spouse Item 6 and 7 -->
                                        <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td class="tblFormTd">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">6</font></td>
                                                            <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Contact Number</font></td>
                                                            <td><input type="text" value="" name="frm1701:txtPg2I6TelNum" maxlength="20" id="frm1701:txtPg2I6TelNum" onkeypress="return wholenumber(this, event)" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="tblFormTd">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">7</font></td>
                                                            <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Citizenship</font></td>
                                                            <td><input type="text" value="" name="frm1701:txtPg2I7Citizenship" maxlength="20" id="frm1701:txtPg2I7Citizenship" onkeypress="" onblur="return capital(this, event)" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- Spouse Item 8 and 9 -->
                                        <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td class="tblFormTd">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">8</font></td>
                                                            <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Claiming Foreign Tax Credits?</font></td>
                                                            <td>&nbsp;</td>
                                                            <td>
                                                                <input type="radio" value="Yes" name="frm1701:rdoPg2I8ForeignTaxCredits" id="frm1701:rdoPg2I8ForeignTaxCreditsYes" onclick="" /><label for="frm1701:rdoPg2I8ForeignTaxCreditsYes" style="font-size:11px;" >Yes</label>
                                                                <input type="radio" value="No" name="frm1701:rdoPg2I8ForeignTaxCredits" id="frm1701:rdoPg2I8ForeignTaxCreditsNo" onclick="" /><label for="frm1701:rdoPg2I8ForeignTaxCreditsNo" style="font-size:11px;" >No</label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="tblFormTd">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">9</font></td>
                                                            <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Foreign tax number <i>(if applicable)</i></font></td>
                                                            <td>&nbsp;</td>
                                                            <td>
                                                                <input type="text" value="" id="frm1701:txtPg2I9ForeignTaxNumber" name="frm1701:txtPg2I9ForeignTaxNumber" maxlength="20" onkeypress="return letternumber(event)" onblur="" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- Spouse item 10 and 11-->
                                        <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td class="tblFormTd">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">10</font></td>
                                                            <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Income <span style="font-weight: bold;"> EXEMPT</span> from Income Tax? </font></td>
                                                            <td><input type="radio" value="Yes" name="frm1701:rdoPg2I10IncomeExempt" id="frm1701:rdoPg2I10IncomeExemptYes" onclick="verifyAddAttachment(true,this,true,'SPOUSE');" /><label for="frm1701:rdoPg2I10IncomeExemptYes" style="font-size:11px;" >Yes</label></td>
                                                            <td><input type="radio" value="No" name="frm1701:rdoPg2I10IncomeExempt" id="frm1701:rdoPg2I10IncomeExemptNo" onclick="verifyAddAttachment(false,this,true,'SPOUSE');" /><label for="frm1701:rdoPg2I10IncomeExemptNo" style="font-size:11px;" >No</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td colspan="3"><font size="1" style="font-weight: bold;font-size: 11px;">[If yes, fill out also consolidation of ALL activities per Tax Regime (Part X)] </font></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="tblFormTd">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">11</font></td>
                                                            <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Income subject to <span style="font-weight: bold;"> SPECIAL/PREFERENTIAL RATE</span>? </font></td>
                                                            <td><input type="radio" value="Yes" name="frm1701:rdoPg2I11IncomeSpecial" id="frm1701:rdoPg2I11IncomeSpecialYes" onclick="verifyAddAttachment(true,this,false,'SPOUSE');" /><label for="frm1701:rdoPg2I11IncomeSpecialYes" style="font-size:10px;" >Yes</label></td>
                                                            <td><input type="radio" value="No" name="frm1701:rdoPg2I11IncomeSpecial" id="frm1701:rdoPg2I11IncomeSpecialNo" onclick="verifyAddAttachment(false,this,false,'SPOUSE');" /><label for="frm1701:rdoPg2I11IncomeSpecialNo" style="font-size:10px;" >No</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td colspan="3"><font size="1" style="font-weight: bold;font-size: 11px;">[If yes, fill out also consolidation of ALL activities per Tax Regime (Part X)] </font></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- Spouse item 12 and 12A -->
                                        <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td class="tblFormTd">
                                                    <table>
                                                        <tr>
                                                            <td width="80" rowspan="2">
                                                                    <font size="2" style="font-weight:bold;">12</font>
                                                                    <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Rate*<br/> (choose one)</font>
                                                            </td>
                                                            <td width="720">
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td width="250">
                                                                            <input type="radio" value="Graduated"  name="frm1701:rdoPg2I12TaxRate" id="frm1701:rdoPg2I12TaxRateG" onclick="" />
                                                                            <label for="frm1701:rdoPg2I12TaxRateG" style="font-size:11px;" >Graduated Rates<br/> (Choose Method of Deduction in Item 21A)</label>
                                                                        </td>
                                                                        <td  width="470" valign="top" style="border-bottom: #AAAAAA 1px solid; border-left: #AAAAAA 1px solid;">
                                                                            <table>
                                                                                <tr>
                                                                                    <td width="11"><font size="2" style="font-weight:bold;">12A</font></td>
                                                                                    <td width="459" colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Method of Deduction (choose one) </font></td>
                                                                                </tr>
                                                                                <tr valign="top">
                                                                                    <td>&nbsp;</td>
                                                                                    <td width="134">
                                                                                        <input type="radio" value="Itemized"  name="frm1701:rdoPg2I12AMethodDeduction" id="frm1701:rdoPg2I12AMethodDeductionI" onclick="" />
                                                                                        <label for="frm1701:rdoPg2I12AMethodDeductionI" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Itemized Deduction<br/> [Sec. 34(A-J), NIRC]</label>
                                                                                    </td>
                                                                                    <td width="325">
                                                                                        <input type="radio" value="OSD"  name="frm1701:rdoPg2I12AMethodDeduction" id="frm1701:rdoPg2I12AMethodDeductionO" onclick="" />
                                                                                        <label for="frm1701:rdoPg2I12AMethodDeductionO" style="font-size:11px;" >Optional Standard Deduction (OSD) <br/> [40% of Gross Sales/Receipts/Revenues/Fees [Sec. 34(L), NIRC]]</label>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="720">
                                                                    <input type="radio" value="Percentage"  name="frm1701:rdoPg2I12TaxRate" id="frm1701:rdoPg2I12TaxRateP" onclick="" />
                                                                    <label for="frm1701:rdoPg2I12TaxRateP" style="font-size:11px;" >8%  in lieu of Graduated Rates under Sec. 24(A) & Percentage Tax under Sec. 116 of NIRC 
                                                                        <br/> [available if gross sales/receipts and other non-operating income do not exceed Three million pesos (P3M)]</label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- PART V -->
                                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="2" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                    <div align="center"><font size="2" style="font-weight:bold;">PART V - Computation of Tax </font></div>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- Schedule 1 -->
                                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="3" class="tblFormTdPart" style="border-bottom: #000000 1px solid;">
                                                    <div align="left"><font size="1" style="font-weight:bold;font-size: 11px;">Schedule 1 - Gross Compensation Income and tax Withheld </font><font size="1"><i>(Attach Additional Sheet/s, if necessary)</i></font></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTdPart" style="border-bottom: #000000 2px solid;">
                                                    <div align="left"><label size="1"  style="font-size: 11px;">On Items 1 and 2, enter the required information for each of your employer/s and mark (X) wether the information is for the Taxpayer or the Spouse. On Item 3A, enter the
                                                        <br/>Total Gross Compensation and Total tax Withheld for the Taxpayer and on Item 3B, for the Spouse.</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <label style="font-size:8px; font-weight:bold;">(DO NOT enter Centavos; 49 Centavos or less drop down; 50 or more
                                                            round up)</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" style="border-bottom: #000000 1px solid;">
                                                    <div align="center"><font size="1" style="font-weight:bold;font-size: 11px;">a.</font><font size="1" style="font-size: 11px;"><i>Name of Employer</i></font></div>
                                                </td>
                                            </tr>
                                            <!-- 1a Name of the Employer -->
                                            <tr>
                                                <td colspan="3" class="tblFormTd" >
                                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                        <tr>
                                                            <td>
                                                                <font size="2" style="font-weight:bold;">&nbsp;1</font>
                                                            </td>
                                                            <td>
                                                                <table width="780">
                                                                    <tr>
                                                                        <td width="70">
                                                                            <input type="checkbox" name="frm1701:chkPg2IShed1a_1Taxpayer" id="frm1701:chkPg2IShed1a_1Taxpayer" value="1Taxpayer"/>
                                                                            <label for="frm1701:chkPg2IShed1a_1" style="font-size:11px;">Taxpayer</label>
                                                                        </td>
                                                                        <td colspan="3">
                                                                            <input type="text" size="110" maxlength="50" name="frm1701:txtPg2IShed1a_1TPName" id="frm1701:txtPg2IShed1a_1TPName" />
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table width="780">
                                                                    <tr>
                                                                        <td width="70">
                                                                            <input type="checkbox" name="frm1701:chkPg2IShed1a_1Spouse" id="frm1701:chkPg2IShed1a_1Spouse" value="1Spouse"/>
                                                                            <label for="frm1701:chkPg2IShed1a_1" style="font-size:11px;">Spouse</label> 
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" size="50" maxlength="50" name="frm1701:txtPg2IShed1a_1SName" id="frm1701:txtPg2IShed1a_1SName" />
                                                                        </td>
                                                                        <td align="left">
                                                                            <font size="1" style="font-weight:bold;">&nbsp;b.&nbsp;</font>
                                                                            <font style="font-size:11px;">Employer's TIN</font>
                                                                        </td>
                                                                        <td>
                                                                            <font size="2" face="Arial">
                                                                                <input type="text" value="" size="3" name="frm1701:txtPg2IShed1a_TIN1" maxlength="3" id="frm1701:txtPg2IShed1a_TIN1" />
                                                                                <input type="text" value="" size="3" name="frm1701:txtPg2IShed1a_TIN2" maxlength="3" id="frm1701:txtPg2IShed1a_TIN2" />
                                                                                <input type="text" value="" size="3" name="frm1701:txtPg2IShed1a_TIN3" maxlength="3" id="frm1701:txtPg2IShed1a_TIN3" />
                                                                                <input type="text" value="" size="5" name="frm1701:txtPg2IShed1a_BranchCode" maxlength="5" id="frm1701:txtPg2IShed1a_BranchCode" />
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!-- 2a name of the Employer -->
                                            <tr>
                                                <td colspan="3" class="tblFormTd">
                                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                        <tr>
                                                            <td>
                                                                <font size="2" style="font-weight:bold;">&nbsp;2</font>
                                                            </td>
                                                            <td>
                                                                <table width="780">
                                                                    <tr>
                                                                        <td width="70">
                                                                            <input type="checkbox" name="frm1701:chkPg2IShed2a_2Taxpayer" id="frm1701:chkPg2IShed2a_2Taxpayer" value="2Taxpayer"/>
                                                                            <label for="frm1701:chkPg2IShed2a_2" style="font-size:11px;">Taxpayer</label>
                                                                        </td>
                                                                        <td colspan="3">
                                                                            <input type="text" size="110" maxlength="50" name="frm1701:txtPg2IShed2a_2TPName" id="frm1701:txtPg2IShed2a_2TPName" />
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table width="780">
                                                                    <tr>
                                                                        <td width="70">
                                                                            <input type="checkbox" name="frm1701:chkPg2IShed2a_2Spouse" id="frm1701:chkPg2IShed2a_2Spouse" value="2Spouse"/>
                                                                            <label for="frm1701:chkPg2IShed2a_2" style="font-size:11px;">Spouse</label> 
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" size="50" maxlength="50" name="frm1701:txtPg2IShed2a_2SName" id="frm1701:txtPg2IShed2a_2SName" />
                                                                        </td>
                                                                        <td align="left">
                                                                            <font size="1" style="font-weight:bold;">&nbsp;b.&nbsp;</font>
                                                                            <font style="font-size:11px;">Employer's TIN</font>
                                                                        </td>
                                                                        <td>
                                                                            <font size="2" face="Arial">
                                                                                <input type="text" value="" size="3" name="frm1701:txtPg2IShed2a_TIN1" maxlength="3" id="frm1701:txtPg2IShed2a_TIN1" />
                                                                                <input type="text" value="" size="3" name="frm1701:txtPg2IShed2a_TIN2" maxlength="3" id="frm1701:txtPg2IShed2a_TIN2" />
                                                                                <input type="text" value="" size="3" name="frm1701:txtPg2IShed2a_TIN3" maxlength="3" id="frm1701:txtPg2IShed2a_TIN3" />
                                                                                <input type="text" value="" size="5" name="frm1701:txtPg2IShed2a_BranchCode" maxlength="5" id="frm1701:txtPg2IShed2a_BranchCode" />
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="400" class="tblFormTd" align="left"><font size="1" style="font-weight:bold;font-size: 11px;"><i>(Continuation of Table Above)</i> </font></td>
                                                <td width="200" class="tblFormTd" align="center"><font size="1" style="font-size: 11px;">c. Compensation Income</font></td>
                                                <td width="200" class="tblFormTd" align="center"><font size="1" style="font-size: 11px;">d. Tax Withheld</font></td>
                                            </tr>
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">1</font></td>
                                                            <td width="389">
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed1c_1CI" id="frm1701:txtPg2IShed1c_1CI" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed1c_1TW" id="frm1701:txtPg2IShed1c_1TW" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">2</font></td>
                                                            <td>
                                                            </td>
                                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed1c_2CI" id="frm1701:txtPg2IShed1c_2CI" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed1c_2TW" id="frm1701:txtPg2IShed1c_2TW" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">3A</font></td>
                                                            <td>
                                                                <font size="1"  style="font-size: 11px;">&nbsp;&nbsp;Gross Compensation Income and Total Tax Withheld for </font><br/>
                                                                <font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;font-size: 11px;">&nbsp;&nbsp;TAXPAYER (To Part V <i>Schedule 2 Item 4A and Part VII Itame 5A</i>)</font>
                                                            </td>
                                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed1c_3ACI" id="frm1701:txtPg2IShed1c_3ACI" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed1c_3ATW" id="frm1701:txtPg2IShed1c_3ATW" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >3B</font></td>
                                                            <td>
                                                                <font size="1"  style="font-size: 11px;">&nbsp;&nbsp;Gross Compensation Income and Total Tax Withheld for </font><br/>
                                                                <font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;font-size: 11px;">&nbsp;&nbsp;SPOUSE (To Part V <i>Schedule 2 Item 4B and Part VII Itame 5B</i>)</font>
                                                            </td>
                                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed1c_3BCI" id="frm1701:txtPg2IShed1c_3BCI" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed1c_3BTW" id="frm1701:txtPg2IShed1c_3BCI" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- Schedule 2 -->
                                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="3" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                    <div align="left">
                                                        <font size="1" style="font-weight:bold;font-size: 11px;">Schedule 2 - Taxable Compensation Income</font>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <font style="font-size:11px; font-weight:bold;">(DO NOT enter Centavos; 49 Centavos or less drop down; 50 or more round up)</font>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="400" class="tblFormTd" align="center"><font size="1" style="font-weight:bold;font-size: 11px;">Particulars</font></td>
                                                <td width="200" class="tblFormTd" align="center"><font size="1" style="font-weight:bold;font-size: 11px;">A. Taxpayer/Filer</font></td>
                                                <td width="200" class="tblFormTd" align="center"><font size="1" style="font-weight:bold;font-size: 11px;">B. Spouse</font></td>
                                            </tr>
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">4</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Gross Compensation Income <i>(From Part V Schedule 1 Item 3Ac/3Bc)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed2_4A" id="frm1701:txtPg2IShed2_4A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed2_4B" id="frm1701:txtPg2IShed2_4B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">5</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Less: Non-Taxable / Exempt Compensation</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed2_5A" id="frm1701:txtPg2IShed2_5A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed2_5B" id="frm1701:txtPg2IShed2_5B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">6</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;" >&nbsp;Taxable Compensation Income <i>(Item 4 Less Item 5)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed2_6A" id="frm1701:txtPg2IShed2_6A"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed2_6B" id="frm1701:txtPg2IShed2_6B"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >7</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;<b>Tax Due-Compensation Income </b> <i>(Item 6 x applicable Income Tax Rate)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed2_7A" id="frm1701:txtPg2IShed2_7A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed2_7B" id="frm1701:txtPg2IShed2_7B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- Schedule 3 -->
                                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="3" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                    <div align="left">
                                                        <font size="1" style="font-weight:bold;font-size: 11px">Schedule 3 - Taxable Business Income <i>(If graduated rates, fill in items 8 to 24; if 8% flat income tax rate, fill in items 25 to 30)</i></font>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" align="left"><font size="1" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;3.A - For Graduated Income Tax Rates</font></td>
                                            </tr>
                                            <!-- Items 8-12 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">8</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Sales/revenues/receipts/Fees</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_8A" id="frm1701:txtPg2IShed3_8A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_8B" id="frm1701:txtPg2IShed3_8B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">9</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Less: Sales Returns, Allowances and Discounts</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_9A" id="frm1701:txtPg2IShed3_9A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_9B" id="frm1701:txtPg2IShed3_9B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">10</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Net Sales/Revenues/Receipts/Fees <i>(Item 8 Less Item 9)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_10A" id="frm1701:txtPg2IShed3_10A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_10B" id="frm1701:txtPg2IShed3_10B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >11</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;"  >&nbsp;Less: Cost of Sales/Services <b><i>(applicable only if availing Itemized Deductions)</i></b></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_11A" id="frm1701:txtPg2IShed3_11A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_11B" id="frm1701:txtPg2IShed3_11B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >12</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Gross Income/(Loss) from Operation <i>(Item 10 less Item 11)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_12A" id="frm1701:txtPg2IShed3_12A" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_12B" id="frm1701:txtPg2IShed3_12B" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" align="left"><font size="1"  style="font-size: 11px;">&nbsp;&nbsp;&nbsp;Less: Deductions Allowable under Existing Laws</font></td>
                                            </tr>
                                            <!-- Items 13-16 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">13</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Ordinary Allowable Itemized Deductions <i>(From Part V Schedule 4 Item 18)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_13A" id="frm1701:txtPg2IShed3_13A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_13B" id="frm1701:txtPg2IShed3_13B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">14</font></td>
                                                            <td width="389"><label size="1"  style="font-size: 11px;">&nbsp;Special Allowable Itemized Deductions <i>(From Part V Schedule 5 Item 3 and/or Item 6)</i></label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_14A" id="frm1701:txtPg2IShed3_14A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_14B" id="frm1701:txtPg2IShed3_14B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">15</font></td>
                                                            <td width="389"><label size="1"  style="font-size: 11px;">&nbsp;Allowable for Net Operating Loss Carry Over (NOLCO) <i>(From Part V Schedule 6 Item 8 and/or Item 13)</i></label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_15A" id="frm1701:txtPg2IShed3_15A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_15B" id="frm1701:txtPg2IShed3_15B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >16</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Total Allowable Itemized Deductions <i>(Sum of Items 13 to 15)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_16A" id="frm1701:txtPg2IShed3_16A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_16B" id="frm1701:txtPg2IShed3_16B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" align="left"><font size="1.5" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>OR</b></font></td>
                                            </tr>
                                            <!-- Items 17-18 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">17</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Optional Standard Deduction (OSD) <i>(40% of Item 10)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_17A" id="frm1701:txtPg2IShed3_17A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_17B" id="frm1701:txtPg2IShed3_17B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">18</font></td>
                                                            <td width="389"><label size="1"  style="font-size: 11px;">&nbsp;Net Income/(Loss) <i>(<u>If Itemized:</u> Item 12 Less Item 16; <u>If OSD:</u> Item 10 Less Item 17)</i></label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_18A" id="frm1701:txtPg2IShed3_18A" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_18B" id="frm1701:txtPg2IShed3_18B" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" align="left"><font size="1"  style="font-size: 11px;">&nbsp;&nbsp;&nbsp;Add: Other Non-Operating Income <i>(specify below)</i></font></td>
                                            </tr>
                                            <!-- Items 19-24 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">19</font></td>
                                                            <td width="389"><font size="1">&nbsp;
                                                                    <input type="text" style="color: black;" size="45" maxlength="100" name="frm1701:txtPg2IShed3_19Desc" id="frm1701:txtPg2IShed3_19Desc" />
                                                                </font>
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_19A" id="frm1701:txtPg2IShed3_19A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_19B" id="frm1701:txtPg2IShed3_19B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">20</font></td>
                                                            <td width="389"><font size="1">&nbsp;
                                                                    <input type="text" style="color: black;" size="45" maxlength="100" name="frm1701:txtPg2IShed3_20Desc" id="frm1701:txtPg2IShed3_20Desc" />
                                                                </font>
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_20A" id="frm1701:txtPg2IShed3_20A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_20B" id="frm1701:txtPg2IShed3_20B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">21</font></td>
                                                            <td width="389"><label size="1" style="font-size: 11px;">&nbsp;Amount Received/Share in Income by a Partner from General Professional Partnership (GPP)</label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_21A" id="frm1701:txtPg2IShed3_21A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_21B" id="frm1701:txtPg2IShed3_21B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">22</font></td>
                                                            <td width="389"><label size="1"  style="font-size: 11px;">&nbsp;Total Other Non-Operating Income <i>(Sum of Items 19 to 21)</i></label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_22A" id="frm1701:txtPg2IShed3_22A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_22B" id="frm1701:txtPg2IShed3_22B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">23</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Taxable Income-Business <i>(Sum of Items 18 and 22)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_23A" id="frm1701:txtPg2IShed3_23A" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_23B" id="frm1701:txtPg2IShed3_23B" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                        </tr>
                            <tr>
                                                            <td><font size="2" style="font-weight:bold;">24</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Total Taxable Income - Compensation & Business <i>(Sum of Items 6 and 23)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_24A" id="frm1701:txtPg2IShed3_24A" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_24B" id="frm1701:txtPg2IShed3_24B" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >25</font></td>
                                                            <td width="389"><label size="1"  style="font-size: 11px;">&nbsp;<b>Total Tax Due-Compensation and Business Income</b> <i>(under graduated rates)(Item 24 x applicable Income Tax Rate) (To Part VI Item 1)</i></label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_25A" id="frm1701:txtPg2IShed3_25A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg2IShed3_25B" id="frm1701:txtPg2IShed3_25B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--Page 3-->
                        <div id="Page3Content" style="display:none;">
                            <table width="800" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <table width="800" border="1" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="120" valign="middle" style="text-align: center;">
                                                    <font face="Arial" size="1px">BIR Form No.</font>
                                                    <br/><font size="5px" style="font-weight:bold;">1701</font>
                                                    <br/><font face="Arial" size="1px">January 2018 (ENCS)</font>
                                                    <br/><font face="Arial" size="1px" style="font-weight:bold;">Page 3</font>
                                                </td>
                                                <td width="0" valign="center" style="text-align: center;">
                                                    <font size="5px" style="font-weight:bold;">Annual Income Tax Return</font>
                                                    <br/><font size="2px" style="font-weight:bold;">Individuals (including MIXED Income Earner), Estates and Trusts</font>
                                                </td>
                                                <td width="200" valign="center">
                                                        <p><img src="{{ asset('images/Bar Codes/1701_p3.png') }}" width="220" height="75px" /> </p>
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
                                                <td width="60%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Taxpayer/Filer's Last Name</font></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <font size="2" face="Arial">
                                                        <input type="text" value="{{$company->tin1}}" size="3" maxlength="3" id="frm1701:txtPg3TIN1" disabled />
                                                        <input type="text" value="{{$company->tin2}}" size="3" maxlength="3" id="frm1701:txtPg3TIN2" disabled />
                                                        <input type="text" value="{{$company->tin3}}" size="3" maxlength="3" id="frm1701:txtPg3TIN3" disabled />
                                                        <input type="text" value="{{$company->tin4}}" size="5" maxlength="5" id="frm1701:txtPg3BranchCode" disabled />
                                                    </font>
                                                </td>
                                                <?php 
                                                    $lastname = explode(",", $company['registered_name'])
                                                ?>
                                                <td><input type="text" value="{{$lastname[0]}}" size="70" maxlength="50" id="frm1701:txtPg3TaxpayerName" disabled /></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- Schedule 3B -->
                                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="3" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                    <div align="left">
                                                        <font size="1" style="font-weight:bold;font-size: 11px;">&nbsp;&nbsp;&nbsp;3.B - For 8% Flat Income Tax Rate </font>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <font style="font-size:11px; font-weight:bold;">(DO NOT enter Centavos; 49 Centavos or less drop down; 50 or more round up)</font>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="400" class="tblFormTd" align="center"><font size="1" style="font-weight:bold;font-size: 11px;">Particulars</font></td>
                                                <td width="200" class="tblFormTd" align="center"><font size="1" style="font-weight:bold;font-size: 11px;">A. Taxpayer/Filer</font></td>
                                                <td width="200" class="tblFormTd" align="center"><font size="1" style="font-weight:bold;font-size: 11px;">B. Spouse</font></td>
                                            </tr>
                                            <!-- Item 25 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">26</font></td>
                                                            <td width="389"><label size="1" style="font-size: 11px;">&nbsp;Sales/Revenues/Receipts/Fees <i>(net of sales returns, allowances and discounts)</i></label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed3_26A" id="frm1701:txtPg3IShed3_26A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed3_26B" id="frm1701:txtPg3IShed3_26B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" align="left"><label size="1"  style="font-size: 11px;">&nbsp;Add: Other Non-Operating Income <i>(specify below)</i></label></td>
                                            </tr>
                                            <!-- Item 26-30 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">27</font></td>
                                                            <td width="389"><font size="1">&nbsp;
                                                                    <input type="text" style="color: black;" size="45" maxlength="100" name="frm1701:txtPg3IShed3_27Desc" id="frm1701:txtPg3IShed3_27Desc" />
                                                                </font>
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed3_27A" id="frm1701:txtPg3IShed3_27A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed3_27B" id="frm1701:txtPg3IShed3_27B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">28</font></td>
                                                            <td width="389"><label size="1"  style="font-size: 11px;">&nbsp;Total Income <i>(Sum of Items 26 and 27)</i></label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed3_28A" id="frm1701:txtPg3IShed3_28A"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed3_28B" id="frm1701:txtPg3IShed3_28B"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">29</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Less:</font><font size="0.5"  style="font-size: 11px;">&nbsp;Allowable reduction from gross sales/receipts and other non-operating income of purely self-employed individuals and/or professionals in the amount of P250,000 (not applicable if with compensation income)</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed3_29A" id="frm1701:txtPg3IShed3_29A"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed3_29B" id="frm1701:txtPg3IShed3_29B"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">30</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Taxable Income/(Loss) <i>(Item 28 Less Item 29)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed3_30A" id="frm1701:txtPg3IShed3_30A"  onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed3_30B" id="frm1701:txtPg3IShed3_30B"  onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >31</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;<b>Tax Due-Business Income </b> <i>(Item 30 x 8% Flat Income Tax Rate) </i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed3_31A" id="frm1701:txtPg3IShed3_31A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed3_31B" id="frm1701:txtPg3IShed3_31B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!-- Item 31 -->
                                            <tr>
                                                <td colspan="3" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >32</font></td>
                                                            <td width="389"><label size="1"  style="font-size: 11px;">&nbsp;<b>Total Tax Due-Compensation & Business Income </b> (under flat rate)(Sum of Items 7 and 31) (To Part VI Item 1)</label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed3_32A" id="frm1701:txtPg3IShed3_32A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed3_32B" id="frm1701:txtPg3IShed3_32B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                    </table>  
                                                </td>
                                            </tr>
                                            <!--  -->
                                        </table>
                                        <!-- Schedule 4 -->
                                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="3" class="tblFormTdPart" style="border-bottom: #000000 2px solid;">
                                                    <div align="left">
                                                        <font size="1" style="font-weight:bold;font-size: 11px;">Schedule 4 - Ordinary Allowable Itemized Deductions </font><font size="1"><i>(attach additional sheet/s, if necessary)</i></font>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Item 1-16 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">1</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Amortizations</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_1A" id="frm1701:txtPg3IShed4_1A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_1B" id="frm1701:txtPg3IShed4_1B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">2</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Bad Debts</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_2A" id="frm1701:txtPg3IShed4_2A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_2B" id="frm1701:txtPg3IShed4_2B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">3</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Charitable and Other Contributions</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_3A" id="frm1701:txtPg3IShed4_3A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_3B" id="frm1701:txtPg3IShed4_3B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">4</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Depletion</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_4A" id="frm1701:txtPg3IShed4_4A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_4B" id="frm1701:txtPg3IShed4_4B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">5</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Depreciation</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_5A" id="frm1701:txtPg3IShed4_5A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_5B" id="frm1701:txtPg3IShed4_5B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">6</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Entertainment, Amusement and Recreation</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_6A" id="frm1701:txtPg3IShed4_6A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_6B" id="frm1701:txtPg3IShed4_6B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">7</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Fringe Benefits</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_7A" id="frm1701:txtPg3IShed4_7A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_7B" id="frm1701:txtPg3IShed4_7B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">8</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Interest</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_8A" id="frm1701:txtPg3IShed4_8A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_8B" id="frm1701:txtPg3IShed4_8B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">9</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Losses</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_9A" id="frm1701:txtPg3IShed4_9A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_9B" id="frm1701:txtPg3IShed4_9B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">10</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Pension Trusts</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_10A" id="frm1701:txtPg3IShed4_10A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_10B" id="frm1701:txtPg3IShed4_10B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">11</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Rental</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_11A" id="frm1701:txtPg3IShed4_11A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_11B" id="frm1701:txtPg3IShed4_11B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">12</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Research and Development</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_12A" id="frm1701:txtPg3IShed4_12A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_12B" id="frm1701:txtPg3IShed4_12B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">13</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Salaries, Wages and Allowances</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_13A" id="frm1701:txtPg3IShed4_13A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_13B" id="frm1701:txtPg3IShed4_13B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">14</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;SSS, GSIS, Philhealth, HDMF and Other Contributions</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_14A" id="frm1701:txtPg3IShed4_14A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_14B" id="frm1701:txtPg3IShed4_14B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">15</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Taxes and Licenses</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_15A" id="frm1701:txtPg3IShed4_15A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_15B" id="frm1701:txtPg3IShed4_15B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">16</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Transportation and Travel</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_16A" id="frm1701:txtPg3IShed4_16A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_16B" id="frm1701:txtPg3IShed4_16B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" align="left"><font size="2" style="font-weight:bold;">17</font>
                                                    <font size="1" style="font-size: 11px;">Others (Deductions Subject to Withholding Tax and Other Expenses) <i>[specify below; Add additional sheet(s), if necesary]</i></font>
                                                </td>
                                            </tr>
                                            <!-- Item 17a-18 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;&nbsp;Janitorial and Messengerial Services</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_17aA" id="frm1701:txtPg3IShed4_17aA" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_17aB" id="frm1701:txtPg3IShed4_17aB" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;&nbsp;Professional Fees</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_17bA" id="frm1701:txtPg3IShed4_17bA" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_17bB" id="frm1701:txtPg3IShed4_17bB" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;&nbsp;Security Services</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_17cA" id="frm1701:txtPg3IShed4_17cA" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_17cB" id="frm1701:txtPg3IShed4_17cB" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d</font></td>
                                                            <td width="389"><font size="1">&nbsp;&nbsp;
                                                                    <input type="text" style="color: black;" size="45" maxlength="100" name="frm1701:txtPg3IShed4_17dDesc" id="frm1701:txtPg3IShed4_17dDesc" />
                                                                </font>
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_17dA" id="frm1701:txtPg3IShed4_17dA" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_17dB" id="frm1701:txtPg3IShed4_17dB" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;18</font></td>
                                                            <td width="389"><label size="1" style="font-size: 11px;">Total Ordinary Allowable itemized Deductions <i>(Sum of Items 1 to 17d) (To part V Schedule 3.A Item 13)</i></label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_18A" id="frm1701:txtPg3IShed4_18A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed4_18B" id="frm1701:txtPg3IShed4_18B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- Schedule 5 -->
                                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="3" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                    <div align="left">
                                                        <font size="1" style="font-weight:bold;font-size: 11px;">Schedule 5 - Special Allowable Itemized Deductions </font><font size="1"><i>(attach additional sheet/s, if necessary)</i></font>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="400" class="tblFormTd" align="left"><font size="1" style="font-weight:bold;font-size: 11px;">&nbsp;&nbsp;&nbsp;5.A - Taxpayer/Filer</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <font size="1"  style="font-size: 11px;">Description</font></td>
                                                <td width="200" class="tblFormTd" align="center"><font size="1" style="font-size: 11px;" >Legal Basis</font></td>
                                                <td width="200" class="tblFormTd" align="center"><font size="1"  style="font-size: 11px;">Amount</font></td>
                                            </tr>
                                            <!-- Items 1-3 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">1</font></td>
                                                            <td width="389"><font size="1">&nbsp;
                                                                    <input type="text" style="color: black;" size="45" maxlength="100" name="frm1701:txtPg3IShed5_1Desc" id="frm1701:txtPg3IShed5_1Desc" />
                                                                </font>
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed5_1Legal" id="frm1701:txtPg3IShed5_1Legal" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed5_1Amt" id="frm1701:txtPg3IShed5_1Amt" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">2</font></td>
                                                            <td width="389"><font size="1">&nbsp;
                                                                    <input type="text" style="color: black;" size="45" maxlength="100" name="frm1701:txtPg3IShed5_2Desc" id="frm1701:txtPg3IShed5_2Desc" />
                                                                </font>
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed5_2Legal" id="frm1701:txtPg3IShed5_2Legal" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed5_2Amt" id="frm1701:txtPg3IShed5_2Amt" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">3</font></td>
                                                            <td width="589" colspan="2"><font size="1" style="font-size: 11px;">&nbsp;Total Special Allowable Itemized Deductions-<b>Taxpayer/Filer</b> <i>(Sum of Items 1 and 2) (To part V Schedule 3.A Item 14A)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed5_3" id="frm1701:txtPg3IShed5_3" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" align="left"><font size="1" style="font-weight:bold;font-size: 11px;">&nbsp;&nbsp;&nbsp;5.B - Spouse</font></td>
                                            </tr>
                                            <!-- Item 4-6 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">4</font></td>
                                                            <td width="389"><font size="1">&nbsp;
                                                                    <input type="text" style="color: black;" size="45" maxlength="100" name="frm1701:txtPg3IShed5_4Desc" id="frm1701:txtPg3IShed5_4Desc" />
                                                                </font>
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed5_4Legal" id="frm1701:txtPg3IShed5_4Legal" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed5_4Amt" id="frm1701:txtPg3IShed5_4Amt" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">5</font></td>
                                                            <td width="389"><font size="1">&nbsp;
                                                                    <input type="text" style="color: black;" size="45" maxlength="100" name="frm1701:txtPg3IShed5_5Desc" id="frm1701:txtPg3IShed5_5Desc" />
                                                                </font>
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed5_5Legal" id="frm1701:txtPg3IShed5_5Legal" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed5_5Amt" id="frm1701:txtPg3IShed5_5Amt" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">6</font></td>
                                                            <td width="589" colspan="2"><font size="1" style="font-size: 11px;">&nbsp;Total Special Allowable Itemized Deductions-<b>Spouse</b> <i>(Sum of Items 4 and 5) (To part V Schedule 3.A Item 14B)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed5_6" id="frm1701:txtPg3IShed5_6" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- Schedule 6 -->
                                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="3" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                    <div align="left">
                                                        <font size="1" style="font-weight:bold;font-size: 11px;">Schedule 6 - Computation of Net Operating Loss carry Over (NOLCO) </font>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" align="left"><font size="1" style="font-weight:bold;font-size: 11px;">&nbsp;&nbsp;&nbsp;6.A - Computation of NOLCO</font></td>
                                            </tr>
                                            <tr>
                                                <td width="400" class="tblFormTd" align="center"><font size="1" style="font-weight:bold;font-size: 11px;">Description</font></td>
                                                <td width="200" class="tblFormTd" align="center"><font size="1" style="font-weight:bold;font-size: 11px;">A. Taxpayer/Filer</font></td>
                                                <td width="200" class="tblFormTd" align="center"><font size="1" style="font-weight:bold;font-size: 11px;">B. Spouse</font></td>
                                            </tr>
                                            <!-- Item 6.A 1-3 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">1</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Gross Income </font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed6_1A" id="frm1701:txtPg3IShed6_1A" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed6_1B" id="frm1701:txtPg3IShed6_1B" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">2</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Less: Ordinary Allowable Itemized Deductions</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed6_2A" id="frm1701:txtPg3IShed6_2A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed6_2B" id="frm1701:txtPg3IShed6_2B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">3</font></td>
                                                            <td width="389"><label size="1" style="font-size: 11px;" >&nbsp;Net Operating Loss <i>(Item 1 Less Item 2) (To Schedule 6.A.1 Item 7A and/or Schedule 6.A.2 Item 12A)</i></label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed6_3A" id="frm1701:txtPg3IShed6_3A"  onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3IShed6_3B" id="frm1701:txtPg3IShed6_3B"  onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" align="left"><font size="1" style="font-weight:bold;font-size: 11px;">&nbsp;&nbsp;&nbsp;6.A.1 - Taxpayer/Filer's Detailed Computation of Available NOLCO</font></td>
                                            </tr>
                                            <!-- Item 6.A.1 4-8 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="6">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        <td colspan="2" align="center"><font size="1" style="font-size: 11px;">Net Operating Loss </font></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="center"><font size="1" style="font-size: 11px;">Year Incurred </font></td>
                                                                        <td align="center"><font size="1" style="font-size: 11px;">A. Amount </font></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="center"><label size="1" style="font-size: 11px;">B. NOLCO Appliead <br/> Previous Year/s </label></td>
                                                            <td align="center"><font size="1" style="font-size: 11px;">C. NOLCO Expired </font></td>
                                                            <td align="center"><label size="1" style="font-size: 11px;">D. NOLCO Appliead <br/> Current Year </label></td>
                                                            <td align="center"><label size="1" style="font-size: 11px;">E. Net Operating Loss <br/> (Unapplied) <br/> <i>[(E)=A-(B+C+D)]</i></label></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        <td align="center"><font size="2" style="font-weight:bold;">4</font>
                                                                            <font size="1"><input type="text" style="color: black; text-align:center;" size="7" maxlength="4" name="frm1701:txtPg3IShed6_4Year" id="frm1701:txtPg3IShed6_4Year" /></font></td>
                                                                        <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="10" maxlength="25" name="frm1701:txtPg3IShed6_4A" id="frm1701:txtPg3IShed6_4A" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_4B" id="frm1701:txtPg3IShed6_4B" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_4C" id="frm1701:txtPg3IShed6_4C" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_4D" id="frm1701:txtPg3IShed6_4D" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_4E" id="frm1701:txtPg3IShed6_4E" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        <td align="center"><font size="2" style="font-weight:bold;">5</font>
                                                                            <font size="1"><input type="text" style="color: black; text-align:center;" size="7" maxlength="4" name="frm1701:txtPg3IShed6_5Year" id="frm1701:txtPg3IShed6_5Year" /></font></td>
                                                                        <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="10" maxlength="25" name="frm1701:txtPg3IShed6_5A" id="frm1701:txtPg3IShed6_5A" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_5B" id="frm1701:txtPg3IShed6_5B" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_5C" id="frm1701:txtPg3IShed6_5C" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_5D" id="frm1701:txtPg3IShed6_5D" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_5E" id="frm1701:txtPg3IShed6_5E" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        <td align="center"><font size="2" style="font-weight:bold;">6</font>
                                                                            <font size="1"><input type="text" style="color: black; text-align:center;" size="7" maxlength="4" name="frm1701:txtPg3IShed6_6Year" id="frm1701:txtPg3IShed6_6Year" /></font></td>
                                                                        <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="10" maxlength="25" name="frm1701:txtPg3IShed6_6A" id="frm1701:txtPg3IShed6_6A" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_6B" id="frm1701:txtPg3IShed6_6B" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_6C" id="frm1701:txtPg3IShed6_6C" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_6D" id="frm1701:txtPg3IShed6_6D" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_6E" id="frm1701:txtPg3IShed6_6E" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        <td align="center"><font size="2" style="font-weight:bold;">7</font>
                                                                            <font size="1"><input type="text" style="color: black; text-align:center;" size="7" maxlength="4" name="frm1701:txtPg3IShed6_7Year" id="frm1701:txtPg3IShed6_7Year" /></font></td>
                                                                        <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="10" maxlength="25" name="frm1701:txtPg3IShed6_7A" id="frm1701:txtPg3IShed6_7A" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_7B" id="frm1701:txtPg3IShed6_7B" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_7C" id="frm1701:txtPg3IShed6_7C" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_7D" id="frm1701:txtPg3IShed6_7D" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg3IShed6_7E" id="frm1701:txtPg3IShed6_7E" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><font size="2" style="font-weight:bold;font-size: 11px;">&nbsp;8</font><font size="1">&nbsp;Total NOLCO - taxpayer/Filer <i>(Sum of Items 4D to 7D) (To Part V Schedule 3.A Item 15A)</i></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="17" maxlength="25" name="frm1701:txtPg3IShed6_8D" id="frm1701:txtPg3IShed6_8D" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></font></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr> 
                                        </table>
                                    </td>
                                </tr>
                                <!--CONTENT END HERE-->
                            </table>
                        </div>
                        <!--Page 4-->
                        <div id="Page4Content" style="display:none;">
                            <table width="800" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <table width="800" border="1" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="120" valign="middle" style="text-align: center;">
                                                    <font face="Arial" size="1px">BIR Form No.</font>
                                                    <br/><font size="5px" style="font-weight:bold;">1701</font>
                                                    <br/><font face="Arial" size="1px">January 2018 (ENCS)</font>
                                                    <br/><font face="Arial" size="1px" style="font-weight:bold;">Page 4</font>
                                                </td>
                                                <td width="0" valign="center" style="text-align: center;">
                                                    <font size="5px" style="font-weight:bold;">Annual Income Tax Return</font>
                                                    <br/><font size="2px" style="font-weight:bold;">Individuals (including MIXED Income Earner), Estates and Trusts</font>
                                                </td>
                                                <td width="200" valign="center">
                                                        <p><img src="{{ asset('images/Bar Codes/1701_p4.png') }}" width="220" height="75px" /> </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td width="40%"><font size="1" face="Arial, Helvetica, sans-serif"  style="font-size: 11px;">TIN</font></td>
                                                <td width="60%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Taxpayer/Filer's Last Name</font></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <font size="2" face="Arial">
                                                        <input type="text" value="{{$company->tin1}}" size="3" maxlength="3" id="frm1701:txtPg4TIN1" disabled />
                                                        <input type="text" value="{{$company->tin2}}" size="3" maxlength="3" id="frm1701:txtPg4TIN2" disabled />
                                                        <input type="text" value="{{$company->tin3}}" size="3" maxlength="3" id="frm1701:txtPg4TIN3" disabled />
                                                        <input type="text" value="{{$company->tin4}}" size="5" maxlength="5" id="frm1701:txtPg4BranchCode" disabled />
                                                    </font>
                                                </td>
                                                <?php 
                                                    $lastname = explode(",", $company['registered_name'])
                                                ?>
                                                <td><input type="text" value="{{$lastname[0]}}" size="75" maxlength="50" id="frm1701:txtPg4TaxpayerName" disabled /></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <!--CONTENT START HERE-->
                                <tr>
                                    <td>
                                        <!-- Schedule 6 -->
                                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="3" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                    <div align="left">
                                                        <font size="1" style="font-weight:bold;font-size: 11px;"><i>(Continuation of Schedule 6)</i></font>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" align="left"><font size="1" style="font-weight:bold;font-size: 11px;">&nbsp;&nbsp;&nbsp;6.A.2 - Spouse's Detailed Computation of Available NOLCO</font></td>
                                            </tr>
                                            <!-- Item 6.A.2 9-13 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="6">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        <td colspan="2" align="center"><font size="1" style="font-size: 11px;">Net Operating Loss </font></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="center"><font size="1" style="font-size: 11px;">Year Incurred </font></td>
                                                                        <td align="center"><font size="1" style="font-size: 11px;">A. Amount </font></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="center"><label size="1" style="font-size: 11px;">B. NOLCO Appliead <br/> Previous Year/s </label></td>
                                                            <td align="center"><font size="1" style="font-size: 11px;">C. NOLCO Expired </font></td>
                                                            <td align="center"><label size="1" style="font-size: 11px;">D. NOLCO Appliead <br/> Current Year </label></td>
                                                            <td align="center"><label size="1" style="font-size: 11px;">E. Net Operating Loss <br/> (Unapplied) <br/> <i>[(E)=A-(B+C+D)]</i></label></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        <td align="center"><font size="2" style="font-weight:bold;">09</font>
                                                                            <font size="1"><input type="text" style="color: black; text-align:center;" size="6" maxlength="4" name="frm1701:txtPg4IShed6_9Year" id="frm1701:txtPg4IShed6_9Year" /></font></td>
                                                                        <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_9A" id="frm1701:txtPg4IShed6_9A" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_9B" id="frm1701:txtPg4IShed6_9B" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_9C" id="frm1701:txtPg4IShed6_9C" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_9D" id="frm1701:txtPg4IShed6_9D" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_9E" id="frm1701:txtPg4IShed6_9E" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        <td align="center"><font size="2" style="font-weight:bold;">10</font>
                                                                            <font size="1"><input type="text" style="color: black; text-align:center;" size="6" maxlength="4" name="frm1701:txtPg4IShed6_10Year" id="frm1701:txtPg4IShed6_10Year" /></font></td>
                                                                        <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_10A" id="frm1701:txtPg4IShed6_10A" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_10B" id="frm1701:txtPg4IShed6_10B" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_10C" id="frm1701:txtPg4IShed6_10C" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_10D" id="frm1701:txtPg4IShed6_10D" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_10E" id="frm1701:txtPg4IShed6_10E" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        <td align="center"><font size="2" style="font-weight:bold;">11</font>
                                                                            <font size="1"><input type="text" style="color: black; text-align:center;" size="6" maxlength="4" name="frm1701:txtPg4IShed6_11Year" id="frm1701:txtPg4IShed6_11Year" /></font></td>
                                                                        <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_11A" id="frm1701:txtPg4IShed6_11A" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_11B" id="frm1701:txtPg4IShed6_11B" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_11C" id="frm1701:txtPg4IShed6_11C" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_11D" id="frm1701:txtPg4IShed6_11D" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_11E" id="frm1701:txtPg4IShed6_11E" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        <td align="center"><font size="2" style="font-weight:bold;">12</font>
                                                                            <font size="1"><input type="text" style="color: black; text-align:center;" size="6" maxlength="4" name="frm1701:txtPg4IShed6_12Year" id="frm1701:txtPg4IShed6_12Year" /></font></td>
                                                                        <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_12A" id="frm1701:txtPg4IShed6_12A" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_12B" id="frm1701:txtPg4IShed6_12B" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_12C" id="frm1701:txtPg4IShed6_12C" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_12D" id="frm1701:txtPg4IShed6_12D" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="14" maxlength="25" name="frm1701:txtPg4IShed6_12E" id="frm1701:txtPg4IShed6_12E" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></font></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><font size="2" style="font-weight:bold;">13</font><font size="1" style="font-size: 11px;">&nbsp;Total NOLCO - Spouse <i>(Sum of Items 9D to 12D) (To Part V Schedule 3.A Item 15B)</i></font></td>
                                                            <td align="center"><font size="1"><input type="text" style="color: black; text-align:right;" size="17" maxlength="25" name="frm1701:txtPg3IShed6_8D" id="frm1701:txtPg3IShed6_8D" value="0.00" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></font></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr> 
                                        </table>
                                        <!-- Part VI -->
                                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="3" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                    <div align="center">
                                                        <font size="1" style="font-weight:bold;font-size: 11px;">PART VI - Summary of Income Tax Due</font>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">1</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Regular Rate-Income Tax Due <i>(From Part V, Either Item 25 or Item 32)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart6_1A" id="frm1701:txtPg4IPart6_1A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart6_1B" id="frm1701:txtPg4IPart6_1B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">2</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Special Rate-Income Tax Due <i>(From Part X Item 17B/17F)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart6_2A" id="frm1701:txtPg4IPart6_2A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart6_2B" id="frm1701:txtPg4IPart6_2B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">3</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Less: Share of Other Government Agency, <i>if remitted directly to the Agency</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart6_3A" id="frm1701:txtPg4IPart6_3A"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart6_3B" id="frm1701:txtPg4IPart6_3B"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >4</font></td>
                                                            <td width="389"><label size="1"  style="font-size: 11px;">&nbsp;Net Special Rate-Income Tax Due/Share of National Govt. <i>(Item 2 Less Item 3)</i></label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart6_4A" id="frm1701:txtPg4IPart6_4A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart6_4B" id="frm1701:txtPg4IPart6_4B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >5</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Total Income Tax Due <i>(To Part II Item 22)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart6_5A" id="frm1701:txtPg4IPart6_5A" onblur="round(this,2);computeTxtPg4I5Part6('taxpayer');" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart6_5B" id="frm1701:txtPg4IPart6_5B" onblur="round(this,2);computeTxtPg4I5Part6('spouse');" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- Part VII -->
                                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="3" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                    <div align="center">
                                                        <font size="1" style="font-weight:bold;">PART VII - Tax Credits/Payments <i>(attach proof)</i></font>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">1</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Prior Year's Excess Credits</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_1A" id="frm1701:txtPg4IPart7_1A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_1B" id="frm1701:txtPg4IPart7_1B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">2</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Tax Payments for the First Three (3) Quarters</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_2A" id="frm1701:txtPg4IPart7_2A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_2B" id="frm1701:txtPg4IPart7_2B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">3</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Creditable Tax Withheld for the First Three (3) Quarters</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_3A" id="frm1701:txtPg4IPart7_3A"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_3B" id="frm1701:txtPg4IPart7_3B"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">4</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Creditable Tax Withheld per BIR Form No. 2307 for the 4th Quarter</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_4A" id="frm1701:txtPg4IPart7_4A"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_4B" id="frm1701:txtPg4IPart7_4B"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >5</font></td>
                                                            <td width="389"><label size="1"  style="font-size: 11px;">&nbsp;Creditable Tax Withheld per BIR Form No. 2316 <i>(From Part V Schedule 1 item 3Ad/3Bd)</i></label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_5A" id="frm1701:txtPg4IPart7_5A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_5B" id="frm1701:txtPg4IPart7_5B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">6</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Tax Paid in Return Previously Filed, if this is an Amended Return</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_6A" id="frm1701:txtPg4IPart7_6A"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_6B" id="frm1701:txtPg4IPart7_6B"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >7</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Foreign Tax Credits, <i>if applicable</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_7A" id="frm1701:txtPg4IPart7_7A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_7B" id="frm1701:txtPg4IPart7_7B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >8</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Special Tax Credits, <i>if applicable (To Part VIII Item 6)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_8A" id="frm1701:txtPg4IPart7_8A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_8B" id="frm1701:txtPg4IPart7_8B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >9</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Other Tax Credits/Payments <i>(specify)</i> &nbsp;
                                                                <input type="text" style="color: black;" size="20" maxlength="100" name="frm1701:txtPg4IPart7_9Specify" id="frm1701:txtPg4IPart7_9Specify" /></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_9A" id="frm1701:txtPg4IPart7_9A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_9B" id="frm1701:txtPg4IPart7_9B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >10</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Total Tax Credits/Payments <i>(Sum of Items 1 to 9) (To Part II Item 23)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_10A" id="frm1701:txtPg4IPart7_10A" onblur="round(this,2);computeTxtPg4I10Part7('taxpayer');" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart7_10B" id="frm1701:txtPg4IPart7_10B" onblur="round(this,2);computeTxtPg4I10Part7('spouse');" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- Part VIII -->
                                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="3" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                    <div align="center">
                                                        <font size="1" style="font-weight:bold;font-size: 11px;">PART VIII - Tax Relief Availment</font>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" align="left"><font size="1" style="font-weight:bold;font-size: 11px;">&nbsp;&nbsp;&nbsp;VIII.A - Special Rate</font></td>
                                            </tr>
                                            <!-- Items 1-7 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">1</font></td>
                                                            <td width="389"><label size="1" style="font-size: 11px;">&nbsp;Regular Income Tax Otherwise Due <i>(Part X Item 16B and/or Iten 16F X applicable regular income tax rate)</i></label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_1A" id="frm1701:txtPg4IPart8_1A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_1B" id="frm1701:txtPg4IPart8_1B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">2</font></td>
                                                            <td width="389"><label size="1"  style="font-size: 11px;">&nbsp;Tax Relief on Special Allowable Itemized Deductions  <i>(Part X Item7B and/or Item 7F X applicable regular income tax rate )</i></label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_2A" id="frm1701:txtPg4IPart8_2A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_2B" id="frm1701:txtPg4IPart8_2B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">3</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Sub-Total - Tax Relief <i>(Sum of Items 1 and 2)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_3A" id="frm1701:txtPg4IPart8_3A"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_3B" id="frm1701:txtPg4IPart8_3B"  onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >4</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Less: Income Tax Due <i>(From Part X Item 17B and/or Item 17F)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_4A" id="frm1701:txtPg4IPart8_4A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_4B" id="frm1701:txtPg4IPart8_4B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >5</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Tax Relief Availment Before Special Tax Credit <i>(Item 3 Less Item 4)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_5A" id="frm1701:txtPg4IPart8_5A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_5B" id="frm1701:txtPg4IPart8_5B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >6</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Add: Special Tax Credit, if any <i>(From Part VII Item 8)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_6A" id="frm1701:txtPg4IPart8_6A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_6B" id="frm1701:txtPg4IPart8_6B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >7</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Total Tax Relief Availment-SPECIAL <i>(Sum of Items 5 and 6)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_7A" id="frm1701:txtPg4IPart8_7A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_7B" id="frm1701:txtPg4IPart8_7B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" align="left"><font size="1" style="font-weight:bold;font-size: 11px;">&nbsp;&nbsp;&nbsp;VIII.B - Exempt</font></td>
                                            </tr>
                                            <!-- Items 8-10 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">8</font></td>
                                                            <td width="389"><label size="1" style="font-size: 11px;">&nbsp;Regular Income Tax Otherwise Due <i>(Part X Item 16A and/or Iten 16E X applicable regular income tax rate)</i></label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_8A" id="frm1701:txtPg4IPart8_8A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_8B" id="frm1701:txtPg4IPart8_8B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">9</font></td>
                                                            <td width="389"><label size="1"  style="font-size: 11px;">&nbsp;Tax Relief on Special Allowable Itemized Deductions  <i>(Part X Item7A and/or Item 7E X applicable regular income tax rate )</i></label></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_9A" id="frm1701:txtPg4IPart8_9A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_9B" id="frm1701:txtPg4IPart8_9B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >10</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Total Tax Relief Availment-EXEMPT <i>(Sum of Items 8 and 9)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_10A" id="frm1701:txtPg4IPart8_10A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart8_10B" id="frm1701:txtPg4IPart8_10B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- Part IX -->
                                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="3" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                    <div align="center">
                                                        <font size="1" style="font-weight:bold;font-size: 11px;">PART IX - Reconciliation of Net Income per Books Against Taxable Income <i>(Attach additional sheet/s, if necessary)</i></font>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="400" class="tblFormTd" align="center"><font size="1" style="font-weight:bold;font-size: 11px;">Particulars</font></td>
                                                <td width="200" class="tblFormTd" align="center"><font size="1" style="font-weight:bold;font-size: 11px;">A. Taxpayer/Filer</font></td>
                                                <td width="200" class="tblFormTd" align="center"><font size="1" style="font-weight:bold;font-size: 11px;">B. Spouse</font></td>
                                            </tr>
                                            <!-- Item 1 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">1</font></td>
                                                            <td width="389"><font size="1" style="font-size: 11px;">&nbsp;Net Income/(Loss) per Books</font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_1A" id="frm1701:txtPg4IPart9_1A" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_1B" id="frm1701:txtPg4IPart9_1B" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);"/></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" align="left"><font size="1"  style="font-size: 11px;">&nbsp;Add: Non-Deductible Expenses/Taxable Other Income</font></td>
                                            </tr>
                                            <!-- Items 2-5 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">2</font></td>
                                                            <td width="389"><font size="1">&nbsp;
                                                                    <input type="text" style="color: black;" size="45" maxlength="100" name="frm1701:txtPg4IPart9_2Particulars" id="frm1701:txtPg4IPart9_2Particulars" />
                                                                </font>
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_2A" id="frm1701:txtPg4IPart9_2A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_2B" id="frm1701:txtPg4IPart9_2B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">3</font></td>
                                                            <td width="389"><font size="1">&nbsp;
                                                                    <input type="text" style="color: black;" size="45" maxlength="100" name="frm1701:txtPg4IPart9_3Particulars" id="frm1701:txtPg4IPart9_3Particulars" />
                                                                </font>
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_3A" id="frm1701:txtPg4IPart9_3A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_3B" id="frm1701:txtPg4IPart9_3B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">4</font></td>
                                                            <td width="389"><font size="1">&nbsp;
                                                                    <input type="text" style="color: black;" size="45" maxlength="100" name="frm1701:txtPg4IPart9_4Particulars" id="frm1701:txtPg4IPart9_4Particulars" />
                                                                </font>
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_4A" id="frm1701:txtPg4IPart9_4A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_4B" id="frm1701:txtPg4IPart9_4B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >5</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Total <i>(Sum of Items 1 to 4)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_5A" id="frm1701:txtPg4IPart9_5A" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_5B" id="frm1701:txtPg4IPart9_5B" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" align="left"><font size="1"  style="font-size: 11px;">&nbsp;Less: A) Non-Taxable Income and Income Subjected to Final Tax</font></td>
                                            </tr>
                                            <!-- Items 6-7 -->
                                            <tr>
                                                <td class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">6</font></td>
                                                            <td width="389"><font size="1">&nbsp;
                                                                    <input type="text" style="color: black;" size="45" maxlength="100" name="frm1701:txtPg4IPart9_6Particulars" id="frm1701:txtPg4IPart9_6Particulars" />
                                                                </font>
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_6A" id="frm1701:txtPg4IPart9_6A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_6B" id="frm1701:txtPg4IPart9_6B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">7</font></td>
                                                            <td width="389"><font size="1">&nbsp;
                                                                    <input type="text" style="color: black;" size="45" maxlength="100" name="frm1701:txtPg4IPart9_7Particulars" id="frm1701:txtPg4IPart9_7Particulars" />
                                                                </font>
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_7A" id="frm1701:txtPg4IPart9_7A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_7B" id="frm1701:txtPg4IPart9_7B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="tblFormTd" align="left"><font size="1"  style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; B) Special/Other Allowable Deductions</font></td>
                                            </tr>
                                            <!-- Items 8-11 -->
                                            <tr>
                                                <td  class="tblFormTd" colspan="3">
                                                    <table>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">8</font></td>
                                                            <td width="389"><font size="1">&nbsp;
                                                                    <input type="text" style="color: black;" size="45" maxlength="100" name="frm1701:txtPg4IPart9_8Particulars" id="frm1701:txtPg4IPart9_8Particulars" />
                                                                </font>
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_8A" id="frm1701:txtPg4IPart9_8A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_8B" id="frm1701:txtPg4IPart9_8B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">9</font></td>
                                                            <td width="389"><font size="1">&nbsp;
                                                                    <input type="text" style="color: black;" size="45" maxlength="100" name="frm1701:txtPg4IPart9_9Particulars" id="frm1701:txtPg4IPart9_9Particulars" />
                                                                </font>
                                                            </td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_9A" id="frm1701:txtPg4IPart9_9A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_9B" id="frm1701:txtPg4IPart9_9B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >10</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;Total <i>(Sum of Items 6 to 9)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_10A" id="frm1701:txtPg4IPart9_10A" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_10B" id="frm1701:txtPg4IPart9_10B" onblur="round(this,2);" onkeypress="return wholenumber(event, true);" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;" >11</font></td>
                                                            <td width="389"><font size="1"  style="font-size: 11px;">&nbsp;<b>Net Taxable Income/(Loss)</b> <i>(Item 5 Less Item 10)</i></font></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_11A" id="frm1701:txtPg4IPart9_11A" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                            <td width="200" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4IPart9_11B" id="frm1701:txtPg4IPart9_11B" onblur="round(this,2);" onkeypress="return negativeNumbers(event, true);" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <!--CONTENT END HERE-->
                            </table>
                        </div>
                    </div>
                    <div id="ATTACHMENT" style="display: none; width: 100%;">
                        <div id="attachmentSelector" style="width: 100%;">
                            <div>
                                <table>
                                    <tr>
                                        <td id="tdAttachmentNumberNavigation" style="text-align: left;">
                                            <span>Go to Attachment Number</span>
                                            <input id="attachmentCurrent" type="text" value="1" size="1" maxlength="4" style="text-align: center;" onkeypress="return wholenumber(event, true);" />
                                            <input id="attachmentTotal" name="attachmentTotal" type="text" value="0" size="1" style="text-align: center;" readonly="readonly" />
                                            <input id="attachmentGo" type="button" value="Go" onclick="displayAttachmentByNumber();" style="width: 50px;" />
                                            <input id="currentTypeView" type="hidden" />
                                        </td>
                                        <td id="tdAttachmentAction" style="text-align: right; vertical-align: bottom;">
                                            <input type="button" id="frm1701:btnAddAttachmentEX" value="Add Exempt Tax Regime" onclick="addAttachment('EX');" style="width: 200px;" />
                                            <input type="button" id="frm1701:btnAddAttachmentSP" value="Add Special Rate Tax Regime" onclick="addAttachment('SP');" style="width: 200px;" /><br/>
                                            <input type="button" value="Delete this attachment" id="attachmentDelete" onclick="deleteAttachment()" style="width: 200px;" /><br/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                            
                        <!--Attachment : Attachment Container-->
                        <div id="attachmentContainer">
                            <div id="attachmentEX" style="display: none; background-color: white;"></div>
                            <div id="attachmentSP" style="display: none; background-color: white;"></div>
                        </div>  

                        <!--Attachment : Attachment Page Navigation-->
                        <table class="tblForm" id="attachmentPager" style="text-align: center; border-top: 1px solid #efefef;border-bottom: 1px solid gray; margin-top:1px;" height="50">
                            <tr>
                            <td class="tblFormTd" colspan="2">
                                <table class="noCellSpace">
                                    <tr>
                                    <td>
                                        <input id="attachmentPage1" value="Page 1m" type="button" onclick="displayAttachmentByPage(1);" />
                                        <input id="attachmentPage2" value="Page 2m" type="button" onclick="displayAttachmentByPage(2);" />
                                        <input id="attachmentPage3" value="Page 3m" type="button" onclick="displayAttachmentByPage(3);" />
                                        <input id="attachmentPage4" value="Page 4m" type="button" onclick="displayAttachmentByPage(4);" />
                                    </td>                
                                    <td width="400px">
                                        <input type="button" value="Back to Main Form" style="width: 120;" name="frm1701:btnBack" id="frm1701:btnBack" onclick="processBack();" />
                                        <input type="button" value="View Attachments" style="width: 120;" name="frm1701:btnViewAttachments" id="frm1701:btnViewAttachments" onclick="openModalViewAttachments();" />
                                    </td>
                                    </tr>
                                </table>  
                            </td>           
                            </tr>
                        </table>

                        <!--Attachment : Attachment HTML Source -->
                        <div id="attachmentPages_TEMP">
                            <div id="TYPE">
                                
                                <!--Form 1701 : Attachment 1m -->
                                <div id="Page1mTYPEContent" style="position:relative; margin-left:-204px; display:none;width:134%;">
                                    <table border="1" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="120" valign="middle" style="text-align: center; background-color: white;">
                                                <font face="Arial" size="1px">BIR Form No.</font>
                                                <br/><font size="5px" style="font-weight:bold;">1701</font>
                                                <br/><font face="Arial" size="1px">January 2018 (ENCS)</font>
                                                <br/><font face="Arial" size="1px" style="font-weight:bold;">Page 1m</font>
                                            </td>
                                            <td width="0" valign="center" style="text-align: center; background-color: white;">
                                                <font size="5px" style="font-weight:bold;">Annual Income Tax Return</font>
                                                <br/><font size="2px" style="font-weight:bold;">Consolidation of ALL Activities per Tax Regime (Accomplish only if with MULTIPLE Tax Regimes)</font>
                                            </td>
                                            <td width="200" valign="center" style=" background-color: white;">
                                                <p><img src="{{ asset('images/Bar Codes/1701_p1m.png') }}" width="220" height="75" /> </p>
                                            </td>
                                        </tr>
                                    </table>
                                    <table border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="40%"><font size="1" face="Arial, Helvetica, sans-serif">TIN</font></td>
                                            <td width="60%"><font size="1" face="Arial, Helvetica, sans-serif">Taxpayer/Filer's Last Name</font></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <font size="2" face="Arial">
                                                    <input type="text" value="{{$company->tin1}}" size="3" maxlength="3" id="frm1701:txtPg1mTIN1" disabled />
                                                    <input type="text" value="{{$company->tin2}}" size="3" maxlength="3" id="frm1701:txtPg1mTIN2" disabled />
                                                    <input type="text" value="{{$company->tin3}}" size="3" maxlength="3" id="frm1701:txtPg1mTIN3" disabled />
                                                    <input type="text" value="{{$company->tin4}}" size="5" maxlength="5" id="frm1701:txtPg1mBranchCode" disabled />
                                                </font>
                                            </td>
                                            <?php 
                                                        $lastname = explode(",", $company['registered_name'])
                                                    ?>
                                            <td><input type="text" value="{{$lastname[0]}}" size="80" maxlength="50" id="frm1701:txtPg1mTaxpayerName" disabled /></td>
                                        </tr>
                                    </table>
                                    <!--Page 1m Part X-->
                                    <table border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTD" style="border-bottom: #000000 2px solid;">
                                                <font size="1" style="font-weight:bold;">Part X - CONSOLIDATED COMPUTATION BY TAX REGIME</font>
                                                <br/><font size="1" face="Arial, Helvetica, sans-serif">Instructions: (mark appropriate box)</font>
                                            </td>
                                            <td class="tblFormTD" style=" border-bottom:#000000 2px solid;">
                                                <input type="radio" name="frm1701:rdoPg1mTYPE" id="frm1701:rdoPg1mOption1TYPE" value="1">
                                                <label for="frm1701:rdoPg1mOption1" style="font-size:10px;" >
                                                    A. Only one activity/project under EXEMPT and/or SPECIAL Tax Regimes, fill out the applicable columns below.
                                                </label>
                                                <br/><input type="radio" name="frm1701:rdoPg1mTYPE" id="frm1701:rdoPg1mOption2TYPE" value="2">
                                                <label for="frm1701:rdoPg1mOption2" style="font-size:10px;" >
                                                    B. Two or more activities/projects under EXEMPT and/or SPECIAL Tax Regimes, accomplish Part XI-Mandatory Attachments per activity and reflect consolidated amounts from Part XI on the corresponding columns below.
                                                </label>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--Page 1m Schedule A-->
                                    <table cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="450" class="tblFormTdPart" style=" border-top: #000000 2px solid; border-bottom: #000000 1px solid; border-right: #AAAAAA 1px solid;"><font size="2" style="font-weight:bold;">SCHEDULE A - Basis of Tax Relief </font></td>
                                            <td width="450" class="tblFormTdPart" style=" border-top: #000000 2px solid; border-bottom: #000000 1px solid; border-right: #AAAAAA 1px solid;" colspan="3" align="center"><font size="2" style="font-weight:bold;">TAXPAYER </font></td>
                                            <td width="450" class="tblFormTdPart" style=" border-top: #000000 2px solid; border-bottom: #000000 1px solid; border-right: #AAAAAA 1px solid;" colspan="3" align="center"><font size="2" style="font-weight:bold;">SPOUSE </font></td>
                                        </tr>
                                    </table>
                                    <table border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">Particular </font></td>
                                            <td width="150" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">A. Exempt </font></td>
                                            <td width="150" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">B. Special </font></td>
                                            <td width="150" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">C. Regular </font></td>
                                            <td width="150" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">D. Exempt </font></td>
                                            <td width="150" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">E. Special </font></td>
                                            <td width="150" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">F. Regular </font></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">1 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Investment Promotion Agency (IPA)/Implementing Government Entity </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI1ASchdATYPE" name="frm1701:txtPg1mI1ASchdATYPE" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI1BSchdATYPE" name="frm1701:txtPg1mI1BSchdATYPE" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI1CSchdATYPE" name="frm1701:txtPg1mI1CSchdATYPE" ></td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI1DSchdATYPE" name="frm1701:txtPg1mI1DSchdATYPE" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI1ESchdATYPE" name="frm1701:txtPg1mI1ESchdATYPE" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI1FSchdATYPE" name="frm1701:txtPg1mI1FSchdATYPE" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">2 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Legal Basis </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI2ASchdATYPE" name="frm1701:txtPg1mI2ASchdATYPE"  /></td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI2BSchdATYPE" name="frm1701:txtPg1mI2BSchdATYPE" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI2CSchdATYPE" name="frm1701:txtPg1mI2CSchdATYPE" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI2DSchdATYPE" name="frm1701:txtPg1mI2DSchdATYPE" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI2ESchdATYPE" name="frm1701:txtPg1mI2ESchdATYPE" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI2FSchdATYPE" name="frm1701:txtPg1mI2FSchdATYPE" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">3 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Registered Activity/Program (Reg. No.) </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI3ASchdATYPE" name="frm1701:txtPg1mI3ASchdATYPE" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI3BSchdATYPE" name="frm1701:txtPg1mI3BSchdATYPE" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI3CSchdATYPE" name="frm1701:txtPg1mI3CSchdATYPE" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI3DSchdATYPE" name="frm1701:txtPg1mI3DSchdATYPE" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI3ESchdATYPE" name="frm1701:txtPg1mI3ESchdATYPE" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" style="color: black; text-align: right;" size="15" maxlength="20" id="frm1701:txtPg1mI3FSchdATYPE" name="frm1701:txtPg1mI3FSchdATYPE" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">4 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Special Tax Rate </font>
                                            </td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="15" maxlength="25" id="frm1701:txtPg1mI4BSchdATYPE" name="frm1701:txtPg1mI4BSchdATYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="15" maxlength="25" id="frm1701:txtPg1mI4ESchdATYPE" name="frm1701:txtPg1mI4ESchdATYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">5 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Effectivity Date of Tax Relief/Exemption From (MM/DD/YYYY) </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15" maxlength="10" id="frm1701:txtPg1mI5ASchdATYPE" name="frm1701:txtPg1mI5ASchdATYPE" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15" maxlength="10" id="frm1701:txtPg1mI5BSchdATYPE" name="frm1701:txtPg1mI5BSchdATYPE" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15" maxlength="10" id="frm1701:txtPg1mI5CSchdATYPE" name="frm1701:txtPg1mI5CSchdATYPE" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15" maxlength="10" id="frm1701:txtPg1mI5DSchdATYPE" name="frm1701:txtPg1mI5DSchdATYPE" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15" maxlength="10" id="frm1701:txtPg1mI5ESchdATYPE" name="frm1701:txtPg1mI5ESchdATYPE" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15" maxlength="10" id="frm1701:txtPg1mI5FSchdATYPE" name="frm1701:txtPg1mI5FSchdATYPE" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">6 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Expiration Date of Tax Relief/Exemption To (MM/DD/YYYY) </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15" maxlength="10" id="frm1701:txtPg1mI6ASchdATYPE" name="frm1701:txtPg1mI6ASchdATYPE" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15" maxlength="10" id="frm1701:txtPg1mI6BSchdATYPE" name="frm1701:txtPg1mI6BSchdATYPE" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15" maxlength="10" id="frm1701:txtPg1mI6CSchdATYPE" name="frm1701:txtPg1mI6CSchdATYPE" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15" maxlength="10" id="frm1701:txtPg1mI6DSchdATYPE" name="frm1701:txtPg1mI6DSchdATYPE" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15" maxlength="10" id="frm1701:txtPg1mI6ESchdATYPE" name="frm1701:txtPg1mI6ESchdATYPE" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="" style="color: black; text-align: right;" size="15" maxlength="10" id="frm1701:txtPg1mI6FSchdATYPE" name="frm1701:txtPg1mI6FSchdATYPE" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="" /></td>
                                        </tr>
                                    </table>
                                    <!--Page 1m Schedule B-->
                                    <table cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                <div>
                                                    <font size="2" style="font-weight:bold;">SCHEDULE B - Computation of Income Tax </font>
                                                    <font style="font-size:8px;">(Do NOT enter Centavos; 49 Centavos or Less drop down; 50 or more round up) </font>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <table border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td rowspan="2" width="400" class="tblFormTD" align="center" style="border-right: #AAAAAA 1px solid;"><font size="2" style="font-weight:bold;">DESCRIPTION</font></td>
                                            <td colspan="4" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">TAXPAYER/FILER</font></td>
                                            <td colspan="4" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">SPOUSE</font></td>
                                        </tr>
                                        <tr>
                                            <td width="112" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">A.Total Exempt</font></td>
                                            <td width="112" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">B.Total Special</font></td>
                                            <td width="112" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">C.Regular</font></td>
                                            <td width="112" class="tblFormTD" align="center">
                                                <font size="2" style="font-weight:bold;">D.Total</font>
                                                <br/><font size="1">(D=A+B+C)</font>
                                            </td>
                                            <td width="112" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">E.Total Exempt</font></td>
                                            <td width="112" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">F.Total Special</font></td>
                                            <td width="112" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">G.Regular</font></td>
                                            <td width="112" class="tblFormTD" align="center">
                                                <font size="2" style="font-weight:bold;">H.Total</font>
                                                <br/><font size="1">(H=E+F+G)</font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">1 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Sales/Revenues/Receipts/Fees (<span style="font-weight:bold;">EXEMPT/SPECIAL:</span> If letter B of instructions 
                                                    <br/>above is marked, from All of Part XI Schedule B Item 1A/1B)
                                                    <br/>(<span style="font-weight:bold;">REGULAR:</span> From Part V Sched 3.A Item 8A/8B) </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI1ASchdBTYPE" name="frm1701:txtPg1mI1ASchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI1BSchdBTYPE" name="frm1701:txtPg1mI1BSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI1CSchdBTYPE" name="frm1701:txtPg1mI1CSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI1DSchdBTYPE" name="frm1701:txtPg1mI1DSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI1ESchdBTYPE" name="frm1701:txtPg1mI1ESchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI1FSchdBTYPE" name="frm1701:txtPg1mI1FSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI1GSchdBTYPE" name="frm1701:txtPg1mI1GSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI1HSchdBTYPE" name="frm1701:txtPg1mI1HSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">2 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Less: Sales Retunrs, Allowances & Discounts (<span style="font-weight:bold;">EXEMPT/SPECIAL:</span> If letter B of 
                                                    <br/>instructions above is marked, from All of Part XI Schedule B Item 2A/2B)
                                                    <br/>(<span style="font-weight:bold;">REGULAR:</span> From Part V Sched 3.A Item 9A/9B) </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI2ASchdBTYPE" name="frm1701:txtPg1mI2ASchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI2BSchdBTYPE" name="frm1701:txtPg1mI2BSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI2CSchdBTYPE" name="frm1701:txtPg1mI2CSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI2DSchdBTYPE" name="frm1701:txtPg1mI2DSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI2ESchdBTYPE" name="frm1701:txtPg1mI2ESchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI2FSchdBTYPE" name="frm1701:txtPg1mI2FSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI2GSchdBTYPE" name="frm1701:txtPg1mI2GSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI2HSchdBTYPE" name="frm1701:txtPg1mI2HSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">3 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Net Sales/Revenues/Receipts/Fees (Item 1 Less Item 2) </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI3ASchdBTYPE" name="frm1701:txtPg1mI3ASchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI3BSchdBTYPE" name="frm1701:txtPg1mI3BSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI3CSchdBTYPE" name="frm1701:txtPg1mI3CSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI3DSchdBTYPE" name="frm1701:txtPg1mI3DSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI3ESchdBTYPE" name="frm1701:txtPg1mI3ESchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI3FSchdBTYPE" name="frm1701:txtPg1mI3FSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI3GSchdBTYPE" name="frm1701:txtPg1mI3GSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI3HSchdBTYPE" name="frm1701:txtPg1mI3HSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">4 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Less: Cost of Sales/Services (<span style="font-weight:bold;">EXEMPT/SPECIAL:</span> If letter B of instructions 
                                                    <br/>above is marked, from All of Part XI Schedule B Item 4A/4B)
                                                    <br/>(<span style="font-weight:bold;">REGULAR:</span> From Part V Sched 3.A Item 11A/11B) </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI4ASchdBTYPE" name="frm1701:txtPg1mI4ASchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI4BSchdBTYPE" name="frm1701:txtPg1mI4BSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI4CSchdBTYPE" name="frm1701:txtPg1mI4CSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI4DSchdBTYPE" name="frm1701:txtPg1mI4DSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI4ESchdBTYPE" name="frm1701:txtPg1mI4ESchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI4FSchdBTYPE" name="frm1701:txtPg1mI4FSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI4GSchdBTYPE" name="frm1701:txtPg1mI4GSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI4HSchdBTYPE" name="frm1701:txtPg1mI4HSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">5 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Gross/Income(Loss) from Operation (Item 3 Less Item 4) </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI5ASchdBTYPE" name="frm1701:txtPg1mI5ASchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI5BSchdBTYPE" name="frm1701:txtPg1mI5BSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI5CSchdBTYPE" name="frm1701:txtPg1mI5CSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI5DSchdBTYPE" name="frm1701:txtPg1mI5DSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI5ESchdBTYPE" name="frm1701:txtPg1mI5ESchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI5FSchdBTYPE" name="frm1701:txtPg1mI5FSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI5GSchdBTYPE" name="frm1701:txtPg1mI5GSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI5HSchdBTYPE" name="frm1701:txtPg1mI5HSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="9"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;Less: Deductions Allowable under Existing Laws</font></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">6 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Ordinary Allwable Itemized Deductions [<span style="font-weight:bold;">EXEMPT/SPECIAL:</span> 
                                                    <br/>(From Schedule C Item 18) and/or (If letter B of instructions above is marked, 
                                                    <br/>from All of Part XI Schedule B Item 6A/6B)]
                                                    <br/>(<span style="font-weight:bold;">REGULAR:</span> From Part V Sched 3.A Item 13A/13B) </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI6ASchdBTYPE" name="frm1701:txtPg1mI6ASchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI6BSchdBTYPE" name="frm1701:txtPg1mI6BSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI6CSchdBTYPE" name="frm1701:txtPg1mI6CSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI6DSchdBTYPE" name="frm1701:txtPg1mI6DSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI6ESchdBTYPE" name="frm1701:txtPg1mI6ESchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI6FSchdBTYPE" name="frm1701:txtPg1mI6FSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI6GSchdBTYPE" name="frm1701:txtPg1mI6GSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI6HSchdBTYPE" name="frm1701:txtPg1mI6HSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">7 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Special Allwable Itemized Deductions [<span style="font-weight:bold;">EXEMPT/SPECIAL:</span> 
                                                    <br/>(From Schedule D Item 5) and/or (If letter B of instructions above is marked, 
                                                    <br/>from All of Part XI Schedule B Item 7A/7B)]
                                                    <br/>(<span style="font-weight:bold;">REGULAR:</span> From Part V Sched 3.A Item 14A/14B) </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI7ASchdBTYPE" name="frm1701:txtPg1mI7ASchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI7BSchdBTYPE" name="frm1701:txtPg1mI7BSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI7CSchdBTYPE" name="frm1701:txtPg1mI7CSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI7DSchdBTYPE" name="frm1701:txtPg1mI7DSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI7ESchdBTYPE" name="frm1701:txtPg1mI7ESchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI7FSchdBTYPE" name="frm1701:txtPg1mI7FSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI7GSchdBTYPE" name="frm1701:txtPg1mI7GSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI7HSchdBTYPE" name="frm1701:txtPg1mI7HSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">8 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Allowance for Net Operating Loss Carry Over (NOLCO) 
                                                    <br/>(From Part V Sched 3.A Item 15A/15B) </font>
                                            </td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI8CSchdBTYPE" name="frm1701:txtPg1mI8CSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI8DSchdBTYPE" name="frm1701:txtPg1mI8DSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI8GSchdBTYPE" name="frm1701:txtPg1mI8GSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI8HSchdBTYPE" name="frm1701:txtPg1mI8HSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">9 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Total Allowable Itemized Deductions (Sum of Items 6 to 8) </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI9ASchdBTYPE" name="frm1701:txtPg1mI9ASchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI9BSchdBTYPE" name="frm1701:txtPg1mI9BSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI9CSchdBTYPE" name="frm1701:txtPg1mI9CSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI9DSchdBTYPE" name="frm1701:txtPg1mI9DSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI9ESchdBTYPE" name="frm1701:txtPg1mI9ESchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI9FSchdBTYPE" name="frm1701:txtPg1mI9FSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI9GSchdBTYPE" name="frm1701:txtPg1mI9GSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI9HSchdBTYPE" name="frm1701:txtPg1mI9HSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td align="center"><font size="2" style="font-weight:bold;">OR </font></td>
                                            <td colspan="8">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">10 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Optional Standard Deduction (OSD) (40% of Item 3) </font>
                                            </td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI10CSchdBTYPE" name="frm1701:txtPg1mI10CSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI10DSchdBTYPE" name="frm1701:txtPg1mI10DSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI10GSchdBTYPE" name="frm1701:txtPg1mI10GSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI10HSchdBTYPE" name="frm1701:txtPg1mI10HSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">11 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Net Income/(Loss) (<span style="font-weight:bold;">If Itemized:</span> Item 5 less Item 9;<span style="font-weight:bold;"> If OSD:</span> Item 3 Less Item 10) </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI11ASchdBTYPE" name="frm1701:txtPg1mI11ASchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI11BSchdBTYPE" name="frm1701:txtPg1mI11BSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI11CSchdBTYPE" name="frm1701:txtPg1mI11CSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI11DSchdBTYPE" name="frm1701:txtPg1mI11DSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI11ESchdBTYPE" name="frm1701:txtPg1mI11ESchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI11FSchdBTYPE" name="frm1701:txtPg1mI11FSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI11GSchdBTYPE" name="frm1701:txtPg1mI11GSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI11HSchdBTYPE" name="frm1701:txtPg1mI11HSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="9" class="tblFormTD">
                                                <font size="1" face="Arial, Helvetica, sans-serif">&nbsp;Add: Other Non-Operating Income (specify below) (<span style="font-weight:bold;">EXEMPT/SPECIAL:</span> If letter B of instructions above is marked,
                                                    from all of Part XI Schedule B Items 10A/10B and 11A/11B)(<span style="font-weight:bold;">REGULAR:</span> From Part V Schedule 3.A Items 19A/19B and 20A/20B) </font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">12 </font>
                                                <input type="text" value="" maxlength="50" size="30" id="frm1701:txtPg1mI12DescSchdBTYPE" name="frm1701:txtPg1mI12DescSchdBTYPE" onblur="" />
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI12ASchdBTYPE" name="frm1701:txtPg1mI12ASchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI12BSchdBTYPE" name="frm1701:txtPg1mI12BSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI12CSchdBTYPE" name="frm1701:txtPg1mI12CSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI12DSchdBTYPE" name="frm1701:txtPg1mI12DSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI12ESchdBTYPE" name="frm1701:txtPg1mI12ESchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI12FSchdBTYPE" name="frm1701:txtPg1mI12FSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI12GSchdBTYPE" name="frm1701:txtPg1mI12GSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI12HSchdBTYPE" name="frm1701:txtPg1mI12HSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">13 </font>
                                                <input type="text" value="" maxlength="50" size="30" id="frm1701:txtPg1mI13DescSchdBTYPE" name="frm1701:txtPg1mI13DescSchdBTYPE" onblur="" />
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI13ASchdBTYPE" name="frm1701:txtPg1mI13ASchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI13BSchdBTYPE" name="frm1701:txtPg1mI13BSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI13CSchdBTYPE" name="frm1701:txtPg1mI13CSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI13DSchdBTYPE" name="frm1701:txtPg1mI13DSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI13ESchdBTYPE" name="frm1701:txtPg1mI13ESchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI13FSchdBTYPE" name="frm1701:txtPg1mI13FSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI13GSchdBTYPE" name="frm1701:txtPg1mI13GSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI13HSchdBTYPE" name="frm1701:txtPg1mI13HSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">14 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Amount Received/Share in Income by a Partner from a GPP 
                                                    <br/>(From Part V Schedule 3.A Item 21A/21B) </font>
                                            </td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI14CSchdBTYPE" name="frm1701:txtPg1mI14CSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI14DSchdBTYPE" name="frm1701:txtPg1mI14DSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                            <td class="tblFormTD" align="center">&nbsp;</td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI14GSchdBTYPE" name="frm1701:txtPg1mI14GSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI14HSchdBTYPE" name="frm1701:txtPg1mI14HSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">15 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Total Other Non-Operating Income (Sum of Items 12 to 14) </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI15ASchdBTYPE" name="frm1701:txtPg1mI15ASchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI15BSchdBTYPE" name="frm1701:txtPg1mI15BSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI15CSchdBTYPE" name="frm1701:txtPg1mI15CSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI15DSchdBTYPE" name="frm1701:txtPg1mI15DSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI15ESchdBTYPE" name="frm1701:txtPg1mI15ESchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI15FSchdBTYPE" name="frm1701:txtPg1mI15FSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI15GSchdBTYPE" name="frm1701:txtPg1mI15GSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI15HSchdBTYPE" name="frm1701:txtPg1mI15HSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">16 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Total Taxable Income/(Loss) (Sum of Items 11 and 15) </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI16ASchdBTYPE" name="frm1701:txtPg1mI16ASchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI16BSchdBTYPE" name="frm1701:txtPg1mI16BSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI16CSchdBTYPE" name="frm1701:txtPg1mI16CSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI16DSchdBTYPE" name="frm1701:txtPg1mI16DSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI16ESchdBTYPE" name="frm1701:txtPg1mI16ESchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI16FSchdBTYPE" name="frm1701:txtPg1mI16FSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI16GSchdBTYPE" name="frm1701:txtPg1mI16GSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI16HSchdBTYPE" name="frm1701:txtPg1mI16HSchdBTYPE" onblur="round(this,2);" onkeypress="return negativeNumbers(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">17 </font>
                                                <font size="1" style="font-weight:bold;">TAX DUE -</font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">[<span style="font-weight:bold;">EXEMPT:</span> (Item 16A/16E x 0%) and/or (From all of Part XI 
                                                    <br/>Schedule B Item 15)]; [<span style="font-weight:bold;">SPECIAL:</span> (Item 5B/5F x applicable income tax rate) and/or 
                                                    <br/>(From all of Part XI Schedule B Item 15)]; <span style="font-weight:bold;">REGULAR:</span> (From Part V Item 31) </font>
                                            </td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI17ASchdBTYPE" name="frm1701:txtPg1mI17ASchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI17BSchdBTYPE" name="frm1701:txtPg1mI17BSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI17CSchdBTYPE" name="frm1701:txtPg1mI17CSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI17DSchdBTYPE" name="frm1701:txtPg1mI17DSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI17ESchdBTYPE" name="frm1701:txtPg1mI17ESchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI17FSchdBTYPE" name="frm1701:txtPg1mI17FSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI17GSchdBTYPE" name="frm1701:txtPg1mI17GSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td class="tblFormTD" align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg1mI17HSchdBTYPE" name="frm1701:txtPg1mI17HSchdBTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                    </table>
                                </div>
                                <!--Form 1701 : Attachment 2m -->
                                <div id="Page2mTYPEContent" style="position:relative; margin-left:-160px; display:none;width:140%;">
                                    <table border="1" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="120" valign="middle" style="text-align: center; background-color: white;">
                                                <font face="Arial" size="1px">BIR Form No.</font>
                                                <br/><font size="5px" style="font-weight:bold;">1701</font>
                                                <br/><font face="Arial" size="1px">January 2018 (ENCS)</font>
                                                <br/><font face="Arial" size="1px" style="font-weight:bold;">Page 2m</font>
                                            </td>
                                            <td width="0" valign="center" style="text-align: center; background-color: white;">
                                                <font size="5px" style="font-weight:bold;">Annual Income Tax Return</font>
                                                <br/><font size="2px" style="font-weight:bold;">Consolidation of ALL Activities per Tax Regime </font>
                                            </td>
                                            <td width="200" valign="center" style=" background-color: white;">
                                                    <p><img src="{{ asset('images/Bar Codes/1701_p2m.png') }}" width="220" height="75px" /> </p>
                                            </td>
                                        </tr>
                                    </table>
                                    <table border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="40%"><font size="1" face="Arial, Helvetica, sans-serif">TIN</font></td>
                                            <td width="60%"><font size="1" face="Arial, Helvetica, sans-serif">Taxpayer/Filer's Last Name</font></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <font size="2" face="Arial">
                                                    <input type="text" value="{{$company->tin1}}" size="3" maxlength="3" id="frm1701:txtPg2mTIN1" disabled />
                                                    <input type="text" value="{{$company->tin2}}" size="3" maxlength="3" id="frm1701:txtPg2mTIN2" disabled />
                                                    <input type="text" value="{{$company->tin3}}" size="3" maxlength="3" id="frm1701:txtPg2mTIN3" disabled />
                                                    <input type="text" value="{{$company->tin4}}" size="5" maxlength="5" id="frm1701:txtPg2mBranchCode" disabled />
                                                </font>
                                            </td>
                                            <?php 
                                                $lastname = explode(",", $company['registered_name'])
                                            ?>
                                            <td><input type="text" value="{{$lastname[0]}}" size="80" maxlength="50" id="frm1701:txtPg2mTaxpayerName" disabled /></td>
                                        </tr>
                                    </table>
                                    <!--Page 2m Schedule C-->
                                    <table cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                <div>
                                                    <font size="2" style="font-weight:bold;">SCHEDULE C - Ordinary Allowable Itemized Deductions (attach additional sheet/s, if necessary) </font>
                                                    <font style="font-size:8px;">(Do NOT enter Centavos; 49 Centavos or Less drop down; 50 or more round up) </font>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <table border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td rowspan="2" class="tblFormTD" align="center" style="border-right: #AAAAAA 1px solid;"><font size="2" style="font-weight:bold;">DESCRIPTION</font></td>
                                            <td colspan="2" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">TAXPAYER/FILER</font></td>
                                            <td colspan="2" class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">SPOUSE</font></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">A. EXEMPT</font></td>
                                            <td class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">B. SPECIAL</font></td>
                                            <td class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">C. EXEMPT</font></td>
                                            <td class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">D. SPECIAL</font></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">1 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Amortizations </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI1ASchdCTYPE" name="frm1701:txtPg2mI1ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI1BSchdCTYPE" name="frm1701:txtPg2mI1BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI1CSchdCTYPE" name="frm1701:txtPg2mI1CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI1DSchdCTYPE" name="frm1701:txtPg2mI1DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">2 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Bad Debts </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI2ASchdCTYPE" name="frm1701:txtPg2mI2ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI2BSchdCTYPE" name="frm1701:txtPg2mI2BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI2CSchdCTYPE" name="frm1701:txtPg2mI2CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI2DSchdCTYPE" name="frm1701:txtPg2mI2DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">3 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Charitable and Other Contributions </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI3ASchdCTYPE" name="frm1701:txtPg2mI3ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI3BSchdCTYPE" name="frm1701:txtPg2mI3BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI3CSchdCTYPE" name="frm1701:txtPg2mI3CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI3DSchdCTYPE" name="frm1701:txtPg2mI3DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">4 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Depletion </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI4ASchdCTYPE" name="frm1701:txtPg2mI4ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI4BSchdCTYPE" name="frm1701:txtPg2mI4BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI4CSchdCTYPE" name="frm1701:txtPg2mI4CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI4DSchdCTYPE" name="frm1701:txtPg2mI4DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">5 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Depreciation </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI5ASchdCTYPE" name="frm1701:txtPg2mI5ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI5BSchdCTYPE" name="frm1701:txtPg2mI5BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI5CSchdCTYPE" name="frm1701:txtPg2mI5CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI5DSchdCTYPE" name="frm1701:txtPg2mI5DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">6 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Entertainment, Amusement and Recreation </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI6ASchdCTYPE" name="frm1701:txtPg2mI6ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI6BSchdCTYPE" name="frm1701:txtPg2mI6BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI6CSchdCTYPE" name="frm1701:txtPg2mI6CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI6DSchdCTYPE" name="frm1701:txtPg2mI6DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">7 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Fringe Benefits </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI7ASchdCTYPE" name="frm1701:txtPg2mI7ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI7BSchdCTYPE" name="frm1701:txtPg2mI7BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI7CSchdCTYPE" name="frm1701:txtPg2mI7CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI7DSchdCTYPE" name="frm1701:txtPg2mI7DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">8 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Interest </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI8ASchdCTYPE" name="frm1701:txtPg2mI8ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI8BSchdCTYPE" name="frm1701:txtPg2mI8BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI8CSchdCTYPE" name="frm1701:txtPg2mI8CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI8DSchdCTYPE" name="frm1701:txtPg2mI8DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">9 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Losses </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI9ASchdCTYPE" name="frm1701:txtPg2mI9ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI9BSchdCTYPE" name="frm1701:txtPg2mI9BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI9CSchdCTYPE" name="frm1701:txtPg2mI9CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI9DSchdCTYPE" name="frm1701:txtPg2mI9DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">10 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Pension Trusts </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI10ASchdCTYPE" name="frm1701:txtPg2mI10ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI10BSchdCTYPE" name="frm1701:txtPg2mI10BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI10CSchdCTYPE" name="frm1701:txtPg2mI10CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI10DSchdCTYPE" name="frm1701:txtPg2mI10DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">11 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Rental </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI11ASchdCTYPE" name="frm1701:txtPg2mI11ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI11BSchdCTYPE" name="frm1701:txtPg2mI11BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI11CSchdCTYPE" name="frm1701:txtPg2mI11CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI11DSchdCTYPE" name="frm1701:txtPg2mI11DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">12 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Research and Development </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI12ASchdCTYPE" name="frm1701:txtPg2mI12ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI12BSchdCTYPE" name="frm1701:txtPg2mI12BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI12CSchdCTYPE" name="frm1701:txtPg2mI12CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI12DSchdCTYPE" name="frm1701:txtPg2mI12DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">13 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Salaries, Wages and Allowances </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI13ASchdCTYPE" name="frm1701:txtPg2mI13ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI13BSchdCTYPE" name="frm1701:txtPg2mI13BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI13CSchdCTYPE" name="frm1701:txtPg2mI13CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI13DSchdCTYPE" name="frm1701:txtPg2mI13DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">14 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">SSS, GSIS, Philhealth, HDMF and Other Contributions </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI14ASchdCTYPE" name="frm1701:txtPg2mI14ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI14BSchdCTYPE" name="frm1701:txtPg2mI14BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI14CSchdCTYPE" name="frm1701:txtPg2mI14CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI14DSchdCTYPE" name="frm1701:txtPg2mI14DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">15 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Taxes and Licenses </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI15ASchdCTYPE" name="frm1701:txtPg2mI15ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI15BSchdCTYPE" name="frm1701:txtPg2mI15BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI15CSchdCTYPE" name="frm1701:txtPg2mI15CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI15DSchdCTYPE" name="frm1701:txtPg2mI15DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">16 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Transportation and Travel </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI16ASchdCTYPE" name="frm1701:txtPg2mI16ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI16BSchdCTYPE" name="frm1701:txtPg2mI16BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI16CSchdCTYPE" name="frm1701:txtPg2mI16CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI16DSchdCTYPE" name="frm1701:txtPg2mI16DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">17 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Others (Deductions Subject to Withholding Tax and Other Expenses) [Specify below; Add addtional sheet/s, if necessary] </font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="1" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;a Janitorial and Messengerial services </font>       
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17aASchdCTYPE" name="frm1701:txtPg2mI17aASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17aBSchdCTYPE" name="frm1701:txtPg2mI17aBSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17aCSchdCTYPE" name="frm1701:txtPg2mI17aCSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17aDSchdCTYPE" name="frm1701:txtPg2mI17aDSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="1" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;b Professional Fees </font>       
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17bASchdCTYPE" name="frm1701:txtPg2mI17bASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17bBSchdCTYPE" name="frm1701:txtPg2mI17bBSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17bCSchdCTYPE" name="frm1701:txtPg2mI17bCSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17bDSchdCTYPE" name="frm1701:txtPg2mI17bDSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="1" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;c Security Services </font>       
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17cASchdCTYPE" name="frm1701:txtPg2mI17cASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17cBSchdCTYPE" name="frm1701:txtPg2mI17cBSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17cCSchdCTYPE" name="frm1701:txtPg2mI17cCSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17cDSchdCTYPE" name="frm1701:txtPg2mI17cDSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="1" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;d </font> 
                                                <input type="text" value="" maxlength="50" size="50" id="frm1701:txtPg2mI17dDescSchdCTYPE" name="frm1701:txtPg2mI17dDescSchdCTYPE" onblur="" />
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17dASchdCTYPE" name="frm1701:txtPg2mI17dASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17dBSchdCTYPE" name="frm1701:txtPg2mI17dBSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17dCSchdCTYPE" name="frm1701:txtPg2mI17dCSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI17dDSchdCTYPE" name="frm1701:txtPg2mI17dDSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">18 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Total Ordinary Allowable Itemized Deductions (Sum of Items 1 to 17d)(To Part X Schedule B Item 6) </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI18ASchdCTYPE" name="frm1701:txtPg2mI18ASchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI18BSchdCTYPE" name="frm1701:txtPg2mI18BSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI18CSchdCTYPE" name="frm1701:txtPg2mI18CSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="12" maxlength="25" id="frm1701:txtPg2mI18DSchdCTYPE" name="frm1701:txtPg2mI18DSchdCTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                    </table>
                                    <!--Page 2m Schedule D-->
                                    <table cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                <div>
                                                    <font size="2" style="font-weight:bold;">SCHEDULE D - Special Allowable Itemized Deductions (attach additional sheet/s, if necessary) </font>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <table border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">DESCRIPTION</font></td>
                                            <td class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">LEGAL BASIS</font></td>
                                            <td class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">A. TAXPAYER/FILER</font></td>
                                            <td class="tblFormTD" align="center"><font size="2" style="font-weight:bold;">B. SPOUSE</font></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">1 </font>
                                                <input type="text" value="" maxlength="50" size="70" id="frm1701:txtPg2mI1DescSchdDTYPE" name="frm1701:txtPg2mI1DescSchdDTYPE" onblur="" />
                                            </td>
                                            <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="20" id="frm1701:txtPg2mI1LBSchdDTYPE" name="frm1701:txtPg2mI1LBSchdDTYPE" onblur="" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701:txtPg2mI1ASchdDTYPE" name="frm1701:txtPg2mI1ASchdDTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701:txtPg2mI1BSchdDTYPE" name="frm1701:txtPg2mI1BSchdDTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">2 </font>
                                                <input type="text" value="" maxlength="50" size="70" id="frm1701:txtPg2mI2DescSchdDTYPE" name="frm1701:txtPg2mI2DescSchdDTYPE" onblur="" />
                                            </td>
                                            <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="20" id="frm1701:txtPg2mI2LBSchdDTYPE" name="frm1701:txtPg2mI2LBSchdDTYPE" onblur="" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701:txtPg2mI2ASchdDTYPE" name="frm1701:txtPg2mI2ASchdDTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701:txtPg2mI2BSchdDTYPE" name="frm1701:txtPg2mI2BSchdDTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">3 </font>
                                                <input type="text" value="" maxlength="50" size="70" id="frm1701:txtPg2mI3DescSchdDTYPE" name="frm1701:txtPg2mI3DescSchdDTYPE" onblur="" />
                                            </td>
                                            <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="20" id="frm1701:txtPg2mI3LBSchdDTYPE" name="frm1701:txtPg2mI3LBSchdDTYPE" onblur="" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701:txtPg2mI3ASchdDTYPE" name="frm1701:txtPg2mI3ASchdDTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701:txtPg2mI3BSchdDTYPE" name="frm1701:txtPg2mI3BSchdDTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">4 </font>
                                                <input type="text" value="" maxlength="50" size="70" id="frm1701:txtPg2mI4DescSchdDTYPE" name="frm1701:txtPg2mI4DescSchdDTYPE" onblur="" />
                                            </td>
                                            <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="20" maxlength="20" id="frm1701:txtPg2mI4LBSchdDTYPE" name="frm1701:txtPg2mI4LBSchdDTYPE" onblur="" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701:txtPg2mI4ASchdDTYPE" name="frm1701:txtPg2mI4ASchdDTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701:txtPg2mI4BSchdDTYPE" name="frm1701:txtPg2mI4BSchdDTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tblFormTD">
                                                <font size="2" style="font-weight:bold;">5 </font>
                                                <font size="1" face="Arial, Helvetica, sans-serif">Total Special Allowable Itemized Deductions (Sum of Items 1 to 4)(To Part X Schedule B Item 7) </font>
                                            </td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701:txtPg2mI5ASchdDTYPE" name="frm1701:txtPg2mI5ASchdDTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701:txtPg2mI5BSchdDTYPE" name="frm1701:txtPg2mI5BSchdDTYPE" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" /></td>
                                        </tr>
                                    </table>
                                    <!--CONTENT HERE-->
            
                                </div>
                                <!--Form 1701 : Attachment 3m -->
                                <div id="Page3mTYPEContent" style="display: none">
                                    <table width="800" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td>
                                                <table width="800" border="1" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="120" valign="middle" style="text-align: center;">
                                                            <font face="Arial" size="1px">BIR Form No.</font>
                                                            <br/><font size="5px" style="font-weight:bold;">1701</font>
                                                            <br/><font face="Arial" size="1px">January 2018 (ENCS)</font>
                                                            <br/><font face="Arial" size="1px" style="font-weight:bold;">Page 3m</font>
                                                        </td>
                                                        <td width="0" valign="center" style="text-align: center;">
                                                            <font size="5px" style="font-weight:bold;">Annual Income Tax Return</font>
                                                            <br/><font size="2px" style="font-weight:bold;">Mandatory Attachments Per Activity</font>
                                                        </td>
                                                        <td width="200" valign="center">
                                                                <p><img src="{{ asset('images/Bar Codes/1701_p3m.png') }}" width="220" height="75px" /> </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td width="40%"><font size="1" face="Arial, Helvetica, sans-serif">TIN</font></td>
                                                        <td width="60%"><font size="1" face="Arial, Helvetica, sans-serif">Taxpayer/Filer's Last Name</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{$company->tin1}}" size="2" maxlength="3" id="frm1701:txtPg3mTIN1" disabled />
                                                                <input type="text" value="{{$company->tin2}}" size="2" maxlength="3" id="frm1701:txtPg3mTIN2" disabled />
                                                                <input type="text" value="{{$company->tin3}}" size="2" maxlength="3" id="frm1701:txtPg3mTIN3" disabled />
                                                                <input type="text" value="{{$company->tin4}}" size="2" maxlength="5" id="frm1701:txtPg3mBranchCode" disabled />
                                                            </font>
                                                        </td>
                                                        <?php 
                                                            $lastname = explode(",", $company['registered_name'])
                                                        ?>
                                                        <td><input type="text" value="{{$lastname[0]}}" size="80" maxlength="50" id="frm1701:txtPg3mTaxpayerName" disabled /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--CONTENT HERE START Attachment 3m-->
                                      <tr>
                                        <td>
                                          <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                              <td colspan="4" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                <div align="center">
                                                  <font size="2" style="font-weight:bold;">
                                                    Part XI - Mandatory Attachment per Activity 
                                                    <i>(If  with more than 1 activity per Tax Regime)</i> 
                                                  </font>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td width="35%">
                                                <div align="left">
                                                  <font size="2" style="font-weight:bold;">Mark "X" the applicable Tax Regime
                                                  </font>
                                                </div>
                                              </td>
                                              <td width="20%">
                                                <div align="left">
                                                  <input type="radio" value="Exempt" class="styled" name="frm1701:Pg3mTaxRegimeTYPE" id="frm1701:rdoPg3mExemptTYPE" >
                                                  <font size="2" style="font-weight:bold;">Exempt</font>&nbsp;
                                                </div>
                                              </td>
                                              <td width="20%">
                                                <div align="left">
                                                  <input type="radio" value="SpecialRate" class="styled" name="frm1701:Pg3mTaxRegimeTYPE" id="frm1701:rdoPg1mSpecialRateTYPE" >
                                                  <font size="2" style="font-weight:bold;">Special Rate</font>
                                                </div>
                                              </td>
                                              <td width="25%">
                                              </td>
                                            </tr>
                                            <tr>
                                              <td colspan="4" style="border-bottom: #000000 2px solid;">
                                                <div align="center">
                                                  <font size="1">
                                                    <b>If there are two or more activities/projects under Exempt and/or Special Tax Regimes,
                                                    accomplish Part XI-Mandatory Attachments per Activity.</b>
                                                  </font>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td colspan="4">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                  <tr>
                                                    <td class="tblFormTdPart">
                                                      <table width="100%" style="height: 22px" border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <td>
                                                            <div align="left">
                                                              <font style="font-weight:bold;">Schedule A - Activity Profile for 
                                                                Tax Relief Under Special Law/International Tax Treaty</font><br />
                                                            </div>
                                                          </td>
                                                        </tr>
                                                        <tr>
                                                          <td> 
                                                            <div align="center">
                                                              <font size="1.5"><i>(Accomplish the Mandatory Attachments for each activity, as applicable)</i></font>
                                                            </div>
                                                          </td>
                                                          <td width="30%">
                                                          </td>
                                                        </tr>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 2px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="50%">
                                                      <div align="center">
                                                        <font size="2">
                                                          <b>Description</b>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="25%">
                                                      <div align="center">
                                                        <font size="2">
                                                          <b>A. Taxpayer/Filer</b>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="25%">
                                                      <div align="center">
                                                        <font size="2">
                                                          <b>B. Spouse</b>
                                                        </font>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>1</b>&nbsp;Investment Promotion Agency (IPA)/Implementing Government Entity
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" style="color: black; text-align: right;" size="20" maxlength="20" name="frm1701:txtPg3mSchedA_1ATYPE" id="frm1701:txtPg3mSchedA_1ATYPE" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" style="color: black; text-align: right;" size="20" maxlength="20" name="frm1701:txtPg3mSchedA_1BTYPE" id="frm1701:txtPg3mSchedA_1BTYPE" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>2</b>&nbsp;Legal Basis
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" style="color: black; text-align: right;" size="20" maxlength="20" name="frm1701:txtPg3mSchedA_2ATYPE" id="frm1701:txtPg3mSchedA_2ATYPE" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" style="color: black; text-align: right;" size="20" maxlength="20" name="frm1701:txtPg3mSchedA_2BTYPE" id="frm1701:txtPg3mSchedA_2BTYPE" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>3</b>&nbsp;Registered Activity/Program (Registration No.)
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" style="color: black; text-align: right;" size="20" maxlength="20" name="frm1701:txtPg3mSchedA_3ATYPE" id="frm1701:txtPg3mSchedA_3ATYPE" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" style="color: black; text-align: right;" size="20" maxlength="20" name="frm1701:txtPg3mSchedA_3BTYPE" id="frm1701:txtPg3mSchedA_3BTYPE" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>4</b>&nbsp;Tax Rate
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="00.0" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedA_4ATYPE" id="frm1701:txtPg3mSchedA_4ATYPE" />%
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="00.0" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedA_4BTYPE" id="frm1701:txtPg3mSchedA_4BTYPE" />%
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>5</b>&nbsp;Effectivity Date of Tax Relief/Exemption [From <i>(MM/DD/YYYY)</i>]
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" style="color: black; text-align: right;" size="20" maxlength="10" name="frm1701:txtPg3mSchedA_5ATYPE" id="frm1701:txtPg3mSchedA_5ATYPE"
                                                        onkeydown="dateMasking(this);"
                                                        onkeypress="return dateOnly(event, false);" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" style="color: black; text-align: right;" size="20" maxlength="10" name="frm1701:txtPg3mSchedA_5BTYPE" id="frm1701:txtPg3mSchedA_5BTYPE"
                                                        onkeydown="dateMasking(this);"
                                                        onkeypress="return dateOnly(event, false);" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid; border-bottom: #000000 2px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>6</b>&nbsp;Expiration Date of Tax Relief/Exemption [To <i>(MM/DD/YYYY)</i>]
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" style="color: black; text-align: right;" size="20" maxlength="10" name="frm1701:txtPg3mSchedA_6ATYPE" id="frm1701:txtPg3mSchedA_6ATYPE"
                                                        onkeydown="dateMasking(this);"
                                                        onkeypress="return dateOnly(event, false);"/>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" style="color: black; text-align: right;" size="20" maxlength="10" name="frm1701:txtPg3mSchedA_6BTYPE" id="frm1701:txtPg3mSchedA_6BTYPE"
                                                        onkeydown="dateMasking(this);"
                                                        onkeypress="return dateOnly(event, false);"/>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td colspan="4">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                  <tr>
                                                    <td class="tblFormTdPart">
                                                      <table width="100%" style="height: 22px" border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <td>
                                                            <div align="left">
                                                              <font style="font-weight:bold;">Schedule B - Computation of Income Tax</font><br />
                                                            </div>
                                                          </td>
                                                          <td>
                                                            <div align="right">
                                                              <font size="1">
                                                                <i>DO NOT enter Centavos; 49 Centavos or Less drop down; 50 or more round up)</i>
                                                              </font><br />
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
                                              <td style="border-top: #000000 2px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="50%">
                                                      <div align="center">
                                                        <font size="2">
                                                          <b>Description</b>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="25%">
                                                      <div align="center">
                                                        <font size="2">
                                                          <b>A. Taxpayer/Filer</b>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="25%">
                                                      <div align="center">
                                                        <font size="2">
                                                          <b>B. Spouse</b>
                                                        </font>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>1</b>&nbsp;Sales/Receipts/Revenues/Fees <i>(To Part X Item 1)</i>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_1ATYPE" id="frm1701:txtPg3mSchedB_1ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_1BTYPE" id="frm1701:txtPg3mSchedB_1BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>2</b>&nbsp;Less: Sales Returns, Allowances and Discounts <i>(To Part X Item 2)</i>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_2ATYPE" id="frm1701:txtPg3mSchedB_2ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_2BTYPE" id="frm1701:txtPg3mSchedB_2BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>3</b>&nbsp;Net: Sales/Receipts/Revenues/Fees <i>(Item 1 Less Item 2)</i>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_3ATYPE" id="frm1701:txtPg3mSchedB_3ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_3BTYPE" id="frm1701:txtPg3mSchedB_3BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>4</b>&nbsp;Less: Cost of Sales/Services <i>(To Part X Item 3)</i>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_4ATYPE" id="frm1701:txtPg3mSchedB_4ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_4BTYPE" id="frm1701:txtPg3mSchedB_4BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>5</b>&nbsp;Gross Income/(Loss) from Operation <i>(Item 3 Less Item 4)</i>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_5ATYPE" id="frm1701:txtPg3mSchedB_5ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return negativeNumbers(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_5BTYPE" id="frm1701:txtPg3mSchedB_5BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return negativeNumbers(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="50%">
                                                      <div>
                                                        <font size="2">
                                                          Less: Deductions Allowable under Existing Laws
                                                        </font>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="1">
                                                          <b>6</b>&nbsp;Ordinary Allowable Itemized Deductions <i>(From Schedule C Item 18) (To Part X Item 6)</i>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_6ATYPE" id="frm1701:txtPg3mSchedB_6ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_6BTYPE" id="frm1701:txtPg3mSchedB_6BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="1">
                                                          <b>7</b>&nbsp;Special Allowable Itemized Deductions <i>(From Schedule D Item 5 &/or Item 10) (To Part X Item 7)</i>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_7ATYPE" id="frm1701:txtPg3mSchedB_7ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_7BTYPE" id="frm1701:txtPg3mSchedB_7BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>8</b>&nbsp;Total Itemized Deductions <i>(Sum of Items 6 and 7)</i>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_8ATYPE" id="frm1701:txtPg3mSchedB_8ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_8BTYPE" id="frm1701:txtPg3mSchedB_8BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>9</b>&nbsp;Net Income/(Loss) <i>(Item 5 Less Item 8)</i>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_9ATYPE" id="frm1701:txtPg3mSchedB_9ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return negativeNumbers(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_9BTYPE" id="frm1701:txtPg3mSchedB_9BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return negativeNumbers(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="50%">
                                                      <div>
                                                        <font size="2">
                                                          Add: Other Non-Operating Income <i>(specify below) (To Part X Items 12 and 13)</i>
                                                        </font>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>10</b>&nbsp;
                                                          <input type="text" style="color: black; text-align: right;" size="50" maxlength="25" name="frm1701:txtPg3mSchedB_10TYPE" id="frm1701:txtPg3mSchedB_10TYPE" />
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_10ATYPE" id="frm1701:txtPg3mSchedB_10ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_10BTYPE" id="frm1701:txtPg3mSchedB_10BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>11</b>&nbsp;
                                                          <input type="text" style="color: black; text-align: right;" size="50" maxlength="25" name="frm1701:txtPg3mSchedB_11TYPE" id="frm1701:txtPg3mSchedB_11TYPE" />
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_11ATYPE" id="frm1701:txtPg3mSchedB_11ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_11BTYPE" id="frm1701:txtPg3mSchedB_11BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>12</b>&nbsp;Total Other Non-Operating Income <i>(Sum of Items 10 and 11)</i>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_12ATYPE" id="frm1701:txtPg3mSchedB_12ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_12BTYPE" id="frm1701:txtPg3mSchedB_12BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>13</b>&nbsp;Total Taxable Income/(Loss) <i>(Sum of Items 9 and 12)</i>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_13ATYPE" id="frm1701:txtPg3mSchedB_13ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return negativeNumbers(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_13BTYPE" id="frm1701:txtPg3mSchedB_13BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return negativeNumbers(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>14</b>&nbsp;Applicable Income Tax Rate
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="00.0" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_14ATYPE" id="frm1701:txtPg3mSchedB_14ATYPE" />%
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="00.0" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_14BTYPE" id="frm1701:txtPg3mSchedB_14BTYPE" />%
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid; border-bottom: #000000 2px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="1">
                                                          <b>15 Tax Due</b>&nbsp;<i>[<b>Special:</b> (Item 5 X Item 14)][<b>Exempt:</b> Item 13 X Item 14 (0%)] (To Part X Item 17)</i>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_15ATYPE" id="frm1701:txtPg3mSchedB_15ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedB_15BTYPE" id="frm1701:txtPg3mSchedB_15BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td colspan="4">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                  <tr>
                                                    <td class="tblFormTdPart">
                                                      <table width="100%" style="height: 22px" border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <td>
                                                            <div align="left">
                                                              <font style="font-weight:bold;">Schedule C - Ordinary Allowable Itemized Deductions </font>
                                                              <font size="1"><i>(attach additional sheet/s, if necessary)</i></font><br />
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
                                              <td style="border-top: #000000 2px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="50%">
                                                      <div align="center">
                                                        <font size="2">
                                                          <b>Description</b>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="25%">
                                                      <div align="center">
                                                        <font size="2">
                                                          <b>A. Taxpayer/Filer</b>
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="25%">
                                                      <div align="center">
                                                        <font size="2">
                                                          <b>B. Spouse</b>
                                                        </font>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>1</b>&nbsp;Amortizations
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedC_1ATYPE" id="frm1701:txtPg3mSchedC_1ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedC_1BTYPE" id="frm1701:txtPg3mSchedC_1BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>2</b>&nbsp;Bad Debts
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedC_2ATYPE" id="frm1701:txtPg3mSchedC_2ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedC_2BTYPE" id="frm1701:txtPg3mSchedC_2BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="border-top: #000000 1px solid;" colspan="4">
                                                <table>
                                                  <tr>
                                                    <td width="52%">
                                                      <div>
                                                        <font size="2">
                                                          <b>3</b>&nbsp;Charitable and Other Contributions
                                                        </font>
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedC_3ATYPE" id="frm1701:txtPg3mSchedC_3ATYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                    <td width="24%">
                                                      <div align="center">
                                                        <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg3mSchedC_3BTYPE" id="frm1701:txtPg3mSchedC_3BTYPE"
                                                        onblur="round(this,2);" 
                                                        onkeypress="return wholenumber(this, event)" />
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                <!--CONTENT HERE END Attachment 3m-->
                                    </table>
                                </div>
                                <!--Form 1701 : Attachment 4m -->
                                <div id="Page4mTYPEContent" style="display: none">
                                    <table width="800" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td>
                                                <table width="800" border="1" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="120" valign="middle" style="text-align: center;">
                                                            <font face="Arial" size="1px">BIR Form No.</font>
                                                            <br/><font size="5px" style="font-weight:bold;">1701</font>
                                                            <br/><font face="Arial" size="1px">January 2018 (ENCS)</font>
                                                            <br/><font face="Arial" size="1px" style="font-weight:bold;">Page 4m</font>
                                                        </td>
                                                        <td width="0" valign="center" style="text-align: center;">
                                                            <font size="5px" style="font-weight:bold;">Annual Income Tax Return</font>
                                                            <br/><font size="2px" style="font-weight:bold;">Mandatory Attachments Per Activity</font>
                                                        </td>
                                                        <td width="200" valign="center">
                                                                <p><img src="{{ asset('images/Bar Codes/1701_p4m.png') }}" width="220" height="75px" /> </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td width="40%"><font size="1" face="Arial, Helvetica, sans-serif">TIN</font></td>
                                                        <td width="60%"><font size="1" face="Arial, Helvetica, sans-serif">Taxpayer/Filer's Last Name</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{$company->tin1}}" size="2" maxlength="3" id="frm1701:txtPg4mTIN1" disabled />
                                                                <input type="text" value="{{$company->tin2}}" size="2" maxlength="3" id="frm1701:txtPg4mTIN2" disabled />
                                                                <input type="text" value="{{$company->tin3}}" size="2" maxlength="3" id="frm1701:txtPg4mTIN3" disabled />
                                                                <input type="text" value="{{$company->tin4}}" size="2" maxlength="5" id="frm1701:txtPg4mBranchCode" disabled />
                                                            </font>
                                                        </td>
                                                        <?php 
                                                            $lastname = explode(",", $company['registered_name'])
                                                        ?>

                                                        <td><input type="text" value="{{$lastname[0]}}" size="80" maxlength="50" id="frm1701:txtPg4mTaxpayerName" disabled /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--CONTENT HERE START Attachment 4m-->
                                        <tr>
                                          <td colspan="4">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                              <tr>
                                                <td class="tblFormTdPart">
                                                  <table width="100%" style="height: 22px" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td>
                                                        <div align="left">
                                                          <font style="font-weight:bold;">
                                                            <i>Continuation of Schedule C</i>
                                                          </font><br />
                                                        </div>
                                                      </td>
                                                      <td>
                                                        <div align="right">
                                                          <font size="1">
                                                            <i>DO NOT enter Centavos; 49 Centavos or Less drop down; 50 or more round up)</i>
                                                          </font><br />
                                                        </div>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 2px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="50%">
                                                              <div align="center">
                                                                <font size="2">
                                                                  <b>Description</b>
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="25%">
                                                              <div align="center">
                                                                <font size="2">
                                                                  <b>A. Taxpayer/Filer</b>
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="25%">
                                                              <div align="center">
                                                                <font size="2">
                                                                  <b>B. Spouse</b>
                                                                </font>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>4</b>&nbsp;Depletion
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_4ATYPE" id="frm1701:txtPg4mSchedC_4ATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_4BTYPE" id="frm1701:txtPg4mSchedC_4BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>5</b>&nbsp;Depreciation
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_5ATYPE" id="frm1701:txtPg4mSchedC_5ATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_5BTYPE" id="frm1701:txtPg4mSchedC_5BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>6</b>&nbsp;Entertainment, Amusement and Recreation
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_6ATYPE" id="frm1701:txtPg4mSchedC_6ATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_6BTYPE" id="frm1701:txtPg4mSchedC_6BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>7</b>&nbsp;Fringe Benefits
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_7ATYPE" id="frm1701:txtPg4mSchedC_7ATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_7BTYPE" id="frm1701:txtPg4mSchedC_7BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>8</b>&nbsp;Interest
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_8ATYPE" id="frm1701:txtPg4mSchedC_8ATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_8BTYPE" id="frm1701:txtPg4mSchedC_8BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>9</b>&nbsp;Losses
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_9ATYPE" id="frm1701:txtPg4mSchedC_9ATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_9BTYPE" id="frm1701:txtPg4mSchedC_9BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>10</b>&nbsp;Pension Trusts
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_10ATYPE" id="frm1701:txtPg4mSchedC_10ATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_10BTYPE" id="frm1701:txtPg4mSchedC_10BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>11</b>&nbsp;Rental
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_11ATYPE" id="frm1701:txtPg4mSchedC_11ATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_11BTYPE" id="frm1701:txtPg4mSchedC_11BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>12</b>&nbsp;Research and Development
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_12ATYPE" id="frm1701:txtPg4mSchedC_12ATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_12BTYPE" id="frm1701:txtPg4mSchedC_12BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>13</b>&nbsp;Salaries, Wages and Allowances
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_13ATYPE" id="frm1701:txtPg4mSchedC_13ATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_13BTYPE" id="frm1701:txtPg4mSchedC_13BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>14</b>&nbsp;SSS, GSIS, Philhealth, HDMF and Other Contributions
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_14ATYPE" id="frm1701:txtPg4mSchedC_14ATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_14BTYPE" id="frm1701:txtPg4mSchedC_14BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>15</b>&nbsp;Taxes and Licenses
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_15ATYPE" id="frm1701:txtPg4mSchedC_15ATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_15BTYPE" id="frm1701:txtPg4mSchedC_15BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>16</b>&nbsp;Transportation and Travel
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_16ATYPE" id="frm1701:txtPg4mSchedC_16ATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_16BTYPE" id="frm1701:txtPg4mSchedC_16BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="50%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>17</b>&nbsp;Others (Deductions Subject to Withholding Tax and Other Expenses) <i>[Specify below; Add additional sheet(s), if necessary]</i>
                                                                </font>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a&nbsp;&nbsp;Janitorial and Messengerial Services
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_17aATYPE" id="frm1701:txtPg4mSchedC_17aATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_17aBTYPE" id="frm1701:txtPg4mSchedC_17aBTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b&nbsp;&nbsp;Professional Fees
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_17bATYPE" id="frm1701:txtPg4mSchedC_17bATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_17bBTYPE" id="frm1701:txtPg4mSchedC_17bBTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c&nbsp;&nbsp;Security Services
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_17dATYPE" id="frm1701:txtPg4mSchedC_17cATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_17dBTYPE" id="frm1701:txtPg4mSchedC_17cBTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;
                                                                </font>
                                                                <input type="text" style="color: black; text-align: right;" size="45" maxlength="25" name="frm1701:txtPg4mSchedC_17cTYPE" id="frm1701:txtPg4mSchedC_17cTYPE" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_17cATYPE" id="frm1701:txtPg4mSchedC_17cATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_17cBTYPE" id="frm1701:txtPg4mSchedC_17cBTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid; border-bottom: #000000 2px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="1">
                                                                  <b>18</b>&nbsp;Total Ordinary Allowable Itemized Deductions (Sum of Items 1 to 17d) (To Schedule B Item 6)
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_18ATYPE" id="frm1701:txtPg4mSchedC_18ATYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedC_18BTYPE" id="frm1701:txtPg4mSchedC_18BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="4" style="border-bottom: #000000 2px solid;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                          <tr>
                                                            <td class="tblFormTdPart">
                                                              <table width="100%" style="height: 22px" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                  <td>
                                                                    <div align="left">
                                                                      <font style="font-weight:bold;">Schedule D - Special Allowable Itemized Deductions </font>
                                                                      <font size="1"><i>(attach additional sheet/s, if necessary)</i></font><br />
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
                                                      <td colspan="4">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                          <tr>
                                                            <td class="tblFormTdPart">
                                                              <table width="100%" style="height: 22px" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                  <td>
                                                                    <div align="left">
                                                                      <font style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                      Schedule D.1 - Taxpayer/Filer</font>
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
                                                      <td style="border-top: #000000 2px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="50%">
                                                              <div align="center">
                                                                <font size="2">
                                                                  Description
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="25%">
                                                              <div align="center">
                                                                <font size="2">
                                                                  Legal Basis
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="25%">
                                                              <div align="center">
                                                                <font size="2">
                                                                  Amount
                                                                </font>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>1</b>&nbsp;
                                                                  <input type="text" style="color: black; text-align: right;" size="50" maxlength="25" name="frm1701:txtPg4mSchedD1_1TYPE" id="frm1701:txtPg4mSchedD1_1TYPE" />
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD1_1ATYPE" id="frm1701:txtPg4mSchedD1_1ATYPE" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD1_1BTYPE" id="frm1701:txtPg4mSchedD1_1BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>2</b>&nbsp;
                                                                  <input type="text" style="color: black; text-align: right;" size="50" maxlength="25" name="frm1701:txtPg4mSchedD1_2TYPE" id="frm1701:txtPg4mSchedD1_2TYPE" />
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD1_2ATYPE" id="frm1701:txtPg4mSchedD1_2ATYPE" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD1_2BTYPE" id="frm1701:txtPg4mSchedD1_2BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>3</b>&nbsp;
                                                                  <input type="text" style="color: black; text-align: right;" size="50" maxlength="25" name="frm1701:txtPg4mSchedD1_3TYPE" id="frm1701:txtPg4mSchedD1_3TYPE" />
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD1_3ATYPE" id="frm1701:txtPg4mSchedD1_3ATYPE" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD1_3BTYPE" id="frm1701:txtPg4mSchedD1_3BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>4</b>&nbsp;
                                                                  <input type="text" style="color: black; text-align: right;" size="50" maxlength="25" name="frm1701:txtPg4mSchedD1_4TYPE" id="frm1701:txtPg4mSchedD1_4TYPE" />
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD1_4ATYPE" id="frm1701:txtPg4mSchedD1_4ATYPE" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD1_4BTYPE" id="frm1701:txtPg4mSchedD1_4BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid; border-bottom: #000000 2px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="76%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>5</b>&nbsp;Total Special Allowable Itemized Deductions-<b>Taxpayer/Filer</b> <i>(Sum of Items 1 to 4) (To Schedule B Item 7A)</i>
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD1_5BTYPE" id="frm1701:txtPg4mSchedD1_5BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="4">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                          <tr>
                                                            <td class="tblFormTdPart">
                                                              <table width="100%" style="height: 22px" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                  <td>
                                                                    <div align="left">
                                                                      <font style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                      Schedule D.2 - Spouse</font>
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
                                                      <td style="border-top: #000000 2px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="50%">
                                                              <div align="center">
                                                                <font size="2">
                                                                  Description
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="25%">
                                                              <div align="center">
                                                                <font size="2">
                                                                  Legal Basis
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="25%">
                                                              <div align="center">
                                                                <font size="2">
                                                                  Amount
                                                                </font>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>6</b>&nbsp;
                                                                  <input type="text" style="color: black; text-align: right;" size="50" maxlength="25" name="frm1701:txtPg4mSchedD2_6TYPE" id="frm1701:txtPg4mSchedD2_6TYPE" />
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD2_6ATYPE" id="frm1701:txtPg4mSchedD2_6ATYPE" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD2_6BTYPE" id="frm1701:txtPg4mSchedD2_6BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>7</b>&nbsp;
                                                                  <input type="text" style="color: black; text-align: right;" size="50" maxlength="25" name="frm1701:txtPg4mSchedD2_7TYPE" id="frm1701:txtPg4mSchedD2_7TYPE" />
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD2_7ATYPE" id="frm1701:txtPg4mSchedD2_7ATYPE" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD2_7BTYPE" id="frm1701:txtPg4mSchedD2_7BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>8</b>&nbsp;
                                                                  <input type="text" style="color: black; text-align: right;" size="50" maxlength="25" name="frm1701:txtPg4mSchedD2_8TYPE" id="frm1701:txtPg4mSchedD2_8TYPE" />
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD2_8ATYPE" id="frm1701:txtPg4mSchedD2_8ATYPE" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD2_8BTYPE" id="frm1701:txtPg4mSchedD2_8BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="52%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>9</b>&nbsp;
                                                                  <input type="text" style="color: black; text-align: right;" size="50" maxlength="25" name="frm1701:txtPg4mSchedD2_9TYPE" id="frm1701:txtPg4mSchedD2_9TYPE" />
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD2_9ATYPE" id="frm1701:txtPg4mSchedD2_9ATYPE" />
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD2_9BTYPE" id="frm1701:txtPg4mSchedD2_9BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="border-top: #000000 1px solid; border-bottom: #000000 2px solid;" colspan="4">
                                                        <table>
                                                          <tr>
                                                            <td width="76%">
                                                              <div>
                                                                <font size="2">
                                                                  <b>10</b>&nbsp;Total Special Allowable Itemized Deductions-<b>Spouse</b> <i>(Sum of Items 6 to 9) (To Schedule B Item 7B)</i>
                                                                </font>
                                                              </div>
                                                            </td>
                                                            <td width="24%">
                                                              <div align="center">
                                                                <input type="text" style="color: black; text-align: right;" size="20" maxlength="25" name="frm1701:txtPg4mSchedD2_10BTYPE" id="frm1701:txtPg4mSchedD2_10BTYPE"
                                                                onblur="round(this,2);" 
                                                                onkeypress="return wholenumber(this, event)" />
                                                              </div>
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
                                        <!--CONTENT HERE END Attachment 4m-->
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div id="PageFooter">
                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                            <tr align="center">
                                <td class="tblFormTdPart">
                                    <table width="800" cellspacing="0" cellpadding="0" border="0">
                                        <tr align="center">
                                            <td id="mainPageGoToNavigation" width="100%" colspan="2">
                                                <div align="center">
                                                    <br />
                                                    <input class="printButtonClass" type="button" value="Prev" style="width: 100px;" name="frm1701:btnPrevPage" id="frm1701:btnPrevPage" onclick="processPrev();" />
                                                    <input id="frm1701:txtCurrentPage" name="frm1701:txtCurrentPage" size="1" type="text" style="text-align:center;" onkeyup="goToPage();" />
                                                    <span class=large>/&nbsp;</span><input type="text" id="frm1701:txtMaxPage" name="frm1701:txtMaxPage" readonly="true" size="2"  value="4" style="text-align:center;" disabled />&nbsp;
                                                    <input class="printButtonClass" type="button" value="Next" style="width: 100px;"
                                                        name="frm1701:btnNextPage" id="frm1701:btnNextPage"  onclick="processNext();" />
                                                    <br /><br />
                                                </div>
                                            </td>
                                            <td>
                                                <div id="attachments">
                                                <a href="#" id="frm1701:lnkViewAttachments" onclick="openModalViewAttachments();" style="display:none;">View Attachments</a>
                                            </div>
                                            </td>
                                        </tr>
                                        <tr valign="middle" align="center">
                                            <td>
                                                <div align="center">
                                                    @if($action != 'view')
                                                    <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm1701:cmdValidate" id="frm1701:cmdValidate" onclick="validate()" />
                                                    <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm1701:cmdEdit" id="frm1701:cmdEdit" onclick="enableAllControl()"/>
                                                    <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                    <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                    <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1701:btnFinalCopy" id="frm1701:btnFinalCopy" onclick="submitForm();" />
                                                    @else
                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                    <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                    @endif
                                                    <div id="msg" class="printButtonClass" style="display:none;"></div>                                   
                                                </div>
                                                <br />
                                            </td>
                                            <div id="DummyTxt" style='display:none;'>  </div>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="footer footer1701v2018" style="padding:6px; text-align: center; font-size: 11px; background-color: white; width: 100%;">
                                     <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
        
    </table>
        
    </div>
    </div>

        <!-- ATTACHMENTMODALS CONTAINER -->
        <div id="ATTACHMENTMODALS">
        <div id="attachmentModalEX"></div>
        <div id="attachmentModalSP"></div>
        </div> 
        <div id="attachmentModalsSource">
            <div id="modalTYPE">
                
            </div>
        </div>

        <!-- ID container -->
      <div style="display:none;">
            <input type="text" id="frm1701:txtZIP" name="frm1701:Zip"/>
            <input type="text" id="frm1701:txtEnabledInputsOnValidation" value='' />
            <input type="text" id="frm1701:txtDisabledInputs"  />
            <input type="text" id="frm1701:txtEnabledLinks"  />
            <input type="text" id="frm1701:txtIsSpouseDisabled"  />
            <input type="text" id="frm1701:txtIsTaxFilerDisabled" value="false"/>
            <input type="text" id="frm1701:txtAttachmentTypes" name="frm1701:txtAttachmentTypes" />
    
            <input type="text" id="frm1701:txtTIN4" name="frm1701:txtTIN4"  />
            <input type="text" id="frm1701:txtDisabledOnSave"  />
            <input type="text" id="frm1701:txtEnabledOnSave"  />
    
            <!-- ALWAYS CHANGE EVERY BUILD/RELEASE -->
            <input type="text" id="frm1701:txtVersion" value="051414" />
    
            <!-- for disabledFields() 03/20/14 -->
            <input type="text" id="frm1701:txtdisabledID"  />
        </div>

        <!-- View Attachment Modal -->
        <div id="attachmentModalVIEW" class="modalShow" style="display: none;height:auto; width:40%; top:40%;border: 1px solid black;background: #fff; text-align:center;">
    
            <table width="100%" class="tblForm" style="text-align:center;" >
                <tr>
                    <td class="tblFormTd " style="height:50px;">Mandatory Attachments</td>
                </tr>
            </table>
                
            <table id="tblEXView" width="100%" class="tblForm"><tr><td class="tblFormTd" valign="center" style="border: 1px solid #AAAAAA;">
                <table width="100%" >
                    <tr>
                        <td width="40%" class="small"><div id="tdEXTaxFiler"><input type="radio" class="styled" id="frm1701:rdoEXAttachmentTF" name="frm1701:rdoEditEX" value="EditTAXFILER"/>Tax Filer</div></td>
                        <td width="40%" class="small"><div id="tdEXSpouse"><input type="radio" class="styled" id="frm1701:rdoEXAttachmentS" name="frm1701:rdoEditEX" value="EditSPOUSE"/>Spouse</div></td>
                        <td width="60%" align="center">
                            <input style="width:350px;" type="button" id="frm1701:btnViewOnlyExemptAttachment" value="Edit Mandatory Attachments for Exempt Tax Regime" onclick="verifyShowAttachmentByPerson('EX'); "  />
                        </td>
                    </tr>
                </table>
            </td></tr></table>
            
            <table id="tblSPView" width="100%" class="tblForm" ><tr><td class="tblFormTd" valign="center">
                <table width="100%">
                    <tr>
                        <td width="40%" class="small"><div id="tdSPTaxFiler"><input type="radio" class="styled" id="frm1701:rdoSPAttachmentTF" name="frm1701:rdoEditSP" value="EditTAXFILER"/>Tax Filer</div></td>
                        <td width="40%" class="small"><div id="tdSPSpouse"><input type="radio" class="styled" id="frm1701:rdoSPAttachmentS" name="frm1701:rdoEditSP" value="EditSPOUSE"/>Spouse</div></td> 
                        <td width="60%" align="center">
                            <input style="width:350px;" type="button" id="frm1701:btnViewOnlySpecialAttachment" value="Edit Mandatory Attachments for Special/Preferential Rate" onclick="verifyShowAttachmentByPerson('SP');" />
                        </td>
                    </tr>
                </table>
            </td></tr></table>
            
            <br/><br/><br/>
            
            <table width="100%" >
                <tr>
                    <td class="" valign="center">
                        <input style="width:135px;" type="button" value="CLOSE" id="frm1701:btnViewClose" onclick="closeAttachmentModal(this,'attachmentModalVIEW',false)" />
                    </td>
                </tr>
            </table>
            <br/>
        </div>

        <!-- Add Attachment Modal -->
        <div id="attachmentModalADD" class="modalShow" style="display: none;height:auto; width:40%; top:40%; text-align:center;">
            
            <table width="100%" class="tblForm">
                <tr>
                <td class="tblFormTd scheduleTd" style="height:50px;" valign="center">Fill up Mandatory Attachments PER ACTIVITY (Part X) for <span id="frm1701:spnPerson"></span></td>
                </tr>
            </table>
            
            <table width="100%" class="tblForm"><tr><td class="tblFormTd">
                <table width="100%" class="tblForm">
                    <tr>
                    
                    <td style="height:100px;" valign="center">
                        <input style="width:350px" type="button" id="frm1701:btnEXAdd" value="Add Mandatory Attachments for Exempt Tax Regime" onclick="verifyActionForAttachment('EX');"  />
                        <input style="width:350px" type="button" id="frm1701:btnEXView" value="Edit Mandatory Attachments for Exempt Tax Regime" onclick="verifyActionForAttachment('EX');"  />
                        <input style="width:350px" type="button" id="frm1701:btnSPAdd" value="Add Mandatory Attachments for Special/Preferential Rate" onclick="verifyActionForAttachment('SP');" />
                        <input style="width:350px" type="button" id="frm1701:btnSPView" value="Edit Mandatory Attachments for Special/Preferential Rate" onclick="verifyActionForAttachment('SP');"  />         
                    </td>
                    
                    <td style="width:100px;">
                        <input type="button" value="CLOSE" id="frm1701:btnEXClose" onclick="closeAttachmentModal(this,'attachmentModalADD', false)" />
                        <input type="button" value="CLOSE" id="frm1701:btnSPClose" onclick="closeAttachmentModal(this,'attachmentModalADD', false)" />
                    </td>
                    
                    </tr>
                </table>
            </td></tr></table>
        </div>

      <div id="hiddenProfile" style="display:none;"  > 
        <input type="text" value="{{$company->line_business}}" size="15" maxlength="50" id="frm1701:txtLineBus" name="frm1701:txtLineBus" onblur = "return capital(this, event)" /><br>
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
    var isReload = false;

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
    // var p3ReturnPeriod = "";
    // var p3ReturnPeriodEnd = "";

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

    var totalEXArray = [];
    var totalSPArray = [];  
    var totalEXbyPerson = {};
    var totalSPbyPerson = {};

    var currentPage;
    var MaxPage = 4;
    var isFromPrint = false;

    var TYPE="";
    var PERSON = "";
    var currentAttachmentPage = "";

    /*----------------------------------*/
    var d = document, XMLBGFile = '', data = '', XMLFile = '', XMLATCFile = '', msg = d.getElementById('msg');
    var loader = d.getElementById('loader');
    /*----------------------------------*/
    var globalEmail = "";
    setTimeout("sleeptime()", 200);
    function sleeptime() {
        init();

        var xmlFileName = document.getElementById('file_name').value;        
        fileName = xmlFileName;
        if (fileName != null && fileName.indexOf('.xml') > -1) {
            loadXML(fileName);
            existingXMLFileName = fileName;
            
            if (gIsReadOnly) {
                window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false; d.getElementById('frm1701:txtCurrentPage').disabled = false; d.getElementById('frm1701:btnPrevPage').disabled = false; d.getElementById('frm1701:btnNextPage').disabled = false;", 1000);
            }
        } else {
            window.setTimeout("$('#loader').hide('blind');", 100);
        }
        if ($('#printMenu').css('display') != 'none') {
            $('#printMenu').hide('blind');
        }
         
         // Disable pasting
        $(document).ready(function () {
            $('input').bind('paste', function (e) {
                e.preventDefault();
            });
        });
  }

    function rdoPropertyJS(rdoCode, description) {
        this.rdoCode = rdoCode;
        this.description = description;
    }

    var rdoList = new Array();

    function init() {
        loadXMLrdo('/xml/rdo.xml');
        getRdo();
        var year = new Date();
        d.getElementById('frm1701:txtPg1I1Year').value = year.getFullYear() - 1;
        
        currentPage = 1;
        d.getElementById('frm1701:txtCurrentPage').value = currentPage;

        @if($action != 'view')
          d.getElementById('frm1701:cmdEdit').disabled = true;
          d.getElementById('btnPrint').disabled = true;
          d.getElementById('frm1701:btnFinalCopy').disabled = true;
          d.getElementById('btnUpload').disabled = true;
        @endif
        
    }


    function loadXMLWellFormed(loadWhere) {
        try {

            //This will load the file with filename loadWhere if it exists
            var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
            XMLFile = fsoXML.OpenTextFile(loadWhere, 1);
            if (XMLFile.AtEndOfStream)
                data = "";
            else {
                var response = d.getElementById('response'); //render file and write to hidden div
                response.innerHTML = XMLFile.ReadAll(); //remove XML tag
            }
            XMLFile.Close(); //alert( response.innerHTML ); //Debug       
            loadWFData(); /*This will load data onto fields*/
            if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
                gIsReadOnly = true;
            }

            if (gIsReadOnly) {
                d.getElementById('frm1701:cmdValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
                d.getElementById('frm1701:btnUpload').disabled = true;
            }
            window.setTimeout("$('#loader').hide('blind');", 2000);
        } catch (e) {
            //msg.innerHTML = "Save File not Found.";
        } //this will Alert File not Found if it doesn't exist
    }

    function loadWFData() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");
        var elem = d.getElementById('frmMain').elements;
        var fieldVal = "";
        for (var i = 0; i < elem.length; i++) {

            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&       
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    if(elem[i].id != 'frm1701:txtPg1I9Address2'){
            fieldVal = String(response.innerHTML).split(elem[i].id + '>');
          }
          else{
            fieldVal = String(response.innerHTML).split("frm1701:txtPg1I9Address>");
          }
                    // elem[i].value = fieldVal[1]; //all select-one and text values     
                    if (fieldVal != null && fieldVal.length > 1) {
                        if(elem[i].id == 'frm1701:txtPg1I9Address'){
                            if(fieldVal[1].length <= 100){
                                elem[i].value = fieldVal[1].substring(0, fieldVal[1].indexOf("</"));
                            }
                            else {
                                elem[i].value = unescape(fieldVal[1].substring(0, 100));
                            }
                        }
                        else if(elem[i].id == 'frm1701:txtPg1I9Address2'){
                            if(fieldVal[1].length <= 100){
                                elem[i].value = '';
                            }
                            else {
                                elem[i].value = unescape(fieldVal[1].substring(100, fieldVal[1].indexOf("</")));
                            }
                        }
                        else {
                            elem[i].value = fieldVal[1].substring(0, fieldVal[1].indexOf("</"));
                        }
                    }
                }
                if (elem[i].type == 'radio') {
                    var rdoVal = String(response.innerHTML).split(elem[i].id + '>');
                    if (rdoVal[1] == 'true') {
                        // elem[i].checked = rdoVal[1];
                        if (rdoVal != null && rdoVal.length > 1) {
                            elem[i].value = rdoVal[1].substring(0, rdoVal[1].indexOf("</"));
                        }
                        //elem[i].onclick(); dgarfin: commented since it hinders the rest of the elements to load its values 
                    }
                }
                if (elem[i].type == 'checkbox') {
                    var chkboxVal = String(response.innerHTML).split(elem[i].id + '>');
                    if (chkboxVal[1] == 'true') {
                        // elem[i].checked = chkboxVal[1];
                        if (chkboxVal != null && chkboxVal.length > 1) {
                            elem[i].value = chkboxVal[1].substring(0, chkboxVal[1].indexOf("</"));
                        }
                    }
                }
                  
            }

        }
    }

    /*--------------------------------------------------------------*/
    function setIsInitialValue() {

        var response = d.getElementById("response");

        isInitial = (isReload) ? false : true;
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
        loadData(); /*This will load data onto fields*/                             
                
        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            gIsReadOnly = true;
        }

        if (gIsReadOnly) {
                d.getElementById('frm1701:cmdValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
            }
        
    }

    function loadData() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");
        var elem = d.getElementById('frmMain').elements;
        var fieldVal = "";

        //for iterating attachment
        //attachmentCounter is "EX3,SP5" format
        var attachmentCounter = response.innerHTML.split("frm1701:txtAttachmentTypes=")[1];
        
        if (attachmentCounter !== ""){
        
            var ctr = attachmentCounter.split(",");
            //ex. get 3 in 'EX3'
            var ctrEX = (ctr[0].substring(2, ctr[0].length)) * 1 ;
            //ex. get 5 in 'SP5'
            var ctrSP = (ctr[1].substring(2, ctr[1].length)) * 1 ;

            var doneAddingAttachment = false;
            
            if (ctrEX > 0){
                
                for (var i = 0; i < ctrEX; i++) {
                    
                    addAttachment("EX");
                    
                    if ( i===(ctrEX-1) && (ctrSP===0)  ) {
                        doneAddingAttachment = true;
                    }
                }
            }
            if (ctrSP > 0){
                
                for (var i = 0; i < ctrSP; i++) {

                    addAttachment("SP");
                    
                    if ( i===(ctrSP-1) ) {
                        doneAddingAttachment = true;
                    }
                }
            }
            
            //adding attachment hides mainPages,
            //call processBack() after adding attachments
            if (doneAddingAttachment){
                processBack();
            }
        }

        for (var i = 0; i < elem.length; i++) {

            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&       
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {

                    if(elem[i].id != 'frm1701:txtPg1I9Address2'){
            fieldVal = String( $("#response").html() ).split(elem[i].id+'=');
          }
          else{
            fieldVal = String( $("#response").html() ).split("frm1701:txtPg1I9Address=");
          }

                    if (elem[i].id == 'frm1701:txtPg1I8TaxpayerName' || elem[i].id == 'frm1701:txtLineBus') {
                        elem[i].value = unescape(fieldVal[1]);
                    }
                    else if(elem[i].id == 'frm1701:txtPg1I9Address'){
                        if(fieldVal[1].length <= 100){
                            elem[i].value = unescape(fieldVal[1]);
                        }
                        else {
                            elem[i].value = unescape(fieldVal[1].substring(0, 100));
                        }
                    }
                    else if(elem[i].id == 'frm1701:txtPg1I9Address2'){
                        if(fieldVal[1].length <= 100){
                            elem[i].value = '';
                        }
                        else {
                            elem[i].value = unescape(fieldVal[1].substring(100, fieldVal[1].length));
                        }
                    }
          else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
                    else {
                        elem[i].value = fieldVal[1]; //all select-one and text values       
                    }
                }
                if (elem[i].type == 'radio') {
                    var rdoVal = String($("#response").html()).split(elem[i].id + '=');
                    if (rdoVal[1] == 'true') {
                        elem[i].checked = rdoVal[1];
                        //elem[i].onclick(); dgarfin: commented since it hinders the rest of the elements to load its values 
                    }
                }
                if (elem[i].type == 'checkbox') {
                    var chkboxVal = String($("#response").html()).split(elem[i].id + '=');
                    if (chkboxVal[1] == 'true') {
                        elem[i].checked = chkboxVal[1];
                    }
                }
                //dgarfin: temporarily commented until modalAtc popup show/hide 
                //if (elem[i].type == 'button' && elem[i].id == 'btnOkPop') {
                //  elem[i].onclick();        
                //}         
            }

        }
        validateAttachmentPerson();
        
        //set isReload to false
        isReload = false;
    }

    function getRdo() {
        var data2 = "<select class='iceSelOneMnu' id='frm1701:txtPg2I2SpouseRDOCode' name='frm1701:txtPg2I2SpouseRDOCode' size='1' ><option value='000'> </option>";
        for (var i = 0; i < rdoList.length; i++) {
            var rdo = rdoList[i];
            data2 = data2 + "<option value='" + rdo.rdoCode + "'>" + rdo.description + "</option>";
        }
        data2 = data2 + "</select>"

        $('#rdoSelect2').html(data2);
    }

    function initialValidateBeforeSave() {
        if ((d.getElementById('frm1701:txtPg1I4TIN1').value == "" || d.getElementById('frm1701:txtPg1I4TIN2').value == "" || d.getElementById('frm1701:txtPg1I4TIN3').value == "" || d.getElementById('frm1701:txtPg1I4BranchCode').value == "")) {
            alert("Please enter a valid TIN number on Item 4.");
            return false;
        }
       
        if ((d.getElementById('frm1701:txtPg1I8TaxpayerName').value == "")) {
            alert("Please enter a valid Taxpayer Name on Item 8.");
            return false;
        }
        return true;
    }

    var XMLrdoFile = '';

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

    var rdoCount = 0;
    function loadRdo() {
        /*This will load data onto an array*/
        var response = d.getElementById("responseRdo");

        var rdoCnt = String(response.innerHTML).split('rdoCount=');
        rdoCount = rdoCnt[1];

        var k = 0;
        //loads rdoList from xml
        for (var i = 1; i <= rdoCount; i++) {

            var rdo = String(response.innerHTML).split('rdo' + i + ':');
            var rdoStr = rdo[1];

            //Ensure that before writing to rdoPropertyJS the formType 1701Q is traceable in rdoStr
            if (rdoStr.indexOf('1701Q') >= 0) {
                var rdoValues = rdoStr.split('~');
                var rdoCode = rdoValues[0];
                var description = rdoValues[1];

                var objRdo = new rdoPropertyJS(rdoCode, description);
                rdoList[k] = objRdo;
                k++;
                //alert('1701Q successfully created array #'+i);

            } else {
                //alert('1701Q not found in array #'+i);
                continue;
            }
        }
    }

  function negativeNumbers(e, decimal) {
        var key;
        var keychar;

        if (window.event) {
            key = window.event.keyCode;
        }
        else if (e) {
            key = e.which;
        }
        else {
            return true;
        }
        keychar = String.fromCharCode(key);

        if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27)) {
            return true;
        }
        else if ((("0123456789-()").indexOf(keychar) > -1)) {
            return true;
        }
        else {
            return false;
        }
    }

    function blockletter(e) {
        var number = parseFloat(e.value).toFixed(2);
        if (isNaN(number)) {
            var zero = 0;
            e.value = parseFloat(zero).toFixed(2);
            //e.value = "";
        } else {
            e.value = '' + number;
            if (e.value < 0) {
                var zero = 0;
                e.value = parseFloat(zero).toFixed(2);
            }
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

    function validateMonthDayYearDate(dateID) {
        strmmddyyyy = dateID;

        if (strmmddyyyy != "") {
            var result = strmmddyyyy.split("/");
            var isLeap = new Date(result[2], 1, 29).getMonth() == 1;
            var month31 = (['01', '03', '05', '07', '08', '10', '12']);
            var month30 = (['04', '06', '09', '11']);
            var month = result[0];
            var day = result[1];
            if (result.length == 3) {
                if (isNaN(result[0] || result[1] || result[2])) {
                    return true;
                }
                else if ((result[0].length != 2 || (result[0] > 12 || result[0] < 0))) {
                    // numeric check if greater not than 31 - Month.
                    return true;
                }
                else if (result[1].length != 2 || (result[1] > 31 || result[1] < 1)) {
                    // numeric check if Date.
                    return true;
                }
                else if (result[2].length != 4) {
                    return true;
                }
                else if (month == 2) {
                    if (!isLeap && day == 29) {
                        return true;
                    }
                    else if (!isLeap && day > 29) {
                        return true;
                    }
                    else if (isLeap && day > 29) {
                        return true;
                    }
                }
                else if (month31.contains(month) && day > 31) {
                    return true;
                }
                else if (month30.contains(month) && day > 30) {
                    return true;
                }
            } else {
                return true;
            }
        }
    }

    function validateTxtPg1I25Part2(person) {
        if (person == "taxpayer") {
            var total = NumWithComma(d.getElementById('frm1701:txtPg1I22ATaxDue').value) * 50/100;

            if (NumWithComma(d.getElementById('frm1701:txtPg1I25A').value) > total) {
                return true;
            } else {
                return false;
            }
        } else if (person == "spouse") {
            var total = NumWithComma(d.getElementById('frm1701:txtPg1I22BTaxDue').value) * 50/100;
            
            if (NumWithComma(d.getElementById('frm1701:txtPg1I25B').value) > total) {
                return true;
            } else {
                return false;
            }
        }
    } 

    function validate() {
        var dt = new Date();
        if (d.getElementById('frm1701:txtPg1I1Year').value == "") {
            alert("Please enter a valid year on page 1 Item 1."); 
            d.getElementById("frm1701:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        if( d.getElementById('frm1701:txtPg1I1Year').value*1 > dt.getFullYear()*1) {
            alert("Invalid date entry on page 1 Item 1. Entry should not be later than Current Date.")
            d.getElementById("frm1701:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        if (d.getElementById('frm1701:txtPg1I1Year').value * 1 < 1900) {
            alert("Invalid date entry on page 1 Item 1. Entry should not be lower than 1900.")
            d.getElementById("frm1701:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
    if (d.getElementById('frm1701:txtPg1I1Year').value * 1 < 2018) {
            alert("Please file using the old version of the form.");
            d.getElementById("frm1701:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        if (d.getElementById('frm1701:rdoPg1I6TaxpayerTypeS').checked == false && d.getElementById('frm1701:rdoPg1I6TaxpayerTypeP').checked == false && d.getElementById('frm1701:rdoPg1I6TaxpayerTypeE').checked == false && d.getElementById('frm1701:rdoPg1I6TaxpayerTypeT').checked == false && d.getElementById('frm1701:rdoPg1I6TaxpayerTypeC').checked == false) {
            alert("Please select an option for page 1 Item 6."); 
            d.getElementById("frm1701:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        if (d.getElementById('frm1701:rdoPg1I7ATC_II011').checked == false && d.getElementById('frm1701:rdoPg1I7ATC_II012').checked == false && d.getElementById('frm1701:rdoPg1I7ATC_II013').checked == false && d.getElementById('frm1701:rdoPg1I7ATC_II014').checked == false && d.getElementById('frm1701:rdoPg1I7ATC_II015').checked == false && d.getElementById('frm1701:rdoPg1I7ATC_II016').checked == false && d.getElementById('frm1701:rdoPg1I7ATC_II017').checked == false) {
            alert("Please select an option for page 1 Item 7."); 
            d.getElementById("frm1701:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        if (d.getElementById('frm1701:txtPg1I10BirthDate').value != ""){
            if (validateMonthDayYearDate(d.getElementById('frm1701:txtPg1I10BirthDate').value)) {
                alert("Invalid birth date on page 1 item 10.  Please check date format."); 
                d.getElementById("frm1701:txtCurrentPage").value = 1;
                goToPage();
                return;
        }
        } else {
            alert("Please indicate birth date on page 1 item 10.");
            d.getElementById("frm1701:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        if (d.getElementById('frm1701:txtPg1I10BirthDate').value.split('/')[2] * 1 > dt.getFullYear() * 1) {
            alert("Birth year on page 1 Item 10 should not be later than current year.");
            return false;
        }
        if (d.getElementById('frm1701:txtPg1I12Citizenship').value == "") {
            alert("Please fill up citizenship on page 1 Item 12."); 
            d.getElementById("frm1701:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        if (d.getElementById('frm1701:rdoPg1I13ForeignTaxCreditsYes').checked == true) {
            if (d.getElementById('frm1701:txtPg1I14ForeignTaxNumber').value == "") {
                alert("Please fill up foreign tax number on page 1 Item 14."); 
                d.getElementById("frm1701:txtCurrentPage").value = 1;
                goToPage();
                return;
            }
        }
        if (d.getElementById('frm1701:rdoPg1I16CivilStatusS').checked == false && d.getElementById('frm1701:rdoPg1I16CivilStatusM').checked == false && d.getElementById('frm1701:rdoPg1I16CivilStatusLS').checked == false && d.getElementById('frm1701:rdoPg1I16CivilStatusW').checked == false) {
            alert("Please select an option for page 1 Item 16."); 
            d.getElementById("frm1701:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        if (d.getElementById('frm1701:rdoPg1I16CivilStatusM').checked == true) {
            if (d.getElementById('frm1701:rdoPg1I17SpouseIncomeYes').checked == false && d.getElementById('frm1701:rdoPg1I17SpouseIncomeNo').checked == false) {
                alert("Please select an option for page 1 Item 17."); 
                d.getElementById("frm1701:txtCurrentPage").value = 1;
                goToPage();
                return;
            }
        }
        if (d.getElementById('frm1701:rdoPg1I17SpouseIncomeYes').checked == true) {
            if (d.getElementById('frm1701:rdoPg1I18FilingStatusJ').checked == false && d.getElementById('frm1701:rdoPg1I18FilingStatusS').checked == false) {
                alert("Please select an option for page 1 Item 18."); 
                d.getElementById("frm1701:txtCurrentPage").value = 1;
                goToPage();
                return;
            }
        }
        if (d.getElementById('frm1701:rdoPg1I19IncomeExemptYes').checked == false && d.getElementById('frm1701:rdoPg1I19IncomeExemptNo').checked == false) {
            alert("Please select an option for page 1 Item 19."); 
            d.getElementById("frm1701:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        if (d.getElementById('frm1701:rdoPg1I20IncomeSpecialYes').checked == false && d.getElementById('frm1701:rdoPg1I20IncomeSpecialNo').checked == false) {
            alert("Please select an option for page 1 Item 20."); 
            d.getElementById("frm1701:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        if (d.getElementById('frm1701:rdoPg1I21TaxRateG').checked == false && d.getElementById('frm1701:rdoPg1I21TaxRateP').checked == false) {
            alert("Please select an option for page 1 Item 21."); 
            d.getElementById("frm1701:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        if (d.getElementById('frm1701:rdoPg1I21TaxRateG').checked == true) {
            if (d.getElementById('frm1701:rdoPg1I21AMethodDeductionI').checked == false && d.getElementById('frm1701:rdoPg1I21AMethodDeductionO').checked == false) {
                alert("Please select an option for page 1 Item 21A."); 
                d.getElementById("frm1701:txtCurrentPage").value = 1;
                goToPage();
                return;
            }
        }
        if (validateTxtPg1I25Part2('taxpayer')) {
            alert("Amount in page 1 Item 25A cannot be more than 50% of Item 22."); 
            d.getElementById("frm1701:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        if (validateTxtPg1I25Part2('spouse')) {
            alert("Amount in page 1 Item 25B cannot be more than 50% of Item 22."); 
            d.getElementById("frm1701:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
                

        //overpayment
        if (d.getElementById('frm1701:txtPg1I32AggregateAmtPyble').value < 0) {
            if (d.getElementById('frm1701:rdoPg1OverpaymentRefund').checked == false && d.getElementById('frm1701:rdoPg1OverpaymentTCC').checked == false && d.getElementById('frm1701:rdoPg1OverpaymentCarryOver').checked == false) {
                alert("Please select an Overpayment option on Page 1 Part II.");
                d.getElementById("frm1701:txtCurrentPage").value = 1;
                goToPage();
                return;
            }
        }

        disableAllControl();
        alert("Validation successful. Click on Edit if you wish to modify your entries.");
        return;
    }

    var disableElem = true;
    var enableElem = false;
    function disableAllControl() {

        var elem = d.getElementById("frmMain").elements;

        for (var i=0; i<elem.length; i++) {
            if (elem[i].type != 'button' && elem[i].type != 'hidden' && elem[i].type != 'undefined') {
                if ((elem[i].type == 'text' || elem[i].type == 'select-one') && (elem[i].id.indexOf('Pg1') > -1 || elem[i].id.indexOf('Pg2') > -1 || elem[i].id.indexOf('Pg3') > -1 || elem[i].id.indexOf('Pg4') > -1)) {
                    d.getElementById(elem[i].id).disabled = true;
                }
                if (elem[i].type == 'radio' || elem[i].type == 'checkbox') {
                    d.getElementById(elem[i].id).disabled = true;
                }
            }
        }

        d.getElementById('frm1701:txtCurrentPage').disabled = true;
        d.getElementById('frm1701:cmdValidate').disabled = true;
        d.getElementById('frm1701:cmdEdit').disabled = false;
        d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm1701:btnFinalCopy').disabled = false;
        d.getElementById('btnUpload').disabled = false;

        disableElem;
        enableElem;
    }

    function enableAllControl() {

        var elem = d.getElementById("frmMain").elements;

        for (var i=0; i<elem.length; i++) {
            if (elem[i].type != 'button' && elem[i].type != 'hidden' && elem[i].type != 'undefined') {
                if ((elem[i].type == 'text' || elem[i].type == 'select-one') && (elem[i].id.indexOf('Pg1') > -1 || elem[i].id.indexOf('Pg2') > -1 || elem[i].id.indexOf('Pg3') > -1 || elem[i].id.indexOf('Pg4') > -1)) {
                    d.getElementById(elem[i].id).disabled = false;
                }
                if (elem[i].type == 'radio' || elem[i].type == 'checkbox') {
                    d.getElementById(elem[i].id).disabled = false;
                }
            }
        }
    
        d.getElementById('frm1701:txtPg1I22ATaxDue').disabled = true;
        d.getElementById('frm1701:txtPg1I22BTaxDue').disabled = true;
        d.getElementById('frm1701:txtPg1I23A').disabled = true;
        d.getElementById('frm1701:txtPg1I23B').disabled = true;
        d.getElementById('frm1701:txtPg1I24ATaxPayable').disabled = true;
        d.getElementById('frm1701:txtPg1I24BTaxPayable').disabled = true;
        d.getElementById('frm1701:txtPg1I26A').disabled = true;
        d.getElementById('frm1701:txtPg1I26B').disabled = true;
        d.getElementById('frm1701:txtPg1I30A').disabled = true;
        d.getElementById('frm1701:txtPg1I30B').disabled = true;
        d.getElementById('frm1701:txtPg1I31ATotalAmtPyble').disabled = true;
        d.getElementById('frm1701:txtPg1I31BTotalAmtPyble').disabled = true;
        d.getElementById('frm1701:txtPg1I32AggregateAmtPyble').disabled = true;

        d.getElementById("frm1701:txtPg1I5RDOCode").disabled = true;

        $('input[name="frm1701:txtPart3"]').each(function() {
            $(this).attr("disabled", true);
        });

        d.getElementById('frm1701:txtCurrentPage').disabled = false;
        d.getElementById('frm1701:cmdValidate').disabled = false;
        d.getElementById('frm1701:cmdEdit').disabled = true;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1701:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;

        disableElem;
        enableElem;
    }

    /*-----Computations-----*/

    function computeTxtPg1I24(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701:txtPg1I24ATaxPayable').value = formatCurrency(NumWithComma(d.getElementById("frm1701:txtPg1I22ATaxDue").value) - NumWithComma(d.getElementById("frm1701:txtPg1I23A").value));
        } else if (person == "spouse") {
            d.getElementById('frm1701:txtPg1I24BTaxPayable').value = formatCurrency(NumWithComma(d.getElementById("frm1701:txtPg1I22BTaxDue").value) - NumWithComma(d.getElementById("frm1701:txtPg1I23B").value));
        }
        computeTxtPg1I26(person);
    }

    function computeTxtPg1I26(person) {
        if (person == "taxpayer") {
            if (validateTxtPg1I25Part2(person)) {
                alert("Amount in page 1 Item 25A cannot be more than 50% of Item 22."); 
                d.getElementById("frm1701:txtPg1I25A").value = (0).toFixed(2);
            }
        d.getElementById('frm1701:txtPg1I26A').value = formatCurrency(NumWithComma(d.getElementById("frm1701:txtPg1I24ATaxPayable").value) - NumWithComma(d.getElementById("frm1701:txtPg1I25A").value));
          } else if (person == "spouse") {
              if (validateTxtPg1I25Part2(person)) {
                  alert("Amount in page 1 Item 25B cannot be more than 50% of Item 22."); 
                  d.getElementById("frm1701:txtPg1I25B").value = (0).toFixed(2);
              }
        d.getElementById('frm1701:txtPg1I26B').value = formatCurrency(NumWithComma(d.getElementById("frm1701:txtPg1I24BTaxPayable").value) - NumWithComma(d.getElementById("frm1701:txtPg1I25B").value));
          }
        computeTxtPg1I31(person);
    }

    function computeTxtPg1I30(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701:txtPg1I30A').value = formatCurrency(NumWithComma(d.getElementById("frm1701:txtPg1I27A").value) + NumWithComma(d.getElementById("frm1701:txtPg1I28A").value) + NumWithComma(d.getElementById("frm1701:txtPg1I29A").value));
        } else if (person == "spouse") {
            d.getElementById('frm1701:txtPg1I30B').value = formatCurrency(NumWithComma(d.getElementById("frm1701:txtPg1I27B").value) + NumWithComma(d.getElementById("frm1701:txtPg1I28B").value) + NumWithComma(d.getElementById("frm1701:txtPg1I29B").value));
        }
        computeTxtPg1I31(person);
    }

    function computeTxtPg1I31(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701:txtPg1I31ATotalAmtPyble').value = formatCurrency(NumWithComma(d.getElementById("frm1701:txtPg1I26A").value) + NumWithComma(d.getElementById("frm1701:txtPg1I30A").value));
        } else if (person == "spouse") {
            d.getElementById('frm1701:txtPg1I31BTotalAmtPyble').value = formatCurrency(NumWithComma(d.getElementById("frm1701:txtPg1I26B").value) + NumWithComma(d.getElementById("frm1701:txtPg1I30B").value));
        }
        computeTxtPg1I32();
    }

    function computeTxtPg1I32() {
        d.getElementById('frm1701:txtPg1I32AggregateAmtPyble').value = formatCurrency(NumWithComma(d.getElementById("frm1701:txtPg1I31ATotalAmtPyble").value) + NumWithComma(d.getElementById("frm1701:txtPg1I31BTotalAmtPyble").value));
    }

    function computeTxtPg4I5Part6(person) {

        //computation here
        //to follow
        
        if (person == "taxpayer") {
            d.getElementById('frm1701:txtPg1I22ATaxDue').value = d.getElementById('frm1701:txtPg4IPart6_5A').value;
        } else if (person == "spouse") {
            d.getElementById('frm1701:txtPg1I22BTaxDue').value = d.getElementById('frm1701:txtPg4IPart6_5B').value;
        }
        computeTxtPg1I24(person);
    }

    function computeTxtPg4I10Part7(person) {

        //computation here
        //to follow

        if (person == "taxpayer") {
            d.getElementById('frm1701:txtPg1I23A').value = d.getElementById('frm1701:txtPg4IPart7_10A').value;
        } else if (person == "spouse") {
            d.getElementById('frm1701:txtPg1I23B').value = d.getElementById('frm1701:txtPg4IPart7_10B').value;
        }
        computeTxtPg1I24(person);
    }

    //remove, use String trim() function instead
    //trim function
    function trimStr(str) {
        return str.replace(/^\s+|\s+$/g, '');
    }

    //stringValue.trim() to use
    //trim function
    String.prototype.trim = function () {
        return this.replace(/^\s+|\s+$/g, '');
    }

    /*-----Printing-----*/

    var disabledItems = new Array();
    var isFromPrint = false;
    var isPrintingFormPages = false;
    var saveCurrentPageOnPrintingAttachment = "";
    function printme() {

        if (isOnAttachment) {

            saveCurrentPageOnPrintingAttachment = currentPage;

            $("#attachmentSelector").hide();
            d.getElementById('mainPageGoToNavigation').style.display = "inline";
            d.getElementById('frm1701:txtCurrentPage').disabled = false;
            d.getElementById('frm1701:txtMaxPage').disabled = false;

            var attachmentPage = currentAttachmentPage.substring(4,currentAttachmentPage.length);
            attachmentPage = attachmentPage.substring(0,1);
            $("#attachmentPage" + attachmentPage).prop('disabled', false);

            d.getElementById('frm1701:txtCurrentPage').value = attachmentPage;
            d.getElementById('frm1701:txtMaxPage').value = "4";
            currentPage = d.getElementById("frm1701:txtCurrentPage").value;
        }

        $('#bg').hide(); //852
        $('.printSignFooterClass').css({ 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always' });  
        $('.imgClass').css({ 'margin':'auto','display':'block','position':'relative','overflow':'visible' });
       
        $('#checkATC').css({ 'display':'none' });
        
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
        
        var activePage = document.getElementById('frm1701:txtCurrentPage').value;

        $('#Page1Content').show();
        $('#Page2Content').show();
        $('#Page3Content').show();
        $('#Page4Content').show();

        $("#Page1Content").css({'background': '#FFFFFF','border': '3px solid #000','margin-top': '-80px',});
        $("#Page2Content").css({ 'margin-top': '50px', 'border': '3px solid #000' });
        $("#Page3Content").css({ 'margin-top': '50px', 'border': '3px solid #000' });
        $("#Page4Content").css({ 'margin-top': '50px', 'border': '3px solid #000' });

        $("#formPaper").css({'border': '1px solid #fff' });
        $('.printButtonClass').hide();
        $("#formPaper").show();

        window.print();

        $("#Page"+activePage+"Content").css({ 'border': 'none' });

        $("#Page1Content").css({ 'margin-top': '0px','background': '#FFFFFF','border': 'none'});
        $("#Page2Content").css({ 'margin-top': '0px', 'border': 'none' });
        $("#Page3Content").css({ 'margin-top': '0px', 'border': 'none' });
        $("#Page4Content").css({ 'margin-top': '0px', 'border': 'none' });

        $('.printButtonClass').show();
        
        if(activePage == "1"){
            $('#Page1Content').show();
            $('#Page2Content').hide();
            $('#Page3Content').hide();
            $('#Page4Content').hide();
        }else if(activePage == "2") {
            $('#Page1Content').hide();
            $('#Page2Content').show();
            $('#Page3Content').hide();
            $('#Page4Content').hide();
        }else if(activePage == "3") {
            $('#Page1Content').hide();
            $('#Page2Content').hide();
            $('#Page3Content').show();
            $('#Page4Content').hide();
        }else{
            $('#Page1Content').hide();
            $('#Page2Content').hide();
            $('#Page3Content').hide();
            $('#Page4Content').show();
        }

      }
        
       
    function goToPage() {

        var newVal = document.getElementById("frm1701:txtCurrentPage").value;
        //var printType = !isFromPrint ? "Page" : "Print";
        var printType = "Page";

        if ((newVal <= MaxPage) && (newVal > 0) && (newVal !== currentPage.toString())) {
            if (isOnAttachment) {
                $('#' + printType + currentPage + 'm' + TYPE + 'Content').hide('blind');
                $('#' + printType + newVal + 'm' + TYPE + 'Content').show('blind');
            } else {
                $('#' + printType + currentPage + 'Content').hide('blind');
                $('#' + printType + newVal + 'Content').show('blind');
            }
            currentPage = (document.getElementById("frm1701:txtCurrentPage").value) * 1;
        }
        else if ((newVal > MaxPage) || (newVal <= 0)) {
            alert("Invalid page");

            document.getElementById("frm1701:txtCurrentPage").value = currentPage;
        }

        if (isFromPrint) {
            //printOCR();
        }
    }

    function processPrev() {
        if (currentPage == 1)
            currentPage = 1;
        else {
            currentPage--;
            $('#Page' + currentPage + 'Content').show('blind');
            $('#Page' + (currentPage + 1) + 'Content').hide('blind');
            document.getElementById('frm1701:txtCurrentPage').value = currentPage;

        }
    }
    function processNext() {
        if (currentPage == MaxPage) {
        
        }
        else {
        currentPage++;
        $('#Page' + currentPage + 'Content').show('blind');
        $('#Page' + (currentPage - 1) + 'Content').hide('blind');
        document.getElementById('frm1701:txtCurrentPage').value = currentPage;
        }
    }

    function validateAttachmentPerson(){
        
        // TAXFILER // page 1 radiobuttons name
        var rdoEX_YES_TF= d.getElementsByName("frm1701:rdoPg1I19IncomeExempt")[0];
        var rdoSP_YES_TF = d.getElementsByName("frm1701:rdoPg1I20IncomeSpecial")[0];
        // SPOUSE // page 4 radiobuttons name
        var rdoEX_YES_S = d.getElementsByName("frm1701:rdoPg2I10IncomeExempt")[0];
        var rdoSP_YES_S = d.getElementsByName("frm1701:rdoPg2I11IncomeSpecial")[0];
        
        totalEXbyPerson["TF"] = (rdoEX_YES_TF.checked) ? totalEXArray.length : 0;
        totalEXbyPerson["S"] = (rdoEX_YES_S.checked) ? totalEXArray.length : 0;
        
        totalSPbyPerson["TF"] = (rdoSP_YES_TF.checked) ? totalSPArray.length : 0;
        totalSPbyPerson["S"] = (rdoSP_YES_S.checked) ? totalSPArray.length : 0;
        
    }

    function verifyActionForAttachment(type){
  
        //this will just close the modal
        //==========================================================
        var emptyObject = null;
        closeAttachmentModal(emptyObject,"attachmentModalADD",true);
        //==========================================================
        
        var total = (type=== "EX") ? (totalEXArray.length) : (totalSPArray.length);

        if (total === 0){

            window.setTimeout("addAttachment('"+ type +"')", 300);
            
        }else {
        
            showAttachments(true, type);
            displayAttachmentByNumber();

           
        }
    }

 
    function verifyAddAttachment(bool, e, isExempt, person) {
        
        var total = (isExempt) ?  (totalEXArray.length) : (totalSPArray.length);
        PERSON = (person==="SPOUSE") ? "S"  : "TF";
            
        //if radio button [YES] is selected 
        if (bool==true){
            
            var doAdd = false;
            
            //if bool === -1 , do not call verifyMethodOfDeduction()
            //verifyMethodOfDeduction() shows alert
            if (bool === true){
            
                doAdd = true;   //verifyMethodOfDeduction(isExempt);
            }
                if (doAdd){
                
                    //setup EX header buttons
                    if (isExempt) {
                    
                        d.getElementById('frm1701:btnEXAdd').style.display = "inline";
                        d.getElementById('frm1701:btnEXClose').style.display = "inline";
                        d.getElementById('frm1701:btnEXView').style.display = "none";
                        
                        d.getElementById('frm1701:btnSPAdd').style.display = "none";
                        d.getElementById('frm1701:btnSPClose').style.display = "none";
                        d.getElementById('frm1701:btnSPView').style.display = "none";
                        
                        if (total > 0) {
                            d.getElementById('frm1701:btnEXView').style.display = "inline";
                            d.getElementById('frm1701:btnEXAdd').style.display = "none";
                        }
                    //setup SP header buttons
                    } else {

                        d.getElementById('frm1701:btnEXAdd').style.display = "none";
                        d.getElementById('frm1701:btnEXClose').style.display = "none";
                        d.getElementById('frm1701:btnEXView').style.display = "none";
                        
                        d.getElementById('frm1701:btnSPAdd').style.display = "inline";
                        d.getElementById('frm1701:btnSPClose').style.display = "inline";
                        d.getElementById('frm1701:btnSPView').style.display = "none";
                        
                        if (total > 0) {
                            d.getElementById('frm1701:btnSPView').style.display = "inline";
                            d.getElementById('frm1701:btnSPAdd').style.display = "none";
                        }
                    }

                    d.getElementById('frm1701:spnPerson').innerHTML = person;
                    
                    if (bool === true) {  
                        $('#attachmentModalADD').show('fade');
                        d.getElementById('formPaper').style.display = "none";
                    }
            }
        //if radio button [NO] is selected 
        //(bool == -1) is triggered in disableATCTaxFiler() && disableATCSpouse()
        }else{
            
            PERSON = (person==="SPOUSE") ? "S"  : "TF";
          
            var TaxFiler = {};
            var Spouse = {};
            
            //set to zero if no attachment
            TaxFiler["EX"] = (totalEXbyPerson["TF"] != null) ? totalEXbyPerson["TF"] : 0 ;
            TaxFiler["SP"] = (totalSPbyPerson["TF"] != null) ? totalSPbyPerson["TF"] : 0 ;
            
            Spouse["EX"] = (totalEXbyPerson["S"] != null) ? totalEXbyPerson["S"] : 0 ;
            Spouse["SP"] = (totalSPbyPerson["S"] != null) ? totalSPbyPerson["S"] : 0 ;
        
            //EX
            if (isExempt){
            
                total = (PERSON=="TF") ? TaxFiler["EX"] : Spouse["EX"];
            //SP
            }else{
                
                total = (PERSON=="TF") ? TaxFiler["SP"] : Spouse["SP"];
            }
            
            if (total !== 0) {

                //get radio buttons, enable YES
                var opt = d.getElementsByName(e.name);

                if (bool != -1) {
                
                    var msg =(total == 1) ? "Clicking on 'OKAY' will DELETE attachment for "+ person :  "Clicking on 'OKAY' will remove all data of "+ person;
                    
                    if (!!confirm(msg)) {
                        
                        //added delay to avoid lag
                        //remove if not useful
                        window.setTimeout("removeAttachments(" + isExempt + ",'" + PERSON + "');", 500);
                        //removeAttachments(isExempt, PERSON);

                    } else {
                        opt[0].checked = true;
                        opt[1].checked = false;
                    }
                }

                if (bool == -1) {
                
                    removeAttachments(isExempt ,PERSON);
                }
            }
        }
    }

    //add attachments
    function addAttachment(type) {
        
        var attachment = $("#attachment" + type).html();
        var newAttachment = $("#attachmentPages_TEMP").html();
        var total = (type === "EX") ? (totalEXArray.length + 1) : (totalSPArray.length + 1);

        //Replace DISPLAY: none with DISPLAY: block
        newAttachment = newAttachment.replace('DISPLAY: none', "DISPLAY: block"); // This replaces the first one
        
        //rename IDs
        newAttachment = newAttachment.replace(/TYPE/g, type + total);
        
        //add newAttachment content
        $("#attachment" + type).html(attachment + newAttachment);
        
        var otherFilerTotal = 0;
        var otherFiler = (PERSON==="TF") ? "S" : "TF";
        
        if (type === "EX") {
            
            totalEXArray.push(type + total);
            totalEXbyPerson[PERSON] =  (totalEXbyPerson[PERSON] == null) ?  1 : totalEXbyPerson[PERSON] + 1;
            
            //check for otherPerson
            otherFilerTotal = (totalEXbyPerson[otherFiler] == null) ? 0 : totalEXbyPerson[otherFiler];
            //add also same count to the other person, since they are on the same form
            totalEXbyPerson[otherFiler] = (otherFilerTotal != 0 ) ? totalEXbyPerson[PERSON] : 0;
        }
        else if (type === "SP") {

            totalSPArray.push(type + total);
            totalSPbyPerson[PERSON] = (totalSPbyPerson[PERSON] == null) ?  1 : totalSPbyPerson[PERSON] + 1;
            
            //check for otherPerson
            otherFilerTotal = (totalSPbyPerson[otherFiler] == null) ? 0 : totalSPbyPerson[otherFiler];
            //add also same count to the other person, since they are on the same form
            totalSPbyPerson[otherFiler] = (otherFilerTotal != 0 ) ? totalSPbyPerson[PERSON] : 0;
        }
        
        addModals((type + total));

        showAttachments(true,type);
        
       
        setView(type, total, total);
        
        displayAttachmentByNumber();
        
        attachmentTypes_Update();
        
    }

    function addModals(type) {

        //get source 
        var source = d.getElementById("attachmentModalsSource").innerHTML;

        TYPE = type;

        //put all copied modals depending on what type
        var container = (type.substring(0, 2) === "EX") ? ($("#attachmentModalEX")) : ($("#attachmentModalSP"))

        //replace ID
        var modal = source.replace(/TYPE/g, TYPE);

        //copy modal to container
        container.html(container.html() + modal);
    }

    function addFocusBlurEvent(tableID) {
        
        var modalID = $("#" + tableID).parent().parent().attr("id"); //$("#" + tableID).parent().parent().parent().attr("id");
        
        $('input[type="text"][id="#"' + tableID + ']').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
        
        $('input[type="text"][id="#"' + tableID + ']').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });
        
        $('input[maxlength="25"][id="#"' + tableID + '][type=text]').blur(function () {
            
            var currentId = $(this).attr('id');
            var currentValue = d.getElementById(currentId).value;

            //allow negative values on item 14 page 9
            if((currentId.indexOf('txtPg5mScKI1NetIncome')> -1) && isNumeric(currentValue)){
                    
                    //d.getElementById(currentId).value = NegativeValue(formatCurrencyWOC(currentValue * 1));
                    
            }else if (isNumeric(currentValue)) {
            
                    d.getElementById(currentId).value = (currentValue >= 0) ? formatCurrency(currentValue * 1) : 0.00;
            }

        });

        $('input[maxlength!="25"][maxlength!="15"][maxlength!="10"][id="#"' + tableID + '][type=text]').blur(function () {

            var currentId = $(this).attr('id');
            var currentValue = d.getElementById(currentId).value;
            var str = currentValue;

            if (d.getElementById(currentId).maxLength == 3 || d.getElementById(currentId).maxLength == 7) {

                if (str.match(/[a-zA-Z .,#@'()_-]/g) != null) {
                    str = "";
                }

            } else {

                str = (str.replace(/[^a-zA-Z 0-9.,#@'()_-]/g, ""));
            }

            d.getElementById(currentId).value = str;

        });
    }

    function isNumeric(num) {
        return !isNaN(num)
    }

    function openModalViewAttachments(){
  
        var TaxFiler = {};
        var Spouse = {};
        
        //set to zero if no attachment
        TaxFiler["EX"] = (totalEXbyPerson["TF"] != null) ? totalEXbyPerson["TF"] : 0 ;
        TaxFiler["SP"] = (totalSPbyPerson["TF"] != null) ? totalSPbyPerson["TF"] : 0 ;
        
        Spouse["EX"] = (totalEXbyPerson["S"] != null) ? totalEXbyPerson["S"] : 0 ;
        Spouse["SP"] = (totalSPbyPerson["S"] != null) ? totalSPbyPerson["S"] : 0 ;
        
        //show table if there is EX
        if (totalEXArray.length ===0 ){
            d.getElementById('tblEXView').style.display = "none";
        }else{
            d.getElementById('tblEXView').style.display = "inline";
        }
        
        if (totalSPArray.length ===0 ){
            d.getElementById('tblSPView').style.display = "none";
        }else{
            d.getElementById('tblSPView').style.display = "inline";
        }
         
        d.getElementById('tdEXTaxFiler').style.display =  (TaxFiler["EX"] > 0 ) ? "inline" : "none" ;
        d.getElementById('tdEXSpouse').style.display =  (Spouse["EX"] > 0 ) ? "inline" : "none" ;
        d.getElementById('frm1701:rdoEXAttachmentTF').checked =  (TaxFiler["EX"] > 0 ) ? true : false ;
        d.getElementById('frm1701:rdoEXAttachmentS').checked =  (Spouse["EX"] > 0  &&  TaxFiler["EX"] === 0 ) ? true : false ;

        d.getElementById('tdSPTaxFiler').style.display =  (TaxFiler["SP"] > 0 ) ? "inline" : "none" ;
        d.getElementById('tdSPSpouse').style.display =  (Spouse["SP"] > 0 ) ? "inline" : "none" ;
        d.getElementById('frm1701:rdoSPAttachmentTF').checked =  (TaxFiler["SP"] > 0 ) ? true : false ;
        d.getElementById('frm1701:rdoSPAttachmentS').checked =  (Spouse["SP"] > 0  &&  TaxFiler["SP"] === 0 ) ? true : false ;

       
        $('#attachmentModalVIEW').show('fade');
        $('#formPaper').css({'display':'none'});
        
        if (d.getElementById('frm1701:txtCurrentPage').disabled){
        
            d.getElementById('ATTACHMENT').style.display = "none";
            d.getElementById('PageFooter').style.display = "none";
        }
        else{
            d.getElementById('formPaper').style.display = "none";
        }

        $("input", $("#attachmentModalVIEW")).attr("disabled", false);
        $("input", $("#tdAttachmentNumberNavigation")).attr("disabled", false);
        $("input", $("#attachmentPager")).attr("disabled", false);

    }

    function verifyShowAttachmentByPerson(type){
  
        //this will just close the modal
        //==========================================================
        var emptyObject = null;
        closeAttachmentModal(emptyObject,'attachmentModalVIEW',false);
        //==========================================================
        
        var p = "";
        
        if (type==="EX"){
            p = (d.getElementById('frm1701:rdoEXAttachmentTF').checked) ? "TF" : "S";
        }else{
            p = (d.getElementById('frm1701:rdoSPAttachmentTF').checked) ? "TF" : "S";
        }
        
        PERSON = p;
        
        showAttachments(true, type);
        displayAttachmentByNumber();

    }

    function closeAttachmentModal(e,modalID, isAdd) {

        
        $('#'+modalID).hide('fade');
        $('#formPaper').css({'display':'block'});
       
        if (d.getElementById('frm1701:txtCurrentPage').disabled){

            d.getElementById('ATTACHMENT').style.display = "block";
            d.getElementById('PageFooter').style.display = "block";
        } else{
            d.getElementById('formPaper').style.display = 'block';
        }

        
        if (e != null && e.id !== "frm1701:btnViewClose"){

           
            var person = (d.getElementById('frm1701:txtCurrentPage').value == "1") ? "TF" : "S";
            //see if EXEMPT, if not, then it is SPECIAL/RATE attachment
            var isExempt = (e.id === "frm1701:btnEXClose") ? true : false;
            var radioButtonName = "";
            
            // if TAXFILER triggered add attachment
            if (person == "TF"){
                
                radioButtonName = (isExempt) ? "frm1701:rdoPg1I19IncomeExempt" : "frm1701:rdoPg1I20IncomeSpecial";
            // if SPOUSE triggered add attachment
            }else{
            
                radioButtonName = (isExempt) ? "frm1701:rdoPg4Pt7I107YesNo" : "frm1701:rdoPg4Pt7I108YesNo";
            }

            
            var opt = d.getElementsByName(radioButtonName);
            
            var total = (isExempt) ?  totalEXbyPerson[person] : totalSPbyPerson[person];
           
            total = (total == null) ? 0 : total;

            
            if (  (isAdd===false)&&(total==0 )  ){
                
                opt[0].checked = false;
               
            }
        }
    }

    var isOnAttachment = false;
    //triggered in:
    //addAttachment(), verifyActionForAttachment(), #attachmentModalVIEW, 
    function showAttachments(bool,type) {

        //SHOW
        if (bool === true) {
            
            isOnAttachment = true;
            
            //show 'Back to Main Form' button
            d.getElementById("frm1701:lnkViewAttachments").style.display = 'none';
            d.getElementById("frm1701:btnBack").style.display = "inline";
            
            var total = (type === "EX") ? (totalEXArray.length) : (totalSPArray.length);
            
            //show Attachment depending on type
            if (type === "EX") {
                //$("#attachmentHeader").html("Viewing 'EXEMPT TAX REGIME' Attachments");
                $("#attachmentEX").show();
                $("#attachmentSP").hide();
                totalEXbyPerson[PERSON] = total;
            }
            else{
                //$("#attachmentHeader").html("Viewing 'SPECIAL RATE TAX REGIME' Attachments");
                $("#attachmentSP").show();
                $("#attachmentEX").hide();
                totalSPbyPerson[PERSON] = total;
            }
            
            //show ATTACHMENT div && hide mainPages
            $("#ATTACHMENT").show();
            $("#mainPages").hide();
            
            setView(type, 1, total);
        }
        
        //HIDE
        else if (bool === false) {
            
            //hide ATTACHMENT div && show mainPages
            $("#mainPages").show("fade");
            $("#ATTACHMENT").hide();
            d.getElementById("frm1701:lnkViewAttachments").style.display = 'inline';
            d.getElementById("frm1701:btnBack").style.display = "none";
        }
        
        //enable disable footer paging buttons
        d.getElementById('mainPageGoToNavigation').style.display = "none";
        d.getElementById('frm1701:btnPrevPage').disabled = bool;
        d.getElementById('frm1701:btnNextPage').disabled = bool;
        d.getElementById('frm1701:txtMaxPage').disabled = bool;
        d.getElementById('frm1701:txtCurrentPage').disabled = bool;
        
    }

    //remove attachments
    function removeAttachments(isExempt,person) {
        
        var typeTotal = (isExempt) ? totalEXArray.length : totalSPArray.length;
        var type = (isExempt) ? "EX" : "SP";
        
        if (type === "EX"){ 
            totalEXbyPerson["TF"] = (person === "TF") ? 0 : totalEXbyPerson["TF"];
            totalEXbyPerson["S"] = (person === "S") ? 0 : totalEXbyPerson["S"];
        }else{
            totalSPbyPerson["TF"] = (person === "TF") ? 0 : totalSPbyPerson["TF"];
            totalSPbyPerson["S"] = (person === "S") ? 0 : totalSPbyPerson["S"];
        }
        
        //if both is clear, remove attachment
        if ( (totalEXbyPerson["TF"]===0  || totalEXbyPerson["TF"] == null ) && (totalEXbyPerson["S"]===0 || totalEXbyPerson["S"] == null) ){
            
            totalEXArray = [];
            $("#attachmentEX").html("");
            $("#attachmentModalEX").html("");
        }
        
        if ( (totalSPbyPerson["TF"]===0  || totalSPbyPerson["TF"] == null ) && (totalSPbyPerson["S"]===0 || totalSPbyPerson["S"] == null) ){
        
            totalSPArray = [];
            $("#attachmentSP").html("");
            $("#attachmentModalSP").html("");
        }
        
        if (totalEXArray.length === 0 && totalSPArray.length === 0){
            d.getElementById("frm1701:lnkViewAttachments").style.display = "none";
        }
        
        attachmentTypes_Update();
    }

    function deleteAttachment() {

        var type = d.getElementById("currentTypeView").value;
        var current = parseInt(d.getElementById("attachmentCurrent").value);

        var deletedItem = "";
        var lastItem = "";
        var total = -1;

        type = type.substring(0, 2);

        deletedItem = (type === "EX") ? (totalEXArray[current - 1]) : (totalSPArray[current - 1]);
        lastItem = (type === "EX") ? (totalEXArray[totalEXArray.length - 1]) : (totalSPArray[totalSPArray.length - 1]);

        total = (type === "EX") ? (totalEXArray.length) : totalSPArray.length;

        if (total > 1){
            
            var confirmMsg = "Are you sure you want to delete this attachment? This is irreversible. ";
            confirmMsg = (lastItem !== deletedItem) ? confirmMsg + "" : confirmMsg;
            
            
            
            if (confirm(confirmMsg) === true) {
                
                if (type === "EX") {
                    // Remove last item from totalEXArray
                    totalEXArray.splice(-1, 1);
                    totalEXbyPerson["TF"] = (totalEXbyPerson["TF"]==null || totalEXbyPerson["TF"]<=0 ) ? 0 : totalEXbyPerson["TF"]-1;
                    totalEXbyPerson["S"] = (totalEXbyPerson["S"]==null || totalEXbyPerson["S"]<=0) ? 0 : totalEXbyPerson["S"]-1;
                    
                }
                else if (type === "SP") {
                    // Remove last item from totalSPArray
                    totalSPArray.splice(-1, 1);
                    totalSPbyPerson["TF"] = (totalSPbyPerson["TF"]==null || totalSPbyPerson["TF"]<=0) ? 0 : totalSPbyPerson["TF"]-1;
                    totalSPbyPerson["S"] = (totalSPbyPerson["S"]==null || totalSPbyPerson["S"]<=0) ? 0 : totalSPbyPerson["S"]-1;
                }

                //delete attachement container
                $("#" + deletedItem).remove();
                $("#modal" + deletedItem).remove();
                
                var isExempt = (type==="EX")? true : false;
                
                if (total === 1) {
                
                    window.setTimeout("processBack();",200);
                    
                }else{
                        
                    changeIdTransferredAttachment(type, lastItem, deletedItem);
                    
                    //reset total
                    total = (type === "EX") ? (totalEXArray.length) : totalSPArray.length;
                    setView(type, total, total);
                    displayAttachmentByPage(1);
                    
                }
                
                
                attachmentTypes_Update();
                
                
            }
        }else{
            
            var item = (PERSON === "TF") ? 22 : 107; 
            item = (type === "SP") ? (item * 1)+1 : item;
            alert("Please check item "+item.toString()+ " 'No' mark box to delete remaining attachment.");
        }
    }

   
    function changeIdTransferredAttachment(attachType, lastItem, deletedItem) {

        var replaceRegEx = new RegExp();

        if (attachType === "EX") {

            replaceRegEx = new RegExp(lastItem, "g");

            $("#attachmentEX").html($("#attachmentEX").html().replace(replaceRegEx, deletedItem));
            $("#attachmentModalEX").html($("#attachmentModalEX").html().replace(replaceRegEx, deletedItem));

        }else if (attachType === "SP") {

            replaceRegEx = new RegExp(lastItem, "g");

            $("#attachmentSP").html($("#attachmentSP").html().replace(replaceRegEx, deletedItem));
            $("#attachmentModalSP").html($("#attachmentModalSP").html().replace(replaceRegEx, deletedItem));
        }
    }

   
    function attachmentTypes_Update(){

        var str = "";
        str = "EX" + totalEXArray.length + ",SP" + totalSPArray.length ;

        d.getElementById('frm1701:txtAttachmentTypes').value= str;
    }

    function setView(type, current, total) {

        d.getElementById("currentTypeView").value = type.toString() + current.toString();
        d.getElementById("attachmentCurrent").value = current;
        d.getElementById("attachmentTotal").value = total;
        
        //$("#total").html("Total EXEMPT Attachments: " + totalEXArray.length + " Total SPECIAL Attachments: " + totalSPArray.length);
        TYPE = type.toString() + current.toString();
        
        if (type === "EX") {
            
            d.getElementById("frm1701:btnAddAttachmentSP").style.display = "none";
            d.getElementById("frm1701:btnAddAttachmentEX").style.display = "inline";

        }else if(type==="SP"){

            
            d.getElementById("frm1701:btnAddAttachmentEX").style.display = "none";
            d.getElementById("frm1701:btnAddAttachmentSP").style.display = "inline";
            
        }
    }

    function displayAttachmentByNumber() {
  
        var currentType = d.getElementById("currentTypeView").value;

        var goTo = parseInt(d.getElementById("attachmentCurrent").value);
        var total = parseInt(d.getElementById("attachmentTotal").value);
        var type = "";
        
        if (goTo <= total) {

            type = ((currentType.substring(0, 2)) === "EX") ? "EX" : "SP";

            var gotoType = type.toString() + goTo.toString();

            setView(type, goTo, total);
            displayAttachmentByPage(1);

        } else {
            d.getElementById("attachmentCurrent").value = (currentType.substring(3, 2));
            alert("Invalid attachment number.")
        }
        
        if (!d.getElementById('frm1701:cmdValidate').disabled){
            
           
        }
        
    }

    function processBack() {
        
        $('#ATTACHMENT').hide();
    
    $('#mainPages').show('blind');
    enablePaging();
    
   if ( (!isReload) &&  (!d.getElementById('frm1701:cmdValidate').disabled) ){
      
    }
   
    d.getElementById('frm1701:txtMaxPage').value = "4";
    isOnAttachment = false;
    }

    //change currentAttachmentPage here
    function displayAttachmentByPage(pageNum) {

        var currentType = d.getElementById("currentTypeView").value;
        
        previousAttachmentPage = currentAttachmentPage;
        currentAttachmentPage = "Page" + pageNum + "m" + currentType + "Content";
       
        hideCurrentPage(previousAttachmentPage);

        $("#" + currentAttachmentPage).show("blind");
        $("#attachmentPage" + pageNum).prop('disabled', true);
    }

    function hideCurrentPage(attachmentPage) {

        var buttonPage = -1;
        buttonPage = attachmentPage.substring(4, 5);

        if(attachmentPage == ''){
            attachmentPage = 'Page1mEX1Content';
        }
        $("#" + attachmentPage).hide();
        $("#attachmentPage" + buttonPage).prop('disabled', false);
    }

    function enablePaging() {
        //enable paging
        d.getElementById('frm1701:btnPrevPage').disabled = false;
        d.getElementById('frm1701:btnNextPage').disabled = false;
        d.getElementById('frm1701:txtCurrentPage').disabled = false;
        d.getElementById('frm1701:txtMaxPage').disabled = false;
        d.getElementById('frm1701:txtMaxPage').readOnly = true;
        d.getElementById('frm1701:btnBack').disabled = false;
        d.getElementById('frm1701:lnkViewAttachments').disabled = false;
  
        var display = (   (totalEXArray.length ===0 )&&(totalSPArray.length===0)   ) ? "none" : "inline";

        d.getElementById('frm1701:lnkViewAttachments').style.display = display;

        
        //if inside attachment
        //hide footer
        if (d.getElementById('mainPages').style.display == "none"){
        
            d.getElementById('mainPageGoToNavigation').style.display = "none";
            d.getElementById('frm1701:lnkViewAttachments').style.display = "none";
            
        }else{
        
            d.getElementById('mainPageGoToNavigation').style.display = "inline";
        }      
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

    function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                console.log(form.serializeArray());
                var data = form.serialize();
                save('1701v2018',data);
                
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
        saveAndExit('1701v2018',data);
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

        submitAndSave('1701v2018', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1701v2018';
    }
</script>
@endsection