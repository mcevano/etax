@extends('layouts.app')
@section('title', '| BIR Form No. 1702EX')

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
        <button type="button" class="btn btn-danger btn-exit" id="1702EX" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="1702EX" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1702EX' company='{{$company->id}}'>Okay</button>
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
        <div id="wrapper" style="margin: 0 auto; position: relative; width: 826px;">
            <table border="0" cellspacing="0" style="width:826px" cellpadding="0" align="center" style="background-repeat: repeat-x;">
                <tr>
                    <td>
                        <div id="formPaper">
                            <div id="containerPage">
                                <div id="Page1Content" style="margin: 0; display: block; position: relative; width: 100%;" class="noCellSpace">
                                    <table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0" style="height: 0px;">
                                                    <tr>
                                                        <td style="width: 40px;" align="left" class="xsmall">
                                                            For BIR Use Only
                                                        </td>
                                                        <td style="width: 20px;" align="left" class="xsmall">
                                                            BCS/<br />
                                                            Item
                                                        </td>
                                                        <td valign="bottom" align="right">
                                                            <div style="float: right">
                                                                <img alt="" src="{{ asset('images/Bar Codes/1702Ex_p1.png') }}" style="height: 35px; width: 250px" />
                                                                <span class="xsmallBold">
                                                                    <br />
                                                                    1702-EX06/13P1</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table class="FormHeader" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td class="FormHeaderLogo" cellpadding="0" style="border-right: none;">
                                                            <img src="{{ asset('images/birflog.gif') }}" alt="birlogo" height="50px" />
                                                        </td>
                                                        <td style="text-align: left;">
                                                            <label class="FormHeader3" style="font-weight: bold;">Republika ng Pilipinas<br />
                                                                Kagawaran ng Pananalapi<br />
                                                                Kawanihan ng Rentas Internas</label>
                                                        </td>
                                                        <td style="border-right: 1px solid black;">
                                                            <span class="FormHeader1" style="font-weight: bold;">Annual Income Tax Return</span><br />
                                                            <label class="FormHeader2" style="font-weight: bold;">For Use ONLY by Corporation, Partnership
                                                                and Other Non-Individual<br />
                                                                Taxpayer EXEMPT Under the Tax Code, as Amended, [Sec. 30 and<br />
                                                                those exempted in Sec. 27(C)] and Other Special Laws,<br />
                                                                with NO Other Taxable Income</label><br />
                                                            <label class="FormHeader3" style="font-style: italic;">Enter all required information
                                                                in CAPITAL LETTERS using BLACK ink. Mark applicable
                                                                <br />
                                                                boxes with an "X". Two copies MUST be filled with the BIR and one held by the taxpayer.</label>
                                                        </td>
                                                        <td>
                                                            <span class="FormHeader2">BIR Form No.<br />
                                                            </span><span class="FormHeader1" style="font-weight: bold;">1702-EX</span><br />
                                                            <span class="FormHeader2">June 2013</span><br />
                                                            <span class="FormHeader2" style="font-weight: bold;">Page 1</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table class="tblForm" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td class="RowSubTable" valign="top" colspan="4">
                                                            <table class="RowSubTable">
                                                                <tr>
                                                                    <td class="RowSubTable" valign="top">
                                                                        <table class="RowSubTable" width="100%">
                                                                            <tr>
                                                                                <td>
                                                                                    <span class="ContentBold">1</span> <span class="Content">For</span>
                                                                                </td>
                                                                                <td>
                                                                                    <input id="frm1702EX:rdoPg1I1Calendar" class="styled" name="frm1702EX:rdoPg1I1" type="radio"
                                                                                        value="C" checked="checked" onclick="checkFilingYear()" />
                                                                                    <label for="frm1702EX:rdoPg1I1Calendar">
                                                                                        Calendar</label>
                                                                                </td>
                                                                                <td>
                                                                                    <input id="frm1702EX:rdoPg1I1Fiscal" class="styled" name="frm1702EX:rdoPg1I1" type="radio"
                                                                                        value="F" onclick="checkFilingYear()" />
                                                                                    <label for="frm1702EX:rdoPg1I1Fiscal">
                                                                                        Fiscal</label>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="3">
                                                                                    <span class="ContentBold">2</span><span class="small">Year Ended (MM/20YY)</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="3">
                                                                                    <select id="frm1702EX:ddlPg1I2Date" name="frm1702EX:ddlPg1I2Date" onchange="checkYearEnd()"
                                                                                        size="1">
                                                                                        <option value="00"></option>
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
                                                                                        <option selected="selected" value="12">12</option>
                                                                                    </select>
                                                                                    <span class="mediumBold" style="vertical-align: top;">/20</span>
                                                                                    <input id="frm1702EX:txtPg1I2YearEnd" maxlength="2" name="frm1702EX:txtPg1I2YearEnd"
                                                                                        size="2" type="text" value="" onkeypress="return wholenumber(this, event)" onblur="checkYearEnd()" />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td class="RowSubTable" valign="top">
                                                                        <table class="RowSubTable">
                                                                            <tr>
                                                                                <td class="Content" colspan="2">
                                                                                    <span class="ContentBold">3</span> <span class="xsmall">Amended Return?</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <input id="frm1702EX:rdoPg1I3AmendedYes" name="frm1702EX:rdoPg1I3Amended" type="radio"
                                                                                        value="Y" class="styled" onclick="checkFilingYear();" />
                                                                                    Yes
                                                                                </td>
                                                                                <td>
                                                                                    <input checked="checked" id="frm1702EX:rdoPg1I3AmendedNo" name="frm1702EX:rdoPg1I3Amended"
                                                                                        type="radio" value="N" class="styled" onclick="checkFilingYear();" />
                                                                                    No
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td class="RowSubTable" valign="top">
                                                                        <table class="RowSubTable">
                                                                            <tr>
                                                                                <td class="Content" colspan="2">
                                                                                    <span class="ContentBold">4</span> <span class="xsmall">Short Period Return</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <input id="frm1702EX:rdoPg1I4ShortPeriodYes" name="frm1702EX:rdoPg1I4ShortPeriod"
                                                                                        type="radio" value="Y" class="styled" onclick="shortPeriodYes()" />
                                                                                    <!-- DO POPUP EVENT (onclick) WHEN YES IS SELECTED -->
                                                                                    Yes
                                                                                </td>
                                                                                <td>
                                                                                    <input checked="checked" id="frm1702EX:rdoPg1I4ShortPeriodNo" name="frm1702EX:rdoPg1I4ShortPeriod"
                                                                                        type="radio" value="N" class="styled" onclick="checkFilingYear();" />
                                                                                    No
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td class="RowSubTable" valign="top">
                                                                        <table class="RowSubTable">
                                                                            <tr>
                                                                                <td class="Content">
                                                                                    <span class="ContentBold">5</span> <span class="xsmall">Alphanumeric Tax Code (ATC)</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <table class="RowSubTable">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <input id="frm1702EX:txtPg1I5ATCR1C1" name="frm1702EX:rdoPg1I5ATCR1C1" type="text"
                                                                                                    value="IC 011" size="6" disabled="disabled" style="text-align: center;" />
                                                                                                <input id="frm1702EX:txtPg1I5ATCR1C2" name="frm1702EX:rdoPg1I5ATCR1C2" type="text"
                                                                                                    value=" Exempt Corporation on Exempt Activities" size="35" 
                                                                                                    disabled="disabled" />
                                                                                            </td>
                                                                                            <td>
                                                                                                <input id="frm1702EX:rdoPg1I5ATCR1C3" name="frm1702EX:rdoPg1I5ATC" onclick="Select_rdoPg1I5ATC()"
                                                                                                    value="IC011" type="radio" class="styled" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <input id="frm1702EX:txtPg1I5ATCR2C1" name="frm1702EX:rdoPg1I5ATCR2C1" type="text"
                                                                                                    value="IC 021" size="6" disabled="disabled" style="text-align: center;" />
                                                                                                <input id="frm1702EX:txtPg1I5ATCR2C2" name="frm1702EX:rdoPg1I5ATCR2C2" type="text"
                                                                                                    value=" General Professional Partnership" size="35" disabled="disabled" />
                                                                                            </td>
                                                                                            <td style="width: 13%; text-align: left;">
                                                                                                <input id="frm1702EX:rdoPg1I5ATCR2C3" name="frm1702EX:rdoPg1I5ATC" onclick="Select_rdoPg1I5ATC()"
                                                                                                    value="IC021" type="radio" class="styled" />
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
                                                    <tr>
                                                        <td colspan="5" class="RowSubTable">
                                                            <table class="ContentHeader">
                                                                <tr>
                                                                    <td class="border-grey">
                                                                        Part I - Background Information
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RowSubTable" colspan="5">
                                                            <span class="smallBold">6</span> <span class="xsmall">Taxpayer Identification Number
                                                                (TIN)</span>
                                                            <input id="frm1702EX:txtPg1Pt1I6TINC1" value="{{$company->tin1}}" name="frm1702EX:TIN1" size="4" disabled="disabled" /><span
                                                                class="xlarge">-</span>
                                                            <input id="frm1702EX:txtPg1Pt1I6TINC2" value="{{$company->tin2}}"  name="frm1702EX:TIN2" size="4" disabled="disabled" /><span
                                                                class="xlarge">-</span>
                                                            <input id="frm1702EX:txtPg1Pt1I6TINC3" value="{{$company->tin3}}"  name="frm1702EX:TIN3" size="4" disabled="disabled" /><span
                                                                class="xlarge">-</span> <span style="display: none;">
                                                                    <input id="frm1702EX:txtPg1Pt1I6TINC4" value="{{$company->tin4}}"  name="frm1702EX:TIN4" size="4" disabled="disabled" />
                                                                </span>
                                                            <input id="BranchMask" name="BranchMask" value="0000" size="4" disabled="disabled" />
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="smallBold">7</span> <span class="small">RDO Code</span>
                                                            <input type="text" id="frm1702EX:hdnPg1Pt1I7RDO" value="{{$company->rdo_code}}" name="frm1702EX:hdnPg1Pt1I7RDO"
                                                                style="display: none;" />
                                                            <div id="rdoContainer" style="display: inline;">
                                                                <input type="text" id="frm1702EX:rdoPg1Pt1I7RDO" style="width: 37px;" disabled value="{{$company->rdo_code}}" name="frm1702EX:rdoPg1Pt1I7RDO"/>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RowSubTable" colspan="5">
                                                            <table class="RowSubTable" style="width: 820px;">
                                                                <tr>
                                                                    <td>
                                                                        <span class="ContentBold">8</span> <span class="small">Date of Incorporation/Organization</span>
                                                                        <span class="smallItalic">(MM/DD/YYYY)</span>
                                                                    </td>
                                                                    <td align="right" style="width: 50%;">
                                                                        <input id="frm1702EX:txtPg1Pt1I8DateofIncorporation" name="frm1702EX:txtPg1Pt1I8DateofIncorporation" size="20" maxlength="10" onkeypress="return wholenumber(this, event)"
                                                                            onblur="validateDate(this);onBlurIterate(this)" onfocus="onFocusIterate(this)" onkeydown="return dateMasking(this)" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RowSubTable" colspan="5">
                                                            <table class="RowSubTable">
                                                                <tr>
                                                                    <td>
                                                                        <span style="font-size: 11pt; font-weight: bold;">9</span> <span class="small">Registered
                                                                            Name</span> <span class="smallItalic">(Enter only 1 letter per box using CAPITAL LETTERS)</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input id="frm1702EX:txtPg1Pt1I9RegisteredName" value="{{$company->registered_name}}" name="frm1702EX:RegName" type="text"
                                                                            style="width: 100%;" onblur="return capitalize(this)" maxlength="60" disabled="disabled" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RowSubTable" colspan="5">
                                                            <table class="RowSubTable">
                                                                <tr>
                                                                    <td>
                                                                        <span style="font-size: 11pt; font-weight: bold;">10</span> <span class="small">Registered
                                                                            Address</span> <span class="xsmallItalic">(Indicate complete registered address)</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input id="frm1702EX:txtPg1Pt1I10RegisteredAddress" name="frm1702EX:txtPg1Pt1I10RegisteredAddress"
                                                                            type="text" style="width: 100%;" value="{{$company->address}}" maxlength="60" onkeypress="return Address(this)"
                                                                            onblur="return capitalize(this)" disabled="disabled" />
                                                                        <input type="text" id="frm1702EX:txtZIP" name="frm1702EX:txtZIP" value="{{$company->zip_code}}" disabled="disabled" style="display: none;" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <table class="RowSubTable">
                                                                <tr>
                                                                    <td class="RowSubTable" colspan="1" width="35%">
                                                                        <table class="RowSubTable">
                                                                            <tr>
                                                                                <td>
                                                                                    <span style="font-size: 11pt; font-weight: bold;">11</span> <span class="small">Contact
                                                                                        Number</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <input id="frm1702EX:txtPg1Pt1I11ContactNumber" name="frm1702EX:txtPg1Pt1I11ContactNumber"
                                                                                        size="35" maxlength="25" value="{{$company->tel_number}}"  onkeypress="return wholenumber(this, event)" disabled="disabled" />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td class="RowSubTable" colspan="3">
                                                                        <table class="RowSubTable">
                                                                            <tr>
                                                                                <td>
                                                                                    <span style="font-size: 11pt; font-weight: bold;">12</span> <span class="small">Email
                                                                                        Address</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <input id="frm1702EX:txtPg1Pt1I12Email" name="frm1702EX:txtPg1Pt1I12Email" type="text"
                                                                                        style="width: 100%;text-transform: none;" maxlength="100" value="{{$company->email_address}}" disabled="disabled" />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RowSubTable">
                                                            <table style="width: 600px;" >
                                                                <tr>
                                                                    <td>
                                                                        <span style="font-size: 11pt; font-weight: bold;">13</span> <span class="small">Main
                                                                            line of Business</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input id="frm1702EX:txtPg1Pt1I13MainLine" name="frm1702EX:txtPg1Pt1I13MainLine"
                                                                            type="text" value="{{$company->line_business}}" style="width: 550px;" maxlength="40" onkeypress="return Name(this)"
                                                                            onblur="return capitalize(this)" disabled="disabled" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td class="RowSubTable" >
                                                            <table >
                                                                <tr>
                                                                    <td>
                                                                        <span style="font-size: 11pt; font-weight: bold;">14</span> <span class="small">PSIC
                                                                            Code</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input id="frm1702EX:txtPg1Pt1I14PSICCode" name="frm1702EX:txtPg1Pt1I14PSICCode"
                                                                            type="text" style="width: 100%;" onblur="return capitalize(this)" maxlength="4"
                                                                            onkeypress="return wholenumber(this, event)" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RowSubTable" colspan="4">
                                                            <table>
                                                                <tr>
                                                                    <td class="ContentBold">
                                                                        15
                                                                    </td>
                                                                    <td class="Content" style="font-size: 11px;">
                                                                        Method of Deduction&nbsp;
                                                                    </td>
                                                                    <td>
                                                                        <table>
                                                                            <tr>
                                                                                <td > 
                                                                                    <input id="frm1702EX:rdoPg1Pt1I15ItemizedDeduction" name="frm1702EX:rdoPg1Pt1I15MethodofDeduction"
                                                                                        type="checkbox" checked="checked" class="styled" disabled="disabled" /><span class="Content"  style="font-size: 11px;">Itemized
                                                                                            Deductions[Sections 34 (A-J), NIRC]</span>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RowSubTable" colspan="5">
                                                            <table class="RowSubTable">
                                                                <tr>
                                                                    <td>
                                                                        <table style="width: 100%;">
                                                                            <tr>
                                                                                <td style="width: 40%;">
                                                                                    <span class="ContentBold">16</span> <span class="Content" style="font-size: 11px;">Legal Basis of Tax Relief/Exemption
                                                                                        (Specify)</span>
                                                                                </td>
                                                                                <td style="width: 60%;">
                                                                                    <span class="ContentBold">17</span> <span class="Content" style="font-size: 11px;">Investment Promotion Agency
                                                                                        (IPA)/Government Agency</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 40%;">
                                                                                    <input id="frm1702EX:txtPg1Pt1I16LegalBasis" name="frm1702EX:txtPg1Pt1I16LegalBasis"
                                                                                        type="text" style="width: 100%;" maxlength="31" onkeypress="return Code(this)"
                                                                                        onblur="return capitalize(this)" />
                                                                                </td>
                                                                                <td style="width: 60%;">
                                                                                    <input id="frm1702EX:txtPg1Pt1I17Investment" name="frm1702EX:txtPg1Pt1I17Investment"
                                                                                        type="text" style="width: 100%;" maxlength="47" onkeypress="return Code(this)"
                                                                                        onblur="return capitalize(this)" />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <table style="width: 100%;">
                                                                            <tr>
                                                                                <td>
                                                                                    <span class="ContentBold">18</span> <span class="Content" style="font-size: 11px;">Registered Activity/Program
                                                                                        (Reg No.)</span>
                                                                                </td>
                                                                                <td colspan="2">
                                                                                    <span class="ContentBold">19</span> <span class="Content" style="font-size: 11px;">Effectivity Date of Tax Relief/Exemption
                                                                                        (MM/DD/YYYY)</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <input id="frm1702EX:txtPg1Pt1I18RegisteredActivity" name="frm1702EX:txtPg1Pt1I18RegisteredActivity"
                                                                                        size="35" type="text" maxlength="24" onkeypress="return Code(this)" onblur="return capitalize(this)" />
                                                                                </td>
                                                                                <td>
                                                                                    <span class="smallBold">From </span>
                                                                                    <input id="frm1702EX:txtPg1Pt1I19EffectivityFrom" name="frm1702EX:txtPg1Pt1I19EffectivityFrom"
                                                                                        type="text" maxlength="10" size="20" onkeypress="return wholenumber(this, event)"
                                                                                        onblur="validateDate(this);onBlurIterate(this)" onfocus="onFocusIterate(this)" onkeydown="return dateMasking(this)" />
                                                                                </td>
                                                                                <td>
                                                                                    <span class="smallBold">&nbsp;&nbsp; To </span>
                                                                                    <input id="frm1702EX:txtPg1Pt1I19EffectivityTo" name="frm1702EX:txtPg1Pt1I19EffectivityTo"
                                                                                        type="text" maxlength="10" size="20" onkeypress="return wholenumber(this, event)"
                                                                                        onblur="validateNotCurrent(this), DateCompare_Page1_Item19()" onfocus="onFocusIterate(this)" onkeydown="return dateMasking(this)" />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5" class="RowSubTable">
                                                                        <table class="RowSubTable border-grey">
                                                                            <tr>
                                                                                <td class="ContentHeader" style="width: 75%;">
                                                                                    Part II - Total Tax Payable
                                                                                </td>
                                                                                <td class="Content"  style="font-size: 12px;">
                                                                                    <i>(Do NOT enter Centavos)</i>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="RowSubTable" colspan="5">
                                                                        <table class="RowSubTable">
                                                                            <tr>
                                                                                <td>
                                                                                    <span class="smallBold">20</span> <span class="small">Total Income Tax Due</span>
                                                                                    <a href="javascript:void(0)" class="xsmallItalic" onclick="goToSched(2)">(From Part
                                                                                        IV Item 41)</a>
                                                                                </td>
                                                                                <td class="ContentRight">
                                                                                    <input id="frm1702EX:txtPg1Pt2I20TotalIncome" name="frm1702EX:txtPg1Pt2I20TotalIncome"
                                                                                        type="text" style="text-align: right;" disabled="disabled" size="40" maxlength="12" />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="RowSubTable" colspan="5">
                                                                        <table class="RowSubTable">
                                                                            <tr>
                                                                                <td style="font-size: 11px;">
                                                                                    <span class="smallBold">21</span> Add: Penalty - Compromise
                                                                                </td>
                                                                                <td class="ContentRight">
                                                                                    <input id="frm1702EX:txtPg1Pt2I21AddPenalty" type="text" name="frm1702EX:txtPg1Pt2I21AddPenalty"
                                                                                        size="40" onkeypress="return wholenumber(this, event)" style="text-align: right;"
                                                                                        value="0" onblur="Compute_Page1_Item22()" maxlength="12" />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="RowSubTable" colspan="5">
                                                                        <table class="RowSubTable">
                                                                            <tr>
                                                                                <td style="font-size: 11px;">
                                                                                    <span class="smallBold">22</span> <span class="smallBold">TOTAL AMOUNT PAYABLE </span>
                                                                                    <span class="xsmallItalic">(Sum of Items 20 & 21)</span>
                                                                                </td>
                                                                                <td class="ContentRight">
                                                                                    <input id="frm1702EX:txtPg1Pt2I22TotalAmount" type="text" name="frm1702EX:txtPg1Pt2I22TotalAmount"
                                                                                        disabled="disabled" style="text-align: right;" size="40" maxlength="12" />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="RowSubTable" colspan="4">
                                                                        <table class="RowSubTableBorder">
                                                                            <tr>
                                                                                <td colspan="4" class="BorderTD">
                                                                                    <label class="xxsmall">We declare under the penalties of perjury, that this annual return
                                                                                        has been made in good faith, verified by us, and to the best of our knowledge and
                                                                                        belief, is true and correct, pursuant to the provisions of the National Internal
                                                                                        Revenue Code, as amended, and the regulations issued under authority thereof.
                                                                                        <span class="xxsmallItalic">(If Authorized Representative, attach authorization letter
                                                                                        and indicate TIN)</span>
                                                                                    </label>
                                                                                    
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 50%;">
                                                                                    <input id="frm1702EX:txtPg1Pt2AuthorizedRepresentative" name="frm1702EX:txtPg1Pt2AuthorizedRepresentative"
                                                                                        type="text" style="width: 99%;" maxlength="255" onkeypress="return Name(this)"
                                                                                        onblur="return capitalize(this)" disabled="disabled" />
                                                                                </td>
                                                                                <td style="width: 50%;border-right: 1px solid;">
                                                                                    <input id="frm1702EX:txtPg1Pt2Treasurer" name="frm1702EX:txtPg1Pt2Treasurer" type="text"
                                                                                        style="width: 100%;" maxlength="255" onkeypress="return Name(this)" onblur="return capitalize(this)"
                                                                                        disabled="disabled" />
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 50%; text-align: center;" class="BorderTD">
                                                                                    <span class="xxsmall">Signature over printed name of President/Principal Officer/Authorized
                                                                                        Representative</span>
                                                                                </td>
                                                                                <td style="width: 50%; text-align: center;" class="BorderTD">
                                                                                    <span class="xxsmall">Signature over printed name of Treasurer/Asst. Treasurer</span>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <table class="RowSubTable">
                                                                            <tr>
                                                                                <td style="width: 20%; text-align: center;">
                                                                                    <span class="small">Title of Signatory</span>
                                                                                </td>
                                                                                <td style="width: 50%;">
                                                                                    <input id="frm1702EX:txtPg1Pt2TitleofSignatory" type="text" name="frm1702EX:txtPg1Pt2TitleofSignatory"
                                                                                        style="width: 100%;" maxlength="40" disabled onkeypress="return Name(this)" onblur="return capitalize(this)" />
                                                                                </td>
                                                                                <td style="width: 20%; text-align: center;">
                                                                                    <span class="small">Number of pages filed</span>
                                                                                </td>
                                                                                <td style="width: 10%;">
                                                                                    <input id="frm1702EX:txtPg1Pt2NumberofPagesFiled" type="text" name="frm1702EX:txtPg1Pt2NumberofPagesFiled"
                                                                                        style="width: 95%; text-align: right;" maxlength="2"  onkeypress="return wholenumber(this, event)" />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <table class="RowSubTable">
                                                                            <tr>
                                                                                <td style="width: 30%;">
                                                                                    <table class="RowSubTable" style="padding: 0px; margin: 0px; border: 0px; cell-spacing: 0px;">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <span class="xsmallBold">23</span>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="radio" id="frm1702EX:rdoPg1CTC" value="CTC" class="styled" name="CTCorReg"
                                                                                                    onclick="Select_CTC()" />
                                                                                            </td>
                                                                                            <td>
                                                                                                <label class="xsmall">Community Tax Certificate (CTC) Number</label>
                                                                                            </td>
                                                                                            <td>
                                                                                                /
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="radio" id="frm1702EX:rdoPg1Reg" class="styled" value="Reg" name="CTCorReg"
                                                                                                    onclick="Select_Reg()" />
                                                                                            </td>
                                                                                            <td>
                                                                                                <label class="xsmall">SEC Reg No. </label>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                    </span>
                                                                                </td>
                                                                                <td style="width: 30%; vertical-align: middle;">
                                                                                    <input id="frm1702EX:txtPg1Pt2I23CommunityTax" type="text" name="frm1702EX:txtPg1Pt2I23CommunityTax"
                                                                                        style="width: 98%;" maxlength="20" onkeypress="return Code(this)" onblur="return capitalize(this)" />
                                                                                </td>
                                                                                <td style="width: 15%; text-align: right;">
                                                                                 <label class="xsmall">24 Date of Issue (MM/DD/YYYY)</label>
                                                                                </td>
                                                                                <td style="width: 25%; vertical-align: middle;">
                                                                                    <input id="frm1702EX:txtPg1Pt1I24DateofIssue" name="frm1702EX:txtPg1Pt1I24DateofIssue"
                                                                                        type="text" maxlength="10" size="20" onkeypress="return wholenumber(this, event)"
                                                                                        onblur="validateCTCDate(this)" onfocus="onFocusIterate(this)" onkeydown="return dateMasking(this)" />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <table class="RowSubTable">
                                                                            <tr>
                                                                                <td style="width: 15%;">
                                                                                    <span class="smallBold">25</span> <span class="small">Place of Issue</span>
                                                                                </td>
                                                                                <td style="width: 40%;">
                                                                                    <input id="frm1702EX:txtPg1Pt1I25PlaceofIssue" type="text" name="frm1702EX:txtPg1Pt1I25PlaceofIssue"
                                                                                        style="width: 98%;" maxlength="34" onkeypress="return Address(this)" onblur="return capitalize(this), redirectToSchedule()" />
                                                                                </td>
                                                                                <td style="width: 15%;">
                                                                                    <span class="smallBold">26</span> <span class="small">Amount, if CTC</span>
                                                                                </td>
                                                                                <td style="width: 20%;">
                                                                                    <input id="frm1702EX:txtPg1Pt1I26Amount" type="text" name="frm1702EX:txtPg1Pt1I26Amount"
                                                                                        style="width: 98%; text-align: right; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                                        maxlength="12" />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5" class="RowSubTable">
                                                                        <table class="RowSubTable">
                                                                            <tr>
                                                                                <td colspan="5" class="ContentHeader border-grey">
                                                                                    Part III - Details of Payment
                                                                                    <!-- Get from other page -->
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="1" style="width: 18%; text-align: center;">
                                                                                    <span class="smallBold">Details of Payment</span>
                                                                                </td>
                                                                                <td colspan="1" style="width: 14%; text-align: center;">
                                                                                    <span class="xxsmallBold">Drawee Bank/<br />
                                                                                        Agency</span>
                                                                                </td>
                                                                                <td colspan="1" style="width: 18%; text-align: center;">
                                                                                    <span class="smallBold">Number</span>
                                                                                </td>
                                                                                <td colspan="1" style="width: 25%; text-align: center;">
                                                                                    <span class="smallBold">Date</span> <span class="smallItalic">(MM/DD/YYYY)</span>
                                                                                </td>
                                                                                <td colspan="1" style="width: 25%; text-align: center;">
                                                                                    <span class="smallBold">Amount</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="1" style="width: 18%;">
                                                                                    <span class="smallBold">27</span> <span class="xsmall">Cash/Bank Debit Memo</span>
                                                                                </td>
                                                                                <td colspan="1" style="width: 14%;">
                                                                                    <input id="frm1702EX:txtPg1Pt3I27CashC1" type="text" name="frm1702EX:txtPg1Pt3I27CashC1"
                                                                                        style="width: 100%;" maxlength="8" onkeypress="return Code(this)" onblur="return capitalize(this)" />
                                                                                </td>
                                                                                <td colspan="1" style="width: 18%;">
                                                                                    <input id="frm1702EX:txtPg1Pt3I27CashC2" type="text" name="frm1702EX:txtPg1Pt3I27CashC2"
                                                                                        style="width: 95%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                                        maxlength="16" />
                                                                                </td>
                                                                                <td colspan="1" style="width: 25%;" align="center">
                                                                                   <input id="frm1702EX:txtPg1Pt3I27Date" name="frm1702EX:txtPg1Pt3I27Date" type="text"
                                                                                        maxlength="10" size="20" onkeypress="return wholenumber(this, event)" onblur="validateDate(this);" />
                                                                                </td>
                                                                                <td colspan="1" style="width: 25%;">
                                                                                    <input id="frm1702EX:txtPg1Pt3I27CashC3" type="text" name="frm1702EX:txtPg1Pt3I27CashC4"
                                                                                        style="width: 98%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                                        maxlength="12" />
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="1" style="width: 18%;">
                                                                                    <span class="smallBold">28</span> <span class="small">Check</span>
                                                                                </td>
                                                                                <td colspan="1" style="width: 14%;">
                                                                                    <input id="frm1702EX:txtPg1Pt3I28CheckC1" type="text" name="frm1702EX:txtPg1Pt3I28CheckC1"
                                                                                        style="width: 100%;" maxlength="8" onkeypress="return Code(this)" onblur="return capitalize(this)" />
                                                                                </td>
                                                                                <td colspan="1" style="width: 18%;">
                                                                                    &nbsp;<input id="frm1702EX:txtPg1Pt3I28CheckC2" type="text" name="frm1702EX:txtPg1Pt3I28CheckC2"
                                                                                        style="width: 95%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                                        maxlength="16" />
                                                                                </td>
                                                                                <td colspan="1" style="width: 23%;" align="center">
                                                                                    <input id="frm1702EX:txtPg1Pt3I28Date" name="frm1702EX:txtPg1Pt3I28Date" type="text"
                                                                                        maxlength="10" size="20" onkeypress="return wholenumber(this, event)" onblur="validateDate(this);" />
                                                                                </td>
                                                                                <td colspan="1" style="width: 25%;">
                                                                                    <input id="frm1702EX:txtPg1Pt3I28CheckC3" type="text" name="frm1702EX:txtPg1Pt3I28CheckC4"
                                                                                        style="width: 98%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                                        maxlength="12" />
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="1" style="width: 18%;">
                                                                                    <span class="smallBold">29</span> <span class="small">Tax Debit Memo</span>
                                                                                </td>
                                                                                <td colspan="1" style="width: 14%;">
                                                                                </td>
                                                                                <td colspan="1" style="width: 18%;">
                                                                                    &nbsp;<input id="frm1702EX:txtPg1Pt3I29TaxDebitC2" type="text" name="frm1702EX:txtPg1Pt3I29TaxDebitC2"
                                                                                        style="width: 95%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                                        maxlength="16" />
                                                                                </td>
                                                                                <td colspan="1" style="width: 25%;" align="center">
                                                                                   <input id="frm1702EX:txtPg1Pt3I29Date" name="frm1702EX:txtPg1Pt3I29Date" type="text"
                                                                                        maxlength="10" size="20" onkeypress="return wholenumber(this, event)" onblur="validateDate(this);" />
                                                                                </td>
                                                                                <td colspan="1" style="width: 25%;">
                                                                                    <input id="frm1702EX:txtPg1Pt3I29TaxDebitC3" type="text" name="frm1702EX:txtPg1Pt3I29TaxDebitC4"
                                                                                        style="width: 98%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                                        maxlength="12" />
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="5">
                                                                                    <span class="smallBold">30</span> <span class="xsmall">Others</span> <span class="xsmallItalic">
                                                                                        (Specify Below)</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="1" style="width: 18%;">
                                                                                    <input id="frm1702EX:txtPg1Pt3I30OthersC1" type="text" name="frm1702EX:txtPg1Pt3I30OthersC1"
                                                                                        style="width: 100%;" maxlength="10" onblur="return capitalize(this)" onkeypress="return Code(this)" />
                                                                                </td>
                                                                                <td colspan="1" style="width: 14%;">
                                                                                    <input id="frm1702EX:txtPg1Pt3I30OthersC2" type="text" name="frm1702EX:txtPg1Pt3I30OthersC2"
                                                                                        style="width: 100%;" maxlength="8" onblur="return capitalize(this)" onkeypress="return Code(this)" />
                                                                                </td>
                                                                                <td colspan="1" style="width: 18%;">
                                                                                    &nbsp;<input id="frm1702EX:txtPg1Pt3I30OthersC3" type="text" name="frm1702EX:txtPg1Pt3I30OthersC3"
                                                                                        style="width: 95%; text-align: right;" maxlength="16" onkeypress="return wholenumber(this, event)" />
                                                                                </td>
                                                                                <td colspan="1" style="width: 25%;" align="center">
                                                                                    <input id="frm1702EX:txtPg1Pt3I30Date" name="frm1702EX:txtPg1Pt3I30Date" type="text"
                                                                                        maxlength="10" size="20" onkeypress="return wholenumber(this, event)" onblur="validateDate(this);" />
                                                                                </td>
                                                                                <td colspan="1" style="width: 25%;">
                                                                                    <input id="frm1702EX:txtPg1Pt3I30OthersC4" type="text" name="frm1702EX:txtPg1Pt3I30OthersC5"
                                                                                        style="width: 98%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                                        maxlength="12" />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <table class="RowSubTable">
                                                                            <tr>
                                                                                <td style="width: 70%;">
                                                                                    <table class="RowSubTable">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <span class="small">Machine Validation / Revenue Official Receipt Details</span>
                                                                                                <span class="smallItalic">(if not filed with an Authorized Agent Bank)</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                                <td style="width: 30%; text-align: center;">
                                                                                    <table class="RowSubTable">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <label class="smallItalic">Stamp of receiving Office/AAB and<br />
                                                                                                    Date of Receipt<br />
                                                                                                    (RO's Signature/Bank Teller's Initial)</label>
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
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div id="Page2Content" style="margin: 0 auto; display: none; position: relative;
                                    width: 820px;" class="noCellSpace">
                                    <div class="SubPageDiv">
                                        <table class="FormHeader">
                                            <tr>
                                                <td align="center" style="width: 45%;">
                                                    <span class="xlargeBold">Annual Income Tax Return</span>
                                                    <br />
                                                    <span class="mediumBold">Page 2</span>
                                                </td>
                                                <td align="center">
                                                    <span class="xsmall">BIR Form No.<br />
                                                    </span><span class="xlargeBold">1702-EX<br />
                                                    </span><span class="xsmall">June 2013</span>
                                                </td>
                                                <td style="width: 40%;" valign="bottom" align="right">
                                                    <div style="float: right">
                                                        <img style="height: 35px; width: 250px;" src="{{ asset('images/Bar Codes/1702Ex_p2.png') }}"
                                                            alt="barcode" />
                                                        <span class="xsmallBold">
                                                            <br />
                                                            1702-EX06/13P2</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <table class="tblForm" style="width: 100%; border-spacing: 0px;">
                                        <tr>
                                            <td>
                                                <div class="SubPageDiv">
                                                    <table class="RowSubTable, tblForm" style="width: 100%">
                                                        <tr>
                                                            <td class="style1">
                                                                <span class="smallBold">TIN</span>
                                                            </td>
                                                            <td style="text-align: left;" class="style2">
                                                                <span class="smallBold">Registered Name</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 40%;">
                                                                <input id="frm1702EX:txtPg2TinC1" value="{{$company->tin1}}" name="frm1702EX:TIN1" type="text" disabled="disabled"
                                                                    maxlength="3" size="4" />
                                                                <input id="frm1702EX:txtPg2TinC2" value="{{$company->tin2}}" name="frm1702EX:TIN2" type="text" disabled="disabled"
                                                                    maxlength="3" size="4" />
                                                                <input id="frm1702EX:txtPg2TinC3" value="{{$company->tin3}}" name="frm1702EX:TIN3" type="text" disabled="disabled"
                                                                    maxlength="3" size="4" />
                                                                <span style="display: none;">
                                                                    <input id="frm1702EX:txtPg2TinC4" value="{{$company->tin4}}" name="frm1702EX:TIN4" type="text" disabled="disabled"
                                                                        maxlength="4" size="4" />
                                                                </span>
                                                                <input id="BrachMask2" name="BrachMask2" value="0000" size="4" disabled="disabled" />
                                                            </td>
                                                            <td style="width: 60%; text-align: left;">
                                                                <input type="text" id="frm1702EX:txtPg2RegisteredName" value="{{$company->registered_name}}" name="frm1702EX:RegName" disabled="disabled"
                                                                    style="width: 470px;" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div id="Part4to5">
                                                    <div class="SubPageDiv">
                                                        <table class="RowSubTable border-grey" style="border-spacing: 0px;">
                                                            <tr>
                                                                <td style="width: 70%; text-align: center;">
                                                                    <span class="ContentHeader">Part IV - Computation of Tax</span>
                                                                </td>
                                                                <td style="width: 30%; text-align: right;">
                                                                    <span class="smallItalic">(Do NOT enter Centavos)&nbsp;&nbsp;&nbsp;&nbsp; </span>
                                                                    &nbsp;
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table class="RowSubTable, tblForm" style="width: 100%">
                                                            <tr>
                                                                <td align="left" style="width: 70%;">
                                                                    <span class="smallBold">31</span> <span class="small">Net Sales/Revenues/Receipts/Fees</span>
                                                                    <a href="javascript:void(0)" class="xsmallItalic" onclick="goToSched(3)">(From Schedule
                                                                        1 Item 6)</a>
                                                                   
                                                                </td>
                                                                <td align="center" style="width: 30%;">
                                                                    <input id="frm1702EX:txtPg2Pt4I31NetSales" name="frm1702EX:txtPg2Pt4I31NetSales" type="text" style="width: 80%; text-align: right;"
                                                                        disabled="disabled" onchange="Compute_Page2_Item33()" maxlength="12" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" style="width: 70%;">
                                                                    <span class="smallBold">32</span> <span class="small">Less: Cost of Sales/Services</span>
                                                                    <a href="javascript:void(0)" class="xsmallItalic" onclick="goToSched(3)">(From Schedule
                                                                        2 Item 27)</a>
                                                                   
                                                                </td>
                                                                <td align="center" style="width: 30%;">
                                                                    <input id="frm1702EX:txtPg2Pt4I32LessCost" name="frm1702EX:txtPg2Pt4I32LessCost" type="text" style="width: 80%; text-align: right;"
                                                                        disabled="disabled" maxlength="12" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" style="width: 70%;">
                                                                    <span class="smallBold">33</span> <span class="small">Gross Income from Operation</span>
                                                                    <span class="xsmallItalic">(Item 31 Less Item 32) </span>&nbsp;
                                                                </td>
                                                                <td align="center" style="width: 30%;">
                                                                    <input id="frm1702EX:txtPg2Pt4I33GrossIncome" name="frm1702EX:txtPg2Pt4I33GrossIncome" type="text" style="width: 80%; text-align: right;"
                                                                        disabled="disabled" maxlength="12" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" style="width: 70%;">
                                                                    <span class="smallBold">34</span> <span class="small">Add: Other Taxable Income Not
                                                                        Subjected to Final Tax</span> <a href="javascript:void(0)" class="xsmallItalic" onclick="goToSched(4)">
                                                                            (From Schedule 3 Item 4)</a>
                                                                    
                                                                </td>
                                                                <td align="center" style="width: 30%;">
                                                                    <input id="frm1702EX:txtPg2Pt4I34AddOther" name="frm1702EX:txtPg2Pt4I34AddOther" type="text" style="width: 80%; text-align: right;"
                                                                        disabled="disabled" maxlength="12" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" style="width: 70%;">
                                                                    <span class="smallBold">35</span> <span class="smallBold">Total Gross Income</span>
                                                                    <span class="xsmallItalic">(Sum of Items 33 & 34)</span>
                                                                </td>
                                                                <td align="center" style="width: 30%;">
                                                                    <input id="frm1702EX:txtPg2Pt4I35TotalGross" name="frm1702EX:txtPg2Pt4I35TotalGross" type="text" style="width: 80%; text-align: right;"
                                                                        disabled="disabled" maxlength="12" />
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="SubPageDiv">
                                                        <table class="RowSubTable">
                                                            <tr>
                                                                <td style="width: 5%;">
                                                                </td>
                                                                <td style="width: 95%; text-align: left;">
                                                                    <span class="small">Less: Deductions Allowable under Existing Law</span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table class="RowSubTable, tblForm" style="width: 100%">
                                                            <tr>
                                                                <td align="left" style="width: 70%;">
                                                                    <span class="smallBold">36</span> <span class="small">Ordinary Allowable Itemized Deductions</span>
                                                                    <a href="javascript:void(0)" class="xsmallItalic" onclick="goToSched(5)">(From Schedule
                                                                        4 Item 40)</a>
                                                                    
                                                                </td>
                                                                <td align="center" style="width: 30%;">
                                                                    <input id="frm1702EX:txtPg2Pt4I36OrdinaryAllowable" name="frm1702EX:txtPg2Pt4I36OrdinaryAllowable" type="text" style="width: 80%;
                                                                        text-align: right;" disabled="disabled" maxlength="12" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" style="width: 70%;">
                                                                    <span class="smallBold">37</span> <span class="small">Special Allowable Itemized Deductions</span>
                                                                    <a href="javascript:void(0)" class="xsmallItalic" onclick="goToSched(5)">(From Schedule
                                                                        5 Item 5)</a>
                                                                    
                                                                </td>
                                                                <td align="center" style="width: 30%;">
                                                                    <input id="frm1702EX:txtPg2Pt4I37SpecialAllowable" name="frm1702EX:txtPg2Pt4I37SpecialAllowable" type="text" style="width: 80%;
                                                                        text-align: right;" disabled="disabled" maxlength="12" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" style="width: 70%;">
                                                                    <span class="smallBold">38</span> <span class="small">Total Itemized Deductions</span>
                                                                    <span class="xsmallItalic">(Sum of Items 36 & 37)</span>
                                                                </td>
                                                                <td align="center" style="width: 30%;">
                                                                    <input id="frm1702EX:txtPg2Pt4I38TotalItemized" name="frm1702EX:txtPg2Pt4I38TotalItemized" type="text" style="width: 80%; text-align: right;"
                                                                        disabled="disabled" maxlength="12" />
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="SubPageDiv">
                                                        <table class="RowSubTable, tblForm" style="width: 100%">
                                                            <tr>
                                                                <td align="left" class="style1">
                                                                    <span class="smallBold">39</span> <span class="smallBOld">Net Taxable Income</span>
                                                                    <span class="xsmallItalic">(Item 35 Less Item 38)</span>
                                                                </td>
                                                                <td align="center" class="style2">
                                                                    <input id="frm1702EX:txtPg2Pt4I39NetTaxable" name="frm1702EX:txtPg2Pt4I39NetTaxable" type="text" style="width: 80%; text-align: right;"
                                                                        disabled="disabled" maxlength="12" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" style="width: 70%;">
                                                                    <span class="smallBold">40</span> <span class="small">Income Tax Rate</span>
                                                                </td>
                                                                <td align="right" style="width: 30%;">
                                                                    <span class="mediumBold">0%&nbsp;&nbsp;&nbsp;&nbsp; </span>&nbsp;
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" style="width: 70%;">
                                                                    <span class="smallBold">41</span> <span class="smallBold">Total Income Tax Due</span>
                                                                    <span class="xsmallItalic">(Item 39 x Item 40)</span> <a href="javascript:void(0)"
                                                                        class="xsmallItalic" onclick="goToSched(1)">(To Part II Item 20)</a>
                                                                </td>
                                                                <td align="center" style="width: 30%;">
                                                                    <input id="frm1702EX:txtPg2Pt4I41TotalIncome" name="frm1702EX:txtPg2Pt4I41TotalIncome" type="text" style="width: 80%; text-align: right;"
                                                                        disabled="disabled" maxlength="12" />
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="SubPageDiv">
                                                        <table class="RowSubTable border-grey">
                                                            <tr>
                                                                <td style="width: 70%; text-align: center;">
                                                                    <span class="ContentHeader">Part V - Tax Relief Availment</span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table class="RowSubTable, tblForm" style="width: 100%">
                                                            <tr>
                                                                <td align="left" style="width: 70%;">
                                                                    <span class="smallBold">42</span> <span class="small">Regular Income Tax Otherwise Due</span>
                                                                    <span class="xsmallItalic">(30% of Part IV Item 39)</span>
                                                                </td>
                                                                <td align="center" style="width: 30%;">
                                                                    <input id="frm1702EX:txtPg2Pt5I42RegularIncome" name="frm1702EX:txtPg2Pt5I42RegularIncome" type="text" style="width: 80%; text-align: right;"
                                                                        disabled="disabled" maxlength="12" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" style="width: 70%;">
                                                                    <span class="smallBold">43</span> <span class="small">Special Allowable Itemized Deductions</span>
                                                                    <span class="xsmallItalic">(30% of Part IV Item 37)</span>
                                                                </td>
                                                                <td align="center" style="width: 30%;">
                                                                    <input id="frm1702EX:txtPg2Pt5I43SpecialAllowable" name="frm1702EX:txtPg2Pt5I43SpecialAllowable" type="text" style="width: 80%;
                                                                        text-align: right;" disabled="disabled" maxlength="12" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" style="width: 70%;">
                                                                    <span class="smallBold">44</span> <span class="smallBold">Total Tax Relief Availment</span>
                                                                    <span class="xsmallItalic">(Sum of Items 42 & 43)</span>
                                                                </td>
                                                                <td align="center" style="width: 30%;">
                                                                    <input id="frm1702EX:txtPg2Pt5I44TotalTax" name="frm1702EX:txtPg2Pt5I44TotalTax" type="text" style="width: 80%; text-align: right;"
                                                                        disabled="disabled" maxlength="12" />
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="SubPageDiv">
                                                    <table class="RowSubTable border-grey">
                                                        <tr>
                                                            <td style="width: 70%; text-align: center;">
                                                                <span class="ContentHeader">Part VI - Information - External Auditor/Accredited Tax Agent</span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table class="RowSubTable, tblForm" style="width: 100%">
                                                        <tr>
                                                            <td align="left" colspan="3">
                                                                <span class="smallBold">45</span> <span class="small">Name of External Auditor/Accredited
                                                                    Tax Agent</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <input id="frm1702EX:txtPg2Pt6I45NameofExternalAuditor" name="frm1702EX:txtPg2Pt6I45NameofExternalAuditor" type="text" style="width: 96%;"
                                                                    onblur="return capitalize(this)" maxlength="78" onkeypress="return Name(this)" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" colspan="3">
                                                                <span class="smallBold">46</span> <span class="small">TIN</span>
                                                                <input id="frm1702EX:txtPg2Pt6I46TinC1" name="frm1702EX:txtPg2Pt6I46TinC1" type="text" maxlength="3" size="8" onkeypress="return wholenumber(this, event)"
                                                                    style="text-align: right;" />&nbsp;
                                                                <input id="frm1702EX:txtPg2Pt6I46TinC2" name="frm1702EX:txtPg2Pt6I46TinC2" type="text" maxlength="3" size="8" onkeypress="return wholenumber(this, event)"
                                                                    style="text-align: right;" />&nbsp;
                                                                <input id="frm1702EX:txtPg2Pt6I46TinC3" name="frm1702EX:txtPg2Pt6I46TinC3" type="text" maxlength="3" size="8" onkeypress="return wholenumber(this, event)"
                                                                    style="text-align: right;" />&nbsp;
                                                                <input id="frm1702EX:txtPg2Pt6I46TinC4" name="frm1702EX:txtPg2Pt6I46TinC4" type="text" maxlength="3" size="8" onkeypress="return wholenumber(this, event)"
                                                                    style="text-align: right;" onblur="Enable_NameEntry_Item45()" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" colspan="3">
                                                                <span class="smallBold">47</span> <span class="small">Name of Signing Partner</span>
                                                                <span class="smallItalic">(If External Auditor is a Partnership)</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" colspan="3">
                                                                <input id="frm1702EX:txtPg2Pt6I47NameofSigningPartner" name="frm1702EX:txtPg2Pt6I47NameofSigningPartner" type="text" style="width: 96%;"
                                                                    onblur="return capitalize(this)" maxlength="78" onkeypress="return Name(this)" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" colspan="3">
                                                                <span class="smallBold">48</span> <span class="small">TIN</span>
                                                                <input id="frm1702EX:txtPg2Pt6I48TinC1" name="frm1702EX:txtPg2Pt6I48TinC1" type="text" maxlength="3" size="8" onkeypress="return wholenumber(this, event)"
                                                                    style="text-align: right;" />&nbsp;
                                                                <input id="frm1702EX:txtPg2Pt6I48TinC2" name="frm1702EX:txtPg2Pt6I48TinC2" type="text" maxlength="3" size="8" onkeypress="return wholenumber(this, event)"
                                                                    style="text-align: right;" />&nbsp;
                                                                <input id="frm1702EX:txtPg2Pt6I48TinC3" name="frm1702EX:txtPg2Pt6I48TinC3" type="text" maxlength="3" size="8" onkeypress="return wholenumber(this, event)"
                                                                    style="text-align: right;" />&nbsp;
                                                                <input id="frm1702EX:txtPg2Pt6I48TinC4" name="frm1702EX:txtPg2Pt6I48TinC4" type="text" maxlength="3" size="8" onkeypress="return wholenumber(this, event)"
                                                                    style="text-align: right;" onblur="Enable_NameEntry_Item47()" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" style="width: 400px;">
                                                                <span class="smallBold">49</span> <span class="small">BIR Accreditation No.</span>
                                                            </td>
                                                            <td align="left">
                                                                <span class="smallBold">50</span> <span class="small">Issue Date</span> <span class="smallItalic">
                                                                    (MM/DD/YYYY)</span>
                                                            </td>
                                                            <td align="left">
                                                                <span class="smallBold">51</span> <span class="small">Expiry Date</span> <span class="smallItalic">
                                                                    (MM/DD/YYYY)</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left">
                                                                <input id="frm1702EX:txtPg2Pt6I49BIRAccreditedNoC1" name="frm1702EX:txtPg2Pt6I49BIRAccreditedNoC1" type="text" maxlength="2" size="4"
                                                                    onkeypress="return wholenumber(this, event)" style="text-align: right;vertical-align: super" />
                                                                <span class="xlarge" style="vertical-align: super">-</span>
                                                                <input id="frm1702EX:txtPg2Pt6I49BIRAccreditedNoC2" name="frm1702EX:txtPg2Pt6I49BIRAccreditedNoC2" type="text" maxlength="6" size="8"
                                                                    onkeypress="return wholenumber(this, event)" style="text-align: right;vertical-align: super" />
                                                                <span class="xlarge" style="vertical-align: super">-</span>
                                                                <input id="frm1702EX:txtPg2Pt6I49BIRAccreditedNoC3" name="frm1702EX:txtPg2Pt6I49BIRAccreditedNoC3" type="text" maxlength="3" size="8"
                                                                    onkeypress="return wholenumber(this, event)" style="text-align: right;vertical-align: super" />
                                                                <span class="xlarge" style="vertical-align: super">-</span>
                                                                <input id="frm1702EX:txtPg2Pt6I49BIRAccreditedNoC4" name="frm1702EX:txtPg2Pt6I49BIRAccreditedNoC4" type="text" maxlength="4" size="8"
                                                                    onkeypress="return wholenumber(this, event)" style="text-align: right;vertical-align: super" />
                                                            </td>
                                                            <td align="left">
                                                                <input id="frm1702EX:txtPg2Pt6I50IssueDate" name="frm1702EX:txtPg2Pt6I50IssueDate"
                                                                    type="text" maxlength="10" size="20" onkeypress="return wholenumber(this, event)"
                                                                    onblur="validateDate(this), set_Page2_Item51()" onfocus="onFocusIterate(this)" onkeydown="return dateMasking(this)" />
                                                            </td>
                                                            <td align="left">
                                                                <input id="frm1702EX:txtPg2Pt6I51ExpiryDate" name="frm1702EX:txtPg2Pt6I51ExpiryDate"
                                                                    type="text" maxlength="10" size="20" onkeypress="return wholenumber(this, event)"
                                                                    onblur="validateNotCurrent(this), DateCompare_Page2_Item50()" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div id="Page3Content" style="margin: 0 auto; display: none; position: relative;
                                    width: 820px;" class="noCellSpace">
                                    <div id="title11" style="margin: 0 auto; position: relative;">
                                        <table width="100%" class="FormHeader" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="width: 45%;">
                                                    <span class="xlargeBold">Annual Income Tax Return</span>
                                                    <br />
                                                    <span class="mediumBold">Page 3 - Schedules 1 & 2</span>
                                                </td>
                                                <td align="center">
                                                    <span class="xsmall">BIR Form No.<br />
                                                    </span><span class="xlargeBold">1702-EX<br />
                                                    </span><span class="xsmall">June 2013</span>
                                                </td>
                                                <td style="width: 40%;" valign="bottom" align="right">
                                                    <div style="float: right">
                                                        <img style="height: 35px; width: 250px;" src="{{ asset('images/Bar Codes/1702Ex_p3.png') }}"
                                                            alt="barcode" />
                                                        <br />
                                                        <span class="xsmallBold">1702-EX06/13P3</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="SubPageDiv">
                                        <table class="RowSubTable, tblForm" style="width: 100%">
                                            <tr>
                                                <td style="width: 40%;">
                                                    <span class="smallBold">TIN</span>
                                                </td>
                                                <td style="width: 60%; text-align: left;">
                                                    <span style="font-size: 11px;">Registered Name</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%;">
                                                    <input type="text"  id="frm1702EX:txtPg3TinC1" value="{{$company->tin1}}" name="frm1702EX:TIN1" disabled="disabled"
                                                        maxlength="3" size="4" />
                                                    <input type="text" id="frm1702EX:txtPg3TinC2" value="{{$company->tin2}}"  name="frm1702EX:TIN2" disabled="disabled"
                                                        maxlength="3" size="4" />
                                                    <input type="text" id="frm1702EX:txtPg3TinC3" value="{{$company->tin3}}"  name="frm1702EX:TIN3" disabled="disabled"
                                                        maxlength="3" size="4" />
                                                    <span style="display: none;">
                                                        <input type="text" id="frm1702EX:txtPg3TinC4" value="{{$company->tin4}}"  name="frm1702EX:TIN4" disabled="disabled"
                                                            maxlength="4" size="4" />
                                                    </span>
                                                    <input id="BranchMask3" name="BranchMask3" value="0000" size="4" disabled="disabled" />
                                                </td>
                                                <td style="width: 60%; text-align: left;">
                                                    <input type="text" id="frm1702EX:txtPg3RegisteredName"  value="{{$company->registered_name}}"  name="frm1702EX:RegName" disabled="disabled"
                                                        style="width: 470px;" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="SubPageDiv" id="Schedule1">
                                        <div id="sched1">
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdschedTitle ContentHeader border-grey">
                                                        <center>
                                                            <span style="font-weight: bold; font-size: small;">Schedule 1 - Sales/Revenues/Receipts/Fees</span>
                                                            <span style="font-style: italic; font-size: small;">(Attach additional sheet/s if necessary)</span>
                                                        </center>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: 11px;">&nbsp;1</span> <span style="font-size: 11px;">
                                                            Sale of Goods/Properties</span>
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg3S1I1GoodsProp" name="frm1702EX:txtPg3S1I1GoodsProp"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg3S1I4Total(), OnChange_txtPg3S1I4Total()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: 11px;">&nbsp;2</span> <span style="font-size: 11px;">
                                                            Sale of Services</span>
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg3S1I2SaleServices" name="frm1702EX:txtPg3S1I2SaleServices"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg3S1I4Total(), OnChange_txtPg3S1I4Total()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: 11px;">&nbsp;3</span> <span style="font-size: 11px;">
                                                            Lease of Properties</span>
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg3S1I3LeaseProp" name="frm1702EX:txtPg3S1I3LeaseProp"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg3S1I4Total(), OnChange_txtPg3S1I4Total()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;4</span> <span style="font-size: 11px;">
                                                            Total</span> <span style="font-size: x-small; font-style: italic;">(Sum of Items 1 to
                                                                3)</span>
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg3S1I4Total" name="frm1702EX:txtPg3S1I4Total"
                                                            style="width: 80%; text-align: right;" maxlength="12" disabled="disabled" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;5</span> <span style="font-size: small;">
                                                            Less:Sales Returns, Allowances and Discounts</span>
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg3S1I5LessSales" name="frm1702EX:txtPg3S1I5LessSales"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg3S1I6NetSales()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;6</span> <span style="font-weight: bold;
                                                            font-size: small;">Net Sales/Revenues/Receipts/Fees</span> <span style="font-style: italic;
                                                                font-size: x-small;">(Item 4 Less Item 5)</span> <a href="javascript:void(0)" class="xsmallItalic"
                                                                    onclick="goToSched(2)">(To Part IV Item 31)</a>
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg3S1I6NetSales" name="frm1702EX:txtPg3S1I6NetSales"
                                                            style="width: 80%; text-align: right;" disabled="disabled" onblur="" maxlength="12" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="SubPageDiv" id="Schedule2">
                                        <div id="sched2">
                                            <div class="SubPageDiv">
                                                <table class="RowSubTable, tblForm" style="width: 100%">
                                                    <tr>
                                                        <td align="left" class="tdschedTitle border-grey">
                                                            <center>
                                                                <span class="ContentHeader">Schedule 2-Cost of Sales</span>
                                                                <span style="font-style: italic; font-size: x-small;">(Attach additional sheet/s if
                                                                    necessary)</span>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdschedTitle border-grey">
                                                            <center>
                                                                <span style="font-weight: bold; font-size: small;">Schedule 2A - Cost of Sales (For
                                                                    those engaged in Trading)</span>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table class="RowSubTable, tblForm" style="width: 100%">
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;1</span> <span style="font-size: small;">
                                                                Merchandise Inventory,Beginning</span>
                                                        </td>
                                                        <td align="center" class="tdWidth30">
                                                            <input type="text" id="frm1702EX:txtPg3S2I1MerchInventory" name="frm1702EX:txtPg3S2I1MerchInventory"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                maxlength="12" onblur="Compute_txtPg3S2I3TotalGoods(), OnChange_txtPg3S2I3TotalGoods() " />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;2</span> <span style="font-size: small;">
                                                                Add: Purchases of Merchandise</span>
                                                        </td>
                                                        <td align="center" class="tdWidth30">
                                                            <input type="text" id="frm1702EX:txtPg3S2I2AddPurchases" name="frm1702EX:txtPg3S2I2AddPurchases"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                maxlength="12" onblur="Compute_txtPg3S2I3TotalGoods(), OnChange_txtPg3S2I3TotalGoods()" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;3</span> <span style="font-size: small;">
                                                                Total Goods Available for Sale</span> <span style="font-style: italic; font-size: x-small;">
                                                                    (Sum of Items 1 & 2)</span>
                                                        </td>
                                                        <td align="center" class="tdWidth30">
                                                            <input type="text" id="frm1702EX:txtPg3S2I3TotalGoods" name="frm1702EX:txtPg3S2I3TotalGoods"
                                                                style="width: 80%; text-align: right;" disabled="disabled" maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;4</span> <span style="font-size: small;">
                                                                Less:Merchandise - Ending</span>
                                                        </td>
                                                        <td align="center" class="tdWidth30">
                                                            <input type="text" id="frm1702EX:txtPg3S2I4LessMerch" name="frm1702EX:txtPg3S2I4LessMerch"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                maxlength="12" onblur="Compute_txtPg3S2I5CostSales(), OnChange_txtPg3S2I5CostSales()" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;5</span> <span style="font-weight: bold;
                                                                font-size: small;">Cost of Sales</span> <span style="font-style: italic; font-size: x-small;">
                                                                    (Items 3 less Item 4) (To Schedule 2 Item 27 )</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I5CostSales" name="frm1702EX:txtPg3S2I5CostSales"
                                                                style="width: 80%; text-align: right;" disabled="disabled" maxlength="12" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="SubPageDiv">
                                                <table class="RowSubTable, tblForm" style="width: 100%">
                                                    <tr>
                                                        <td align="left" class="tdschedTitle border-grey">
                                                            <center>
                                                                <span style="font-weight: bold; font-size: small;">Schedule 2B-Cost of Sales</span>
                                                                <span style="font-weight: bold; font-size: small;">(For those engaged in Manufacturing)</span>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table class="RowSubTable, tblForm" style="width: 100%">
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;6</span> <span style="font-size: small;">
                                                                Direct Materials, Beginning</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I6DirectMaterials" name="frm1702EX:txtPg3S2I6DirectMaterials"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                onblur="Compute_txtPg3S2I8MaterialsAvailable(), OnChange_txtPg3S2I8MaterialsAvailable()"
                                                                maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;7</span> <span style="font-size: small;">
                                                                Add: Purchases of Direct Materials </span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I7AddPurchases" name="frm1702EX:txtPg3S2I7AddPurchases"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                onblur="Compute_txtPg3S2I8MaterialsAvailable(), OnChange_txtPg3S2I8MaterialsAvailable()"
                                                                maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;8</span> <span style="font-size: small;">
                                                                Materials Available for Use</span> <span style="font-style: italic; font-size: x-small;">
                                                                    (Sum of Items 6 & 7)</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I8MaterialsAvailable" name="frm1702EX:txtPg3S2I8MaterialsAvailable"
                                                                style="width: 80%; text-align: right;" disabled="disabled" maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;9</span> <span style="font-size: small;">
                                                                Less:Direct Materials,Ending</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I9DirectMaterials" name="frm1702EX:txtPg3S2I9DirectMaterials"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                onblur="Compute_txtPg3S2I10RawMaterials(),OnChange_txtPg3S2I10RawMaterials()"
                                                                maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;10</span> <span style="font-size: small;">
                                                                Raw Materials Used</span> <span style="font-style: italic; font-size: x-small;">(Items
                                                                    8 less Item 9)</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I10RawMaterials" name="frm1702EX:txtPg3S2I10RawMaterials"
                                                                style="width: 80%; text-align: right;" disabled="disabled" maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;11</span> <span style="font-size: small;">
                                                                Direct Labor</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I11DirectLabor" name="frm1702EX:txtPg3S2I11DirectLabor"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                onblur="Compute_txtPg3S2I13TotalMan(), OnChange_txtPg3S2I13TotalMan()" maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;12</span> <span style="font-size: small;">
                                                                Manufacturing Overhead</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I12ManOverhead" name="frm1702EX:txtPg3S2I12ManOverhead"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                onblur="Compute_txtPg3S2I13TotalMan(), OnChange_txtPg3S2I13TotalMan()" maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;13</span> <span style="font-size: small;">
                                                                Total Manufacturing Cost</span> <span style="font-style: italic; font-size: x-small;">
                                                                    (Sum of Items 10,11 & 12)</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I13TotalMan" name="frm1702EX:txtPg3S2I13TotalMan"
                                                                style="width: 80%; text-align: right;" disabled="disabled" maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;14</span> <span style="font-size: small;">
                                                                Add: Work in Process, Beginning</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I14WorkProcess" name="frm1702EX:txtPg3S2I14WorkProcess"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                onblur="Compute_txtPg3S2I16CostOfGoods(), OnChange_txtPg3S2I16CostOfGoods()"
                                                                maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;15</span> <span style="font-size: small;">
                                                                Less : Work in Process Ending</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I15LessWork" name="frm1702EX:txtPg3S2I15LessWork"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                onblur="Compute_txtPg3S2I16CostOfGoods(), OnChange_txtPg3S2I16CostOfGoods()"
                                                                maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;16</span> <span style="font-size: small;">
                                                                Cost of Goods Manufactured</span> <span style="font-style: italic; font-size: x-small;">
                                                                    (Sum of Items 13 & 14 Less Item 15)</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I16CostOfGoods" name="frm1702EX:txtPg3S2I16CostOfGoods"
                                                                style="width: 80%; text-align: right;" disabled="disabled" maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;17</span> <span style="font-size: small;">
                                                                Add: Finished Goods, Beginning</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I17FinishedGoods" name="frm1702EX:txtPg3S2I17FinishedGoods"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                onblur="Compute_txtPg3S2I19GoodsManAndSold(), OnChange_txtPg3S2I19GoodsManAndSold()"
                                                                maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;18</span> <span style="font-size: small;">
                                                                Less:Finished Goods, Ending</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I18LessFinished" name="frm1702EX:txtPg3S2I18LessFinished"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                onblur="Compute_txtPg3S2I19GoodsManAndSold(), OnChange_txtPg3S2I19GoodsManAndSold()"
                                                                maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;19</span> <span style="font-size: small;
                                                                font-weight: bold;">Cost of Goods Manufactured and Sold</span> <span style="font-style: italic;
                                                                    font-size: x-small;">(Sum of Items 16 & 17 Less Item 18)(To Schedule 2 Item 27)</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I19GoodsManAndSold" name="frm1702EX:txtPg3S2I19GoodsManAndSold"
                                                                style="width: 80%; text-align: right;" disabled="disabled" maxlength="12" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="SubPageDiv">
                                                <table class="RowSubTable, tblForm" style="width: 100%">
                                                    <tr>
                                                        <td align="left" class="tdschedTitle border-grey">
                                                            <center>
                                                                <span style="font-weight: bold; font-size: small;">Schedule 2C - Cost of Services</span><br />
                                                                <span style="font-weight: bold; font-size: small;">(For those engaged in Services, indicate
                                                                    only those directly incurred or related to the gross revenue from rendition of services)</span>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table class="RowSubTable, tblForm" style="width: 100%">
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;20</span> <span style="font-size: small;">
                                                                Direct Charges-Salaries, Wages and Benefits</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I20DirectWage" name="frm1702EX:txtPg3S2I20DirectWage"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                onblur="Compute_txtPg3S2I26TotalCostServices(), OnChange_txtPg3S2I26TotalCostServices()"
                                                                maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;21</span> <span style="font-size: small;">
                                                                Direct Charges-Materials, Supplies and Facilities</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I21DirectMaterials" name="frm1702EX:txtPg3S2I21DirectMaterials"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                onblur="Compute_txtPg3S2I26TotalCostServices(), OnChange_txtPg3S2I26TotalCostServices()"
                                                                maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;22</span> <span style="font-size: small;">
                                                                Direct Charges-Depreciation</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I22DirectDepreciation" name="frm1702EX:txtPg3S2I22DirectDepreciation"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                onblur="Compute_txtPg3S2I26TotalCostServices(), OnChange_txtPg3S2I26TotalCostServices()"
                                                                maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;23</span> <span style="font-size: small;">
                                                                Direct Charges-Rental</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I23DirectRental" name="frm1702EX:txtPg3S2I23DirectRental"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                onblur="Compute_txtPg3S2I26TotalCostServices(), OnChange_txtPg3S2I26TotalCostServices()"
                                                                maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;24</span> <span style="font-size: small;">
                                                                Direct Charges-Outside Services</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I24DirectOutside" name="frm1702EX:txtPg3S2I24DirectOutside"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                onblur="Compute_txtPg3S2I26TotalCostServices(), OnChange_txtPg3S2I26TotalCostServices()"
                                                                maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;25</span> <span style="font-size: small;">
                                                                Direct Charges-Others</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I25DirectOthers" name="frm1702EX:txtPg3S2I25DirectOthers"
                                                                style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                onblur="Compute_txtPg3S2I26TotalCostServices(), OnChange_txtPg3S2I26TotalCostServices()"
                                                                maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;26</span> <span style="font-size: small;
                                                                font-weight: bold;">Total Cost Services </span><span style="font-style: italic; font-size: x-small;">
                                                                    (Sum of Items 20 to 25)(To Schedule 2 Item 27)</span>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I26TotalCostServices" name="frm1702EX:txtPg3S2I26TotalCostServices"
                                                                style="width: 80%; text-align: right;" disabled="disabled" maxlength="12" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="tdWidth70">
                                                            <span style="font-weight: bold; font-size: small;">&nbsp;27</span> <span style="font-size: small;
                                                                font-weight: bold;">Total Cost of Sales/Services</span> <span style="font-style: italic;
                                                                    font-size: x-small;">(Sum of Items 5,19 & 26 if applicable)</span> <a href="javascript:void(0)"
                                                                        class="xsmallItalic" onclick="goToSched(2)">(To Part IV Item 32)</a>
                                                        </td>
                                                        <td align="center" style="width: 40%;">
                                                            <input type="text" id="frm1702EX:txtPg3S2I27TotalCostSales" name="frm1702EX:txtPg3S2I27TotalCostSales"
                                                                style="width: 80%; text-align: right;" disabled="disabled" maxlength="12" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="Page4Content" style="margin: 0 auto; display: none; position: relative;
                                    width: 820px;" class="noCellSpace">
                                    <div id="title12" style="margin: 0 auto; position: relative;">
                                        <table width="100%" class="FormHeader" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="width: 45%;">
                                                    <span class="xlargeBold">Annual Income Tax Return</span>
                                                    <br />
                                                    <span class="mediumBold">Page 4 - Schedules 3 & 4</span>
                                                </td>
                                                <td align="center">
                                                    <span class="xsmall">BIR Form No.<br />
                                                    </span><span class="xlargeBold">1702-EX<br />
                                                    </span><span class="xsmall">June 2013</span>
                                                </td>
                                                <td style="width: 40%;" valign="bottom" align="right">
                                                    <div style="float: right">
                                                        <img style="height: 35px; width: 250px;" src="{{ asset('images/Bar Codes/1702Ex_p4.png') }}"
                                                            alt="barcode" />
                                                        <br />
                                                        <span class="xsmallBold">1702-EX06/13P4</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="SubPageDiv">
                                        <table class="RowSubTable, tblForm" style="width: 100%">
                                            <tr>
                                                <td style="width: 40%;">
                                                    <span class="smallBold">TIN</span>
                                                </td>
                                                <td style="width: 60%; text-align: left;">
                                                    <span style="font-size: 11px;">Registered Name</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%;">
                                                    <input type="text" id="frm1702EX:txtPg4TinC1" value="{{$company->tin1}}" name="frm1702EX:TIN1" disabled="disabled"
                                                        maxlength="3" size="4" />
                                                    <input type="text" id="frm1702EX:txtPg4TinC2" value="{{$company->tin2}}"  name="frm1702EX:TIN2" disabled="disabled"
                                                        maxlength="3" size="4" />
                                                    <input type="text" id="frm1702EX:txtPg4TinC3" value="{{$company->tin3}}"  name="frm1702EX:TIN3" disabled="disabled"
                                                        maxlength="3" size="4" />
                                                    <span style="display: none;">
                                                        <input type="text" id="frm1702EX:txtPg4TinC4" value="{{$company->tin4}}"  name="frm1702EX:TIN4" disabled="disabled"
                                                            maxlength="3" size="4" />
                                                    </span>
                                                    <input id="BranchMask4" name="BranchMask4" value="0000" size="4" disabled="disabled" />
                                                </td>
                                                <td style="width: 60%; text-align: left;">
                                                    <input type="text" id="frm1702EX:txtPg4RegisteredName"  value="{{$company->registered_name}}"  name="frm1702EX:RegName" disabled="disabled"
                                                        style="width: 470px;" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="SubPageDiv" id="Schedule3">
                                        <table class="RowSubTable, tblForm" style="width: 100%">
                                            <tr>
                                                <td align="left" class="tdschedTitle border-grey">
                                                    <center>
                                                        <span style="font-weight: bold; font-size: small;">Schedule 3 - Other Taxable Income
                                                            Not Subjected to Final Tax</span> <span style="font-style: italic; font-size: x-small;">
                                                                (Attach additional sheet/s,if necessary)</span>
                                                    </center>
                                                </td>
                                            </tr>
                                        </table>
                                        <div id="sched3">
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;1 </span>&nbsp;<input type="text"
                                                            id="frm1702EX:txtPg4S3I1Col1" name="frm1702EX:txtPg4S3I1Col1" style="width: 70%;" maxlength="40" class="schedDesc"
                                                            onkeypress="return Code(this)" onblur="return capitalize(this), Check_Pg4S3I3()" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S3I1Col2" name="frm1702EX:txtPg4S3I1Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Check_Pg4S3I3(), Compute_txtPg4S3I4TotalTaxIncome()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;2 </span>&nbsp;<input type="text"
                                                            id="frm1702EX:txtPg4S3I2Col1" name="frm1702EX:txtPg4S3I2Col1" style="width: 70%;"
                                                            maxlength="40" class="schedDesc" onkeypress="return Code(this)" onblur="return capitalize(this), Check_Pg4S3I3()" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S3I2Col2" name="frm1702EX:txtPg4S3I2Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Check_Pg4S3I3(), Compute_txtPg4S3I4TotalTaxIncome()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;3 </span>&nbsp;<input type="text"
                                                            id="frm1702EX:txtPg4S3I3Col1" onblur="return capitalize(this), Check_Pg4S3I3()"
                                                            name="frm1702EX:txtPg4S3I3Col1" style="width: 70%;" maxlength="40" class="schedDesc"
                                                            onkeypress="return Code(this)" />&nbsp;&nbsp;
                                                        <input type="button" disabled="disabled" value="(more...)" id="btnPg4S3I3More" onclick="Set_Pg4S3I3(), openDialog($('#Pg4S3I3Pop')), Load_Pg4S3I3PopTable()"
                                                            name="moreButton" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S3I3Col2" name="frm1702EX:txtPg4S3I3Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            maxlength="12" onblur="Check_Pg4S3I3(), Compute_txtPg4S3I4TotalTaxIncome()" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;4</span> <span style="font-weight: bold;
                                                            font-size: small;">Total Other Taxable Income not Subjected to Final Tax</span>
                                                        <span style="font-size: x-small; font-style: italic;">(Sum of Items 1 to 3)</span>
                                                        <a href="javascript:void(0)" class="xsmallItalic" onclick="goToSched(2)">(To Part IV
                                                            Item 34)</a>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S3I4TotalTaxIncome" name="frm1702EX:txtPg4S3I4TotalTaxIncome"
                                                            style="width: 80%; text-align: right;" disabled="disabled" maxlength="12" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="SubPageDiv" id="Schedule4p1">
                                        <div id="sched4p1">
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdschedTitle border-grey">
                                                        <center>
                                                            <span style="font-weight: bold; font-size: small;">Schedule 4 - Ordinary Allowable Itemized
                                                                Deductions</span> <span style="font-style: italic; font-size: x-small;">(Attach additional
                                                                    sheet/s,if necessary)</span>
                                                        </center>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;1 </span>&nbsp;<span style="font-size: small;">Advertising
                                                            and Promotions</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I1AdsAndPromotions" name="frm1702EX:txtPg4S4I1AdsAndPromotions"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" style="width: 100%;">
                                                        <span style="font-size: small;">Amortizations</span> <span style="font-size: small;
                                                            font-style: italic;">(Specify on Items 2,3 & 4)</span>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;2 </span>&nbsp;<input type="text"
                                                            id="frm1702EX:txtPg4S4I2Col1" name="frm1702EX:txtPg4S4I2Col1" style="width: 70%;"
                                                            maxlength="40" class="schedDesc" onkeypress="return Code(this)" onblur="return capitalize(this), Check_Pg4S4I4()" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I2Col2" name="frm1702EX:txtPg4S4I2Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Check_Pg4S4I4(), Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;3 </span>&nbsp;<input type="text"
                                                            id="frm1702EX:txtPg4S4I3Col1" name="frm1702EX:txtPg4S4I3Col1" style="width: 70%;"
                                                            maxlength="40" class="schedDesc" onkeypress="return Code(this)" onblur="return capitalize(this), Check_Pg4S4I4()" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I3Col2" name="frm1702EX:txtPg4S4I3Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Check_Pg4S4I4(), Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;4 </span>&nbsp;<input type="text"
                                                            id="frm1702EX:txtPg4S4I4Col1" name="frm1702EX:txtPg4S4I4Col1" style="width: 70%;"
                                                            onblur="return capitalize(this), Check_Pg4S4I4()" onkeypress="return Code(this)"
                                                            maxlength="40" class="schedDesc" />&nbsp;&nbsp;
                                                        <input type="button" value="(more...)" disabled="disabled" id="btnPg4S4I4More" onclick="Set_Pg4S4I4(),openDialog($('#Pg4S4I4Pop')),  Load_Pg4S4I4PopTable()"
                                                            name="moreButton" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I4Col2" name="frm1702EX:txtPg4S4I4Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            maxlength="12" onblur="Check_Pg4S4I4(), Compute_txtPg5S4I40TotalAllowableDeduction()" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;5 </span>&nbsp;<span style="font-size: small;">Bad
                                                            Debts</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I5BadDebts" name="frm1702EX:txtPg4S4I5BadDebts"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;6 </span>&nbsp;<span style="font-size: small;">Charitable
                                                            Contributions</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I6CharitableContri" name="frm1702EX:txtPg4S4I6CharitableContri"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;7 </span>&nbsp;<span style="font-size: small;">Commissions</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I7Commissions" name="frm1702EX:txtPg4S4I7Commissions"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;8 </span>&nbsp;<span style="font-size: small;">Communication,Light
                                                            and Water</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I8Communication" name="frm1702EX:txtPg4S4I8Communication"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;9 </span>&nbsp;<span style="font-size: small;">Depletion</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I9Depletion" name="frm1702EX:txtPg4S4I9Depletion"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;10 </span>&nbsp;<span style="font-size: small;">Depreciation</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I10Depreciation" name="frm1702EX:txtPg4S4I10Depreciation"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;11 </span>&nbsp;<span style="font-size: small;">Director's
                                                            Fees</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I11DirectorFees" name="frm1702EX:txtPg4S4I11DirectorFees"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;12 </span>&nbsp;<span style="font-size: small;">Fringe
                                                            Benefits</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I12FringeBenefits" name="frm1702EX:txtPg4S4I12FringeBenefits"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;13 </span>&nbsp;<span style="font-size: small;">Fuel
                                                            and Oil</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I13FuelAndOil" name="frm1702EX:txtPg4S4I13FuelAndOil"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;14 </span>&nbsp;<span style="font-size: small;">Insurance</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I14Insurance" name="frm1702EX:txtPg4S4I14Insurance"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;15 </span>&nbsp;<span style="font-size: small;">Interest</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I15Interest" name="frm1702EX:txtPg4S4I15Interest"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;16 </span>&nbsp;<span style="font-size: small;">Janitorial
                                                            and Messengerial Services</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I16Janitorial" name="frm1702EX:txtPg4S4I16Janitorial"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;17 </span>&nbsp;<span style="font-size: small;">Losses</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I17Losses" name="frm1702EX:txtPg4S4I17Losses"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;18 </span>&nbsp;<span style="font-size: small;">Management
                                                            and Consultancy Fee</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I18Management" name="frm1702EX:txtPg4S4I18Management"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;19 </span>&nbsp;<span style="font-size: small;">Miscellaneous</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I19Insurance" name="frm1702EX:txtPg4S4I19Insurance"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;20 </span>&nbsp;<span style="font-size: small;">Office
                                                            Supplies</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I20OfficeSupplies" name="frm1702EX:txtPg4S4I20OfficeSupplies"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;21 </span>&nbsp;<span style="font-size: small;">Other
                                                            Services</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I21OtherServices" name="frm1702EX:txtPg4S4I21OtherServices"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;22 </span>&nbsp;<span style="font-size: small;">Professional
                                                            Fees</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I22PersonalFees" name="frm1702EX:txtPg4S4I22PersonalFees"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;23 </span>&nbsp;<span style="font-size: small;">Rental</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I23Rental" name="frm1702EX:txtPg4S4I23Rental"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;24 </span>&nbsp;<span style="font-size: small;">Repairs
                                                            and Maintenance - (Labor or Labor & Materials)</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I24RepairLabor" name="frm1702EX:txtPg4S4I24RepairLabor"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;25 </span>&nbsp;<span style="font-size: small;">Repairs
                                                            and Maintenance - (Materials/Supplies)</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I25RepairMaterials" name="frm1702EX:txtPg4S4I25RepairMaterials"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;26 </span>&nbsp;<span style="font-size: small;">Representation
                                                            and Entertainment</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I26Representation" name="frm1702EX:txtPg4S4I26Representation"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;27 </span>&nbsp;<span style="font-size: small;">Research
                                                            and Development</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I27Research" name="frm1702EX:txtPg4S4I27Research"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;28 </span>&nbsp;<span style="font-size: small;">Royalties</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I28Royalties" name="frm1702EX:txtPg4S4I28Royalties"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;29</span> <span style="font-size: small;">
                                                            Salaries and Allowances</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg4S4I29Salaries" name="frm1702EX:txtPg4S4I29Salaries"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="Page5Content" style="margin: 0 auto; display: none; position: relative;
                                    width: 820px;" class="noCellSpace">
                                    <div id="title13" style="margin: 0 auto; position: relative;">
                                        <table width="100%" class="FormHeader" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="width: 45%;">
                                                    <span class="xlargeBold">Annual Income Tax Return</span>
                                                    <br />
                                                    <span class="mediumBold">Page 5 - Schedules 4, 5 & 6</span>
                                                </td>
                                                <td align="center">
                                                    <span class="xsmall">BIR Form No.<br />
                                                    </span><span class="xlargeBold">1702-EX<br />
                                                    </span><span class="xsmall">June 2013</span>
                                                </td>
                                                <td style="width: 40%;" valign="bottom" align="right">
                                                    <div style="float: right">
                                                        <img style="height: 35px; width: 250px;" src="{{ asset('images/Bar Codes/1702Ex_p5.png') }}"
                                                            alt="barcode" />
                                                        <br />
                                                        <span class="xsmallBold">1702-EX06/13P5</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="SubPageDiv">
                                        <table class="RowSubTable, tblForm" style="width: 100%">
                                            <tr>
                                                <td style="width: 40%;">
                                                    <span class="smallBold">TIN</span>
                                                </td>
                                                <td style="width: 60%; text-align: left;">
                                                    <span style="font-size: 11px;">Registered Name</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%;">
                                                    <input type="text" id="frm1702EX:txtPg5TinC1" value="{{$company->tin1}}" name="frm1702EX:TIN1" disabled="disabled"
                                                        maxlength="3" size="4" />
                                                    <input type="text" id="frm1702EX:txtPg5TinC2" value="{{$company->tin2}}"  name="frm1702EX:TIN2" disabled="disabled"
                                                        maxlength="3" size="4" />
                                                    <input type="text" id="frm1702EX:txtPg5TinC3" value="{{$company->tin3}}"  name="frm1702EX:TIN3" disabled="disabled"
                                                        maxlength="3" size="4" />
                                                    <span style="display: none;">
                                                        <input type="text" id="frm1702EX:txtPg5TinC4"  value="{{$company->tin4}}"  name="frm1702EX:TIN4" disabled="disabled"
                                                            maxlength="3" size="4" />
                                                    </span>
                                                    <input id="BranchMask5" name="BranchMask5" value="0000" size="4" disabled="disabled" />
                                                </td>
                                                <td style="width: 60%; text-align: left;">
                                                    <input type="text" disabled="disabled"  value="{{$company->registered_name}}"  id="frm1702EX:txtPg5RegisteredName" name="frm1702EX:RegName"
                                                        style="width: 470px;" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="SubPageDiv" id="Schedule4p2">
                                        <div id="sched4p2">
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdschedTitle border-grey">
                                                        <center>
                                                            <span style="font-weight: bold; font-size: small;">Schedule 4 - Ordinary Allowable Itemized
                                                                Deductions</span> <span style="font-style: italic; font-size: x-small;">(Continued from
                                                                    Previous Page)</span>
                                                        </center>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;30</span> <span style="font-size: small;">
                                                            Security Services</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S4I30SecurityServices" name="frm1702EX:txtPg5S4I30SecurityServices"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;31</span> <span style="font-size: small;">
                                                            SSS,GSIS,Philhealth, HDMF and Other Contributions</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S4I31SSS" name="frm1702EX:txtPg5S4I31SSS"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;32</span> <span style="font-size: small;">
                                                            Taxes and Licenses</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S4I32TaxesAndLicense" name="frm1702EX:txtPg5S4I32TaxesAndLicense"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;33</span> <span style="font-size: small;">
                                                            Tolling Fees</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S4I33TollingFees" name="frm1702EX:txtPg5S4I33TollingFees"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;34</span> <span style="font-size: small;">
                                                            Training and Seminars</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S4I34Training" name="frm1702EX:txtPg5S4I34Training"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;35</span> <span style="font-size: small;">
                                                            Transportation and Travel</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S4I35Transportation" name="frm1702EX:txtPg5S4I35Transportation"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" style="width: 100%;">
                                                        <span style="font-size: small;">&nbsp;&nbsp;&nbsp;&nbsp; Others</span> <span style="font-size: small;">
                                                            [Specify below; Add additional sheet(s) if necessary]</span>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;36</span>
                                                        <input type="text" id="frm1702EX:txtPg5S4I36Col1" name="frm1702EX:txtPg5S4I36Col1"
                                                            style="width: 70%;" maxlength="40" class="schedDesc" onkeypress="return Code(this)"
                                                            onblur="return capitalize(this), Check_Pg5S4I39()" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S4I36Col2" name="frm1702EX:txtPg5S4I36Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Check_Pg5S4I39(), Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;37</span>
                                                        <input type="text" id="frm1702EX:txtPg5S4I37Col1" name="frm1702EX:txtPg5S4I37Col1"
                                                            style="width: 70%;" maxlength="40" class="schedDesc" onkeypress="return Code(this)"
                                                            onblur="return capitalize(this), Check_Pg5S4I39()" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S4I37Col2" name="frm1702EX:txtPg5S4I37Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Check_Pg5S4I39(), Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;38</span>
                                                        <input type="text" id="frm1702EX:txtPg5S4I38Col1" name="frm1702EX:txtPg5S4I38Col1"
                                                            style="width: 70%;" maxlength="40" class="schedDesc" onkeypress="return Code(this)"
                                                            onblur="return capitalize(this), Check_Pg5S4I39()" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S4I38Col2" name="frm1702EX:txtPg5S4I38Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Check_Pg5S4I39(), Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;39</span>
                                                        <input type="text" id="frm1702EX:txtPg5S4I39Col1" name="frm1702EX:txtPg5S4I39Col1"
                                                            style="width: 70%;" onblur="return capitalize(this), Check_Pg5S4I39()" maxlength="40"
                                                            class="schedDesc" onkeypress="return Code(this)" />
                                                        <input type="button" value="(more...)" disabled="disabled" id="btnPg5S4I39More" onclick="Set_Pg5S4I39(), openDialog($('#Pg5S4I39Pop')), Load_Pg5S4I39PopTable()"
                                                            name="moreButton" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S4I39Col2" name="frm1702EX:txtPg5S4I39Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Check_Pg5S4I39(), Compute_txtPg5S4I40TotalAllowableDeduction()" maxlength="12" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;40</span> <span style="font-weight: bold;
                                                            font-size: small;">Total Ordinary Allowable Itemized Deductions</span> <span style="font-style: italic;
                                                                font-size: x-small;">(Sum of Items 1 to 39)</span> <a href="javascript:void(0)" class="xsmallItalic"
                                                                    onclick="goToSched(2)">(To Part IV Item 36)</a>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S4I40TotalAllowableDeduction" name="frm1702EX:txtPg5S4I40TotalAllowableDeduction"
                                                            style="width: 80%; text-align: right;" disabled="disabled" maxlength="12" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="SubPageDiv" id="Schedule5">
                                        <div id="sched5">
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdschedTitle border-grey">
                                                        <center>
                                                            <span style="font-weight: bold; font-size: small;">Schedule 5 - Special Allowable Itemized
                                                                Deductions</span> <span style="font-style: italic; font-size: x-small;">(Attach additional
                                                                    sheet/s,if necessary)</span>
                                                        </center>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="center" style="width: 42%;">
                                                        <span style="font-size: small;">Description</span>
                                                    </td>
                                                    <td align="center" style="width: 28%">
                                                        <span style="font-size: small;">Legal Basis</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <span style="font-size: small;">Amount</span>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="center" style="width: 2%">
                                                        <span style="font-weight: bold; font-size: small;">1</span>
                                                    </td>
                                                    <td align="center" class="tdWidth40">
                                                        <input type="text" id="frm1702EX:txtPg5S5I1Col1" name="frm1702EX:txtPg5S5I1Col1"
                                                            style="width: 70%;" maxlength="23" class="schedDesc" onkeypress="return Code(this)"
                                                            onblur="return capitalize(this), Check_Pg5S5I4()" />
                                                    </td>
                                                    <td align="center" style="width: 28%">
                                                        <input type="text" id="frm1702EX:txtPg5S5I1Col2" name="frm1702EX:txtPg5S5I1Col2"
                                                            style="width: 70%;" onblur="return capitalize(this), Check_Pg5S5I4()" maxlength="16"
                                                            class="schedDesc" onkeypress="return Code(this)" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S5I1Col3" name="frm1702EX:txtPg5S5I1Col3"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Check_Pg5S5I4(), Compute_txtPg5S5I5TotalAllowable()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="width: 2%">
                                                        <span style="font-weight: bold; font-size: small;">2</span>
                                                    </td>
                                                    <td align="center" class="tdWidth40">
                                                        <input type="text" id="frm1702EX:txtPg5S5I2Col1" name="frm1702EX:txtPg5S5I2Col1"
                                                            style="width: 70%;" maxlength="23" class="schedDesc" onkeypress="return Code(this)"
                                                            onblur="return capitalize(this), Check_Pg5S5I4()" />
                                                    </td>
                                                    <td align="center" style="width: 28%">
                                                        <input type="text" id="frm1702EX:txtPg5S5I2Col2" name="frm1702EX:txtPg5S5I2Col2"
                                                            style="width: 70%;" onblur="return capitalize(this), Check_Pg5S5I4()" maxlength="16"
                                                            class="schedDesc" onkeypress="return Code(this)" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S5I2Col3" name="frm1702EX:txtPg5S5I2Col3"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Check_Pg5S5I4(), Compute_txtPg5S5I5TotalAllowable()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="width: 2%">
                                                        <span style="font-weight: bold; font-size: small;">3</span>
                                                    </td>
                                                    <td align="center" class="tdWidth40">
                                                        <input type="text" id="frm1702EX:txtPg5S5I3Col1" name="frm1702EX:txtPg5S5I3Col1"
                                                            style="width: 70%;" maxlength="23" class="schedDesc" onkeypress="return Code(this)"
                                                            onblur="return capitalize(this), Check_Pg5S5I4()" />
                                                    </td>
                                                    <td align="center" style="width: 28%">
                                                        <input type="text" id="frm1702EX:txtPg5S5I3Col2" name="frm1702EX:txtPg5S5I3Col2"
                                                            style="width: 70%;" onblur="return capitalize(this), Check_Pg5S5I4()" maxlength="16"
                                                            class="schedDesc" onkeypress="return Code(this)" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S5I3Col3" name="frm1702EX:txtPg5S5I3Col3"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Check_Pg5S5I4(), Compute_txtPg5S5I5TotalAllowable()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="width: 2%;vertical-align: baseline;">
                                                        <span style="font-weight: bold; font-size: small;">4</span>
                                                    </td>
                                                    <td align="center" class="tdWidth40">
                                                        <input type="text" id="frm1702EX:txtPg5S5I4Col1" name="frm1702EX:txtPg5S5I4Col1"
                                                            style="width: 70%;" onblur="return capitalize(this), Check_Pg5S5I4()" maxlength="23"
                                                            class="schedDesc" onkeypress="return Code(this)" />
                                                        <br />
                                                        <input type="button" value="(more...)" id="btnPg5S5I4More" disabled="disabled" onclick="Set_Pg5S5I4(), openDialog($('#Pg5S5I4Pop')), Load_Pg5S5I4PopTable()"
                                                            name="moreButton" />
                                                    </td>
                                                    <td align="center" valign="top" style="width: 28%">
                                                        <input type="text" id="frm1702EX:txtPg5S5I4Col2" name="frm1702EX:txtPg5S5I4Col2"
                                                            style="width: 70%;" onblur="return capitalize(this), Check_Pg5S5I4()" maxlength="16"
                                                            class="schedDesc" onkeypress="return Code(this)" />
                                                    </td>
                                                    <td align="center" valign="top" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S5I4Col3" name="frm1702EX:txtPg5S5I4Col3"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Check_Pg5S5I4(), Compute_txtPg5S5I5TotalAllowable()" maxlength="12" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="center" style="width: 2%">
                                                        <span style="font-weight: bold; font-size: small;">5</span>
                                                    </td>
                                                    <td align="left" style="width: 68%">
                                                        <span style="font-weight: bold; font-size: small;">Total Special Allowable Itemized
                                                            Deductions</span> <span style="font-weight: bold; font-size: x-small; font-style: italic;">
                                                                (Sum of Items 1 to 4)</span> <a href="javascript:void(0)" class="xsmallItalic" onclick="goToSched(2)">
                                                                    (To Part IV Item 37)</a>
                                                    </td>
                                                    <td align="center" style="width: 30%;">
                                                        <input type="text" id="frm1702EX:txtPg5S5I5TotalAllowable" name="frm1702EX:txtPg5S5I5TotalAllowable"
                                                            style="width: 80%; text-align: right;" disabled="disabled" maxlength="12" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="SubPageDiv" id="Schedule6">
                                        <div id="sched6">
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdschedTitle border-grey" colspan="2">
                                                        <center>
                                                            <span style="font-weight: bold; font-size: small;">Schedule 6 - Reconciliation of Net
                                                                Income per Books Against Taxable Income </span><span style="font-weight: bold; font-size: x-small;
                                                                    font-style: italic;">(Attach Additional sheet/s, if necessary)</span>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;1</span> <span style="font-size: small;">
                                                            Net Income/(Loss) per books</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S6I1NetIncomeLoss" name="frm1702EX:txtPg5S6I1NetIncomeLoss"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumberNeg(this, event)"
                                                            onblur="Compute_txtPg5S6I4Total(), Compute_txtPg5S6I10NetTaxable()" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-size: small">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Add: Non-deductible Expenses/Taxable
                                                        Other Income
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;2</span>
                                                        <input type="text" id="frm1702EX:txtPg5S6I2Col1" name="frm1702EX:txtPg5S6I2Col1"
                                                            style="width: 70%;" maxlength="40" class="schedDesc" onkeypress="return Code(this)"
                                                            onblur="return capitalize(this), Check_Pg5S6I3()" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S6I2Col2" name="frm1702EX:txtPg5S6I2Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Check_Pg5S6I3(), Compute_txtPg5S6I4Total(), Compute_txtPg5S6I10NetTaxable()"
                                                            maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;3</span>
                                                        <input type="text" id="frm1702EX:txtPg5S6I3Col1" name="frm1702EX:txtPg5S6I3Col1"
                                                            style="width: 70%;" onblur="return capitalize(this), Check_Pg5S6I3()" maxlength="40"
                                                            class="schedDesc" onkeypress="return Code(this)" /><input type="button" value="(more...)"
                                                                disabled="disabled" id="btnPg5S6I3More" onclick="Set_Pg5S6I3(), openDialog($('#Pg5S6I3Pop')), Load_Pg5S6I3PopTable()"
                                                                name="moreButton" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S6I3Col2" name="frm1702EX:txtPg5S6I3Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Check_Pg5S6I3(), Compute_txtPg5S6I4Total(), Compute_txtPg5S6I10NetTaxable()"
                                                            maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;4</span> <span style="font-size: small;">
                                                            Total</span> <span style="font-style: italic; font-size: x-small;">(Sum of Items 1 to
                                                                3)</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S6I4Total" name="frm1702EX:txtPg5S6I4Total"
                                                            style="width: 80%; text-align: right;" disabled="disabled" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-size: small">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Less: A) Non-taxable Income and Income
                                                        Subjected to Final Tax
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;5</span>
                                                        <input type="text" id="frm1702EX:txtPg5S6I5Col1" name="frm1702EX:txtPg5S6I5Col1"
                                                            style="width: 70%;" maxlength="40" class="schedDesc" onkeypress="return Code(this)"
                                                            onblur="return capitalize(this), Check_Pg5S6I6()" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S6I5Col2" name="frm1702EX:txtPg5S6I5Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur=" Check_Pg5S6I6(), Compute_txtPg5S6I9Col2(), Compute_txtPg5S6I10NetTaxable()"
                                                            maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;6</span>
                                                        <input type="text" id="frm1702EX:txtPg5S6I6Col1" name="frm1702EX:txtPg5S6I6Col1"
                                                            style="width: 70%;" onblur="return capitalize(this), Check_Pg5S6I6()" maxlength="40"
                                                            class="schedDesc" onkeypress="return Code(this)" /><input type="button" value="(more...)"
                                                                id="btnPg5S6I6More" disabled="disabled" onclick="Set_Pg5S6I6(), openDialog($('#Pg5S6I6Pop')), Load_Pg5S6I6PopTable()"
                                                                name="moreButton" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S6I6Col2" name="frm1702EX:txtPg5S6I6Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur=" Check_Pg5S6I6(), Compute_txtPg5S6I9Col2(), Compute_txtPg5S6I10NetTaxable()"
                                                            maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-size: small">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        B) Special Deductions
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;7</span>
                                                        <input type="text" id="frm1702EX:txtPg5S6I7Col1" name="frm1702EX:txtPg5S6I7Col1"
                                                            style="width: 70%;" maxlength="40" class="schedDesc" onkeypress="return Code(this)"
                                                            onblur="return capitalize(this), Check_Pg5S6I8()" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S6I7Col2" name="frm1702EX:txtPg5S6I7Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Check_Pg5S6I8(), Compute_txtPg5S6I9Col2(), Compute_txtPg5S6I10NetTaxable()"
                                                            maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;8</span>
                                                        <input type="text" id="frm1702EX:txtPg5S6I8Col1" name="frm1702EX:txtPg5S6I8Col1"
                                                            style="width: 70%;" onblur="return capitalize(this), Check_Pg5S6I8()" maxlength="40"
                                                            class="schedDesc" onkeypress="return Code(this)" /><input type="button" value="(more...)"
                                                                id="btnPg5S6I8More" disabled="disabled" onclick="Set_Pg5S6I8(),openDialog($('#Pg5S6I8Pop')), Load_Pg5S6I8PopTable()"
                                                                name="moreButton" />
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S6I8Col2" name="frm1702EX:txtPg5S6I8Col2"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            maxlength="12" onblur="Check_Pg5S6I8(), Compute_txtPg5S6I9Col2(), Compute_txtPg5S6I10NetTaxable()" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;9</span> <span style="font-size: small;">
                                                            Total</span> <span style="font-style: italic; font-size: x-small;">(Sum of Items 5 to
                                                                8)</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S6I9Col2" name="frm1702EX:txtPg5S6I9Col2"
                                                            style="width: 80%; text-align: right;" disabled="disabled" maxlength="12" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;10</span> <span style="font-weight: bold;
                                                            font-size: small;">Net Taxable Income (Loss) </span><span style="font-weight: bold;
                                                                font-size: x-small; font-style: italic;">(Item 4 Less Item 9)</span>
                                                    </td>
                                                    <td align="center" style="width: 40%;">
                                                        <input type="text" id="frm1702EX:txtPg5S6I10NetTaxable" name="frm1702EX:txtPg5S6I10NetTaxable"
                                                            style="width: 80%; text-align: right;" disabled="disabled" maxlength="12" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="Page6Content" style="margin: 0 auto; display: none; position: relative;
                                    width: 820px;" class="noCellSpace">
                                    <div id="title8" style="margin: 0 auto; position: relative;">
                                        <table width="100%" class="FormHeader" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="width: 45%;">
                                                    <span class="xlargeBold">Annual Income Tax Return</span>
                                                    <br />
                                                    <span class="mediumBold">Page 6 - Schedules 7 & 8</span>
                                                </td>
                                                <td align="center">
                                                    <span class="xsmall">BIR Form No.<br />
                                                    </span><span class="xlargeBold">1702-EX<br />
                                                    </span><span class="xsmall">June 2013</span>
                                                </td>
                                                <td style="width: 40%;" valign="bottom" align="right">
                                                    <div style="float: right">
                                                        <img style="height: 35px; width: 250px;" src="{{ asset('images/Bar Codes/1702Ex_p6.png') }}"
                                                            alt="barcode" />
                                                        <br />
                                                        <span class="xsmallBold">1702-EX06/13P6</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="TinName8" style="margin: 0 auto; position: relative;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="width: 40%;">
                                                    <span class="smallBold">TIN</span>
                                                </td>
                                                <td style="width: 60%; text-align: left;">
                                                    <span style=" font-size: 11px;">Registered Name</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%;">
                                                    <input type="text" id="frm1702EX:txtPg6TinC1" value="{{$company->tin1}}" name="frm1702EX:TIN1" disabled="disabled"
                                                        maxlength="3" size="4" />
                                                    <input type="text" id="frm1702EX:txtPg6TinC2" value="{{$company->tin2}}"  name="frm1702EX:TIN2" disabled="disabled"
                                                        maxlength="3" size="4" />
                                                    <input type="text" id="frm1702EX:txtPg6TinC3" value="{{$company->tin3}}"  name="frm1702EX:TIN3" disabled="disabled"
                                                        maxlength="3" size="4" />
                                                    <span style="display: none;">
                                                        <input type="text" id="frm1702EX:txtPg6TinC4" value="{{$company->tin4}}"  name="frm1702EX:TIN4" disabled="disabled"
                                                            maxlength="3" size="4" />
                                                    </span>
                                                    <input id="BranchMask6" name="BranchMask6" value="0000" size="4" disabled="disabled" />
                                                </td>
                                                <td style="width: 60%; text-align: left;">
                                                    <input type="text" id="frm1702EX:txtPg6RegisteredName" value="{{$company->registered_name}}"  name="frm1702EX:RegName" disabled="disabled"
                                                        style="width: 470px;" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="sched7">
                                        <div class="SubPageDiv">
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdschedTitle border-grey">
                                                        <center>
                                                            <span style="font-weight: bold; font-size: small;">Schedule 7 - BALANCE SHEET</span></center>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td colspan="2" align="center" class="tdschedTitle">
                                                        <center>
                                                            <span style="font-weight: bold; font-size: small;">Assets</span></center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;1</span> Current Assets
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I1CurrentAssets" name="frm1702EX:txtPg6S7I1CurrentAssets"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg6S7I7TotalAssets()" maxlength="15" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;2</span> Long-Term Investment
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I2LongInvestment" name="frm1702EX:txtPg6S7I2LongInvestment"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg6S7I7TotalAssets()" maxlength="15" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;3</span> Property, Plant
                                                        and Equipment - Net
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I3Property" name="frm1702EX:txtPg6S7I3Property"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg6S7I7TotalAssets()" maxlength="15" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;4</span>&nbsp; Long-Term
                                                        Receivables
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I4LongReceivables" name="frm1702EX:txtPg6S7I4LongReceivables"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg6S7I7TotalAssets()" maxlength="15" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;5</span> Intangible Assets
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I5IntangibleAssets" name="frm1702EX:txtPg6S7I5IntangibleAssets"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg6S7I7TotalAssets()" maxlength="15" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;6</span> Other Assets
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I6OtherAssets" name="frm1702EX:txtPg6S7I6OtherAssets"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg6S7I7TotalAssets()" maxlength="15" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;7</span> <span style="font-weight: bold;
                                                            font-size: small;">Total Assets</span> <span style="font-style: italic; font-size: x-small;">
                                                                (Sum of Items 1 to 6)</span>&nbsp;
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I7TotalAssets" name="frm1702EX:txtPg6S7I7TotalAssets"
                                                            style="width: 80%; text-align: right;" disabled="disabled" maxlength="15" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="SubPageDiv">
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdschedTitle border-grey">
                                                        <center>
                                                            <span style="font-weight: bold; font-size: small;">Liabilities and Equity</span></center>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="RowSubTable, tblForm" style="width: 100%">
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;8</span> Current Liabilities
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I8CurrentLiabilities" name="frm1702EX:txtPg6S7I8CurrentLiabilities"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg6S7I12TotalLiabilities(), Compute_txtPg6S7I17LiabilitiesAndEquity()"
                                                            maxlength="15" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;9</span> Long Term Liabilities
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I9LongLiabilities" name="frm1702EX:txtPg6S7I9LongLiabilities"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg6S7I12TotalLiabilities(), Compute_txtPg6S7I17LiabilitiesAndEquity()"
                                                            maxlength="15" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;10</span> Deferred Credits
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I10DefferedCredits" name="frm1702EX:txtPg6S7I10DefferedCredits"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg6S7I12TotalLiabilities(), Compute_txtPg6S7I17LiabilitiesAndEquity()"
                                                            maxlength="15" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;11</span>&nbsp; Other Liabilities
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I11OtherLiablities" name="frm1702EX:txtPg6S7I11OtherLiablities"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg6S7I12TotalLiabilities(),  Compute_txtPg6S7I17LiabilitiesAndEquity()"
                                                            maxlength="15" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;12</span> <span style="font-weight: bold;
                                                            font-size: small;">Total Liabilities</span> <span style="font-style: italic; font-size: x-small;">
                                                                (Sum of Items 8 to 11)</span>&nbsp;
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I12TotalLiabilities" name="frm1702EX:txtPg6S7I12TotalLiabilities"
                                                            style="width: 80%; text-align: right;" disabled="disabled" maxlength="15" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;13</span> Capital Stock
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I13CapitalStock" name="frm1702EX:txtPg6S7I13CapitalStock"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg6S7I16TotalEquity(),  Compute_txtPg6S7I17LiabilitiesAndEquity()"
                                                            maxlength="15" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;14</span> Additional Paid-in
                                                        Capital
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I14AdditionalCapital" name="frm1702EX:txtPg6S7I14AdditionalCapital"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                            onblur="Compute_txtPg6S7I16TotalEquity(),  Compute_txtPg6S7I17LiabilitiesAndEquity()"
                                                            maxlength="15" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;15</span> Retained Earnings
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I15RetainedEarnings" name="frm1702EX:txtPg6S7I15RetainedEarnings"
                                                            style="width: 80%; text-align: right;" onkeypress="return wholenumberNeg(this, event)"
                                                            onblur="Compute_txtPg6S7I16TotalEquity(),  Compute_txtPg6S7I17LiabilitiesAndEquity()"
                                                            maxlength="15" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;16</span> <span style="font-weight: bold;
                                                            font-size: small;">Total Equity</span> <span style="font-style: italic; font-size: x-small;">
                                                                (Sum of Items 13 to 15)</span>&nbsp;
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I16TotalEquity" name="frm1702EX:txtPg6S7I16TotalEquity"
                                                            style="width: 80%; text-align: right;" disabled="disabled" maxlength="15" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="tdWidth70">
                                                        <span style="font-weight: bold; font-size: small;">&nbsp;17</span> <span style="font-weight: bold;
                                                            font-size: small;">Total Liabilities and Equity</span> <span style="font-style: italic;
                                                                font-size: x-small;">(Sum of Items 12 and 16)</span>&nbsp;
                                                    </td>
                                                    <td align="center" class="tdWidth30">
                                                        <input type="text" id="frm1702EX:txtPg6S7I17LiabilitiesAndEquity" name="frm1702EX:txtPg6S7I17LiabilitiesAndEquity"
                                                            style="width: 80%; text-align: right;" disabled="disabled" maxlength="15" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="SubPageDiv">
                                        <table class="RowSubTable, tblForm" style="width: 100%">
                                            <tr>
                                                <td class="tdschedTitle">
                                                    <center>
                                                        <table>
                                                            <tr style="text-align: left;">
                                                                <td>
                                                                    <span style="font-weight: bold; font-size: small;">Schedule 8&nbsp; -</span>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" class="styled" id="frm1702EX:chkPg6S8StockHolders" value="Stockholders" name="frm1702EX:chkPg6S8Radio"
                                                                        onclick="Select_StockHolders()" />
                                                                </td>
                                                                <td>
                                                                    <span style="font-weight: bold; font-size: small;">Stockholders</span>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" class="styled" id="frm1702EX:chkPg6S8Partners" value="Partners"  name="frm1702EX:chkPg6S8Radio"
                                                                        onclick="Select_Partners()" />
                                                                </td>
                                                                <td>
                                                                    <span style="font-weight: bold; font-size: small;">Partners</span>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" class="styled" id="frm1702EX:chkPg6S8MembersInfo" value="Member"  name="frm1702EX:chkPg6S8Radio" 
                                                                        onclick="Select_StockHolders()"/>
                                                                </td>
                                                                <td>
                                                                    <span style="font-weight: bold; font-size: small;">Members Information</span>
                                                                </td>
                                                                <td>
                                                                    <font face="Arial" size="2">(Top 20 stockholders, partners or members)</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="8">
                                                                    <font face="Arial" size="2" style="font-style: italic;">(On column 3 enter the amount
                                                                        of capital contribution and on the last column enter the percentage this represents
                                                                        on the entire ownership.)</font>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </center>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="SubPageDiv">
                                        <table class="RowSubTable, tblForm" style="width: 100%">
                                            <tr>
                                                <td class="smallBold" align="center" style="width: 40%">
                                                    REGISTERED NAME
                                                </td>
                                                <td class="smallBold" align="center" style="width: 25%">
                                                    TIN
                                                </td>
                                                <td class="smallBold" align="center" style="width: 20%">
                                                    Capital Contribution
                                                </td>
                                                <td class="smallBold" align="center" style="width: 15%">
                                                    % to total
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="SubPageDiv" id="sched8">
                                        <table class="RowSubTable, tblForm" style="width: 100%">
                                            <tr>
                                                <th style="width: 40%; text-align: center;" align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I1Col1Name" name="frm1702EX:txtPg6S8I1Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </th>
                                                <th style="width: 25%; text-align: center;" align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I1Col2TIN1" name="frm1702EX:txtPg6S8I1Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I1Col2TIN2" name="frm1702EX:txtPg6S8I1Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I1Col2TIN3" name="frm1702EX:txtPg6S8I1Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I1Col2TIN4" name="frm1702EX:txtPg6S8I1Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </th>
                                                <th style="width: 20%; text-align: center;" align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I1Col3CapContri" name="frm1702EX:txtPg6S8I1Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </th>
                                                <th style="width: 15%; text-align: center;" align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I1Col4PTotal" name="frm1702EX:txtPg6S8I1Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </th>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I2Col1Name" name="frm1702EX:txtPg6S8I2Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I2Col2TIN1" name="frm1702EX:txtPg6S8I2Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I2Col2TIN2" name="frm1702EX:txtPg6S8I2Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I2Col2TIN3" name="frm1702EX:txtPg6S8I2Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I2Col2TIN4" name="frm1702EX:txtPg6S8I2Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I2Col3CapContri" name="frm1702EX:txtPg6S8I2Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I2Col4PTotal" name="frm1702EX:txtPg6S8I2Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I3Col1Name" name="frm1702EX:txtPg6S8I3Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I3Col2TIN1" name="frm1702EX:txtPg6S8I3Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I3Col2TIN2" name="frm1702EX:txtPg6S8I3Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I3Col2TIN3" name="frm1702EX:txtPg6S8I3Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I3Col2TIN4" name="frm1702EX:txtPg6S8I3Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I3Col3CapContri" name="frm1702EX:txtPg6S8I3Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I3Col4PTotal" name="frm1702EX:txtPg6S8I3Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I4Col1Name" name="frm1702EX:txtPg6S8I4Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I4Col2TIN1" name="frm1702EX:txtPg6S8I4Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I4Col2TIN2" name="frm1702EX:txtPg6S8I4Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I4Col2TIN3" name="frm1702EX:txtPg6S8I4Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I4Col2TIN4" name="frm1702EX:txtPg6S8I4Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I4Col3CapContri" name="frm1702EX:txtPg6S8I4Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I4Col4PTotal" name="frm1702EX:txtPg6S8I4Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I5Col1Name" name="frm1702EX:txtPg6S8I5Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I5Col2TIN1" name="frm1702EX:txtPg6S8I5Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I5Col2TIN2" name="frm1702EX:txtPg6S8I5Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I5Col2TIN3" name="frm1702EX:txtPg6S8I5Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I5Col2TIN4" name="frm1702EX:txtPg6S8I5Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I5Col3CapContri" name="frm1702EX:txtPg6S8I5Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I5Col4PTotal" name="frm1702EX:txtPg6S8I5Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I6Col1Name" name="frm1702EX:txtPg6S8I6Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I6Col2TIN1" name="frm1702EX:txtPg6S8I6Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I6Col2TIN2" name="frm1702EX:txtPg6S8I6Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I6Col2TIN3" name="frm1702EX:txtPg6S8I6Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I6Col2TIN4" name="frm1702EX:txtPg6S8I6Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I6Col3CapContri" name="frm1702EX:txtPg6S8I6Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I6Col4PTotal" name="frm1702EX:txtPg6S8I6Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I7Col1Name" name="frm1702EX:txtPg6S8I7Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <!--<input type="text" id="frm1702EX:txtPg6S8I7Col2TIN" name="frm1702EX:txtPg6S8I7Col2TIN"
                                                        style="width: 70%; text-align: left;" maxlength="12" onkeypress="return wholenumber(this, event)" />-->
                                                    <input type="text" id="frm1702EX:txtPg6S8I7Col2TIN1" name="frm1702EX:txtPg6S8I7Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I7Col2TIN2" name="frm1702EX:txtPg6S8I7Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I7Col2TIN3" name="frm1702EX:txtPg6S8I7Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I7Col2TIN4" name="frm1702EX:txtPg6S8I7Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I7Col3CapContri" name="frm1702EX:txtPg6S8I7Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I7Col4PTotal" name="frm1702EX:txtPg6S8I7Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I8Col1Name" name="frm1702EX:txtPg6S8I8Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <!--<input type="text" id="frm1702EX:txtPg6S8I8Col2TIN" name="frm1702EX:txtPg6S8I8Col2TIN"
                                                        style="width: 70%; text-align: left;" maxlength="12" onkeypress="return wholenumber(this, event)" />-->
                                                    <input type="text" id="frm1702EX:txtPg6S8I8Col2TIN1" name="frm1702EX:txtPg6S8I8Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I8Col2TIN2" name="frm1702EX:txtPg6S8I8Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I8Col2TIN3" name="frm1702EX:txtPg6S8I8Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I8Col2TIN4" name="frm1702EX:txtPg6S8I8Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I8Col3CapContri" name="frm1702EX:txtPg6S8I8Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I8Col4PTotal" name="frm1702EX:txtPg6S8I8Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I9Col1Name" name="frm1702EX:txtPg6S8I9Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <!--<input type="text" id="frm1702EX:txtPg6S8I9Col2TIN" name="frm1702EX:txtPg6S8I9Col2TIN"
                                                        style="width: 70%; text-align: left;" maxlength="12" onkeypress="return wholenumber(this, event)" />-->
                                                    <input type="text" id="frm1702EX:txtPg6S8I9Col2TIN1" name="frm1702EX:txtPg6S8I9Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I9Col2TIN2" name="frm1702EX:txtPg6S8I9Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I9Col2TIN3" name="frm1702EX:txtPg6S8I9Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I9Col2TIN4" name="frm1702EX:txtPg6S8I9Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I9Col3CapContri" name="frm1702EX:txtPg6S8I9Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I9Col4PTotal" name="frm1702EX:txtPg6S8I9Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I10Col1Name" name="frm1702EX:txtPg6S8I10Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <!--<input type="text" id="frm1702EX:txtPg6S8I10Col2TIN" name="frm1702EX:txtPg6S8I10Col2TIN"
                                                        style="width: 70%; text-align: left;" maxlength="12" onkeypress="return wholenumber(this, event)" />-->
                                                    <input type="text" id="frm1702EX:txtPg6S8I10Col2TIN1" name="frm1702EX:txtPg6S8I10Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I10Col2TIN2" name="frm1702EX:txtPg6S8I10Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I10Col2TIN3" name="frm1702EX:txtPg6S8I10Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I10Col2TIN4" name="frm1702EX:txtPg6S8I10Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I10Col3CapContri" name="frm1702EX:txtPg6S8I10Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I10Col4PTotal" name="frm1702EX:txtPg6S8I10Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I11Col1Name" name="frm1702EX:txtPg6S8I11Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <!--<input type="text" id="frm1702EX:txtPg6S8I11Col2TIN" name="frm1702EX:txtPg6S8I11Col2TIN"
                                                        style="width: 70%; text-align: left;" maxlength="12" onkeypress="return wholenumber(this, event)" />-->
                                                    <input type="text" id="frm1702EX:txtPg6S8I11Col2TIN1" name="frm1702EX:txtPg6S8I11Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I11Col2TIN2" name="frm1702EX:txtPg6S8I11Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I11Col2TIN3" name="frm1702EX:txtPg6S8I11Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I11Col2TIN4" name="frm1702EX:txtPg6S8I11Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I11Col3CapContri" name="frm1702EX:txtPg6S8I11Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I11Col4PTotal" name="frm1702EX:txtPg6S8I11Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I12Col1Name" name="frm1702EX:txtPg6S8I12Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <!--<input type="text" id="frm1702EX:txtPg6S8I12Col2TIN" name="frm1702EX:txtPg6S8I12Col2TIN"
                                                        style="width: 70%; text-align: left;" maxlength="12" onkeypress="return wholenumber(this, event)" />-->
                                                    <input type="text" id="frm1702EX:txtPg6S8I12Col2TIN1" name="frm1702EX:txtPg6S8I12Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I12Col2TIN2" name="frm1702EX:txtPg6S8I12Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I12Col2TIN3" name="frm1702EX:txtPg6S8I12Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I12Col2TIN4" name="frm1702EX:txtPg6S8I12Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I12Col3CapContri" name="frm1702EX:txtPg6S8I12Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I12Col4PTotal" name="frm1702EX:txtPg6S8I12Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I13Col1Name" name="frm1702EX:txtPg6S8I13Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <!--<input type="text" id="frm1702EX:txtPg6S8I13Col2TIN" name="frm1702EX:txtPg6S8I13Col2TIN"
                                                        style="width: 70%; text-align: left;" maxlength="12" onkeypress="return wholenumber(this, event)" />-->
                                                    <input type="text" id="frm1702EX:txtPg6S8I13Col2TIN1" name="frm1702EX:txtPg6S8I13Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I13Col2TIN2" name="frm1702EX:txtPg6S8I13Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I13Col2TIN3" name="frm1702EX:txtPg6S8I13Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I13Col2TIN4" name="frm1702EX:txtPg6S8I13Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I13Col3CapContri" name="frm1702EX:txtPg6S8I13Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I13Col4PTotal" name="frm1702EX:txtPg6S8I13Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I14Col1Name" name="frm1702EX:txtPg6S8I14Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <!--<input type="text" id="frm1702EX:txtPg6S8I14Col2TIN" name="frm1702EX:txtPg6S8I14Col2TIN"
                                                        style="width: 70%; text-align: left;" maxlength="12" onkeypress="return wholenumber(this, event)" />-->
                                                    <input type="text" id="frm1702EX:txtPg6S8I14Col2TIN1" name="frm1702EX:txtPg6S8I14Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I14Col2TIN2" name="frm1702EX:txtPg6S8I14Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I14Col2TIN3" name="frm1702EX:txtPg6S8I14Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I14Col2TIN4" name="frm1702EX:txtPg6S8I14Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I14Col3CapContri" name="frm1702EX:txtPg6S8I14Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I14Col4PTotal" name="frm1702EX:txtPg6S8I14Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I15Col1Name" name="frm1702EX:txtPg6S8I15Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <!--<input type="text" id="frm1702EX:txtPg6S8I15Col2TIN" name="frm1702EX:txtPg6S8I15Col2TIN"
                                                        style="width: 70%; text-align: left;" maxlength="12" onkeypress="return wholenumber(this, event)" />-->
                                                    <input type="text" id="frm1702EX:txtPg6S8I15Col2TIN1" name="frm1702EX:txtPg6S8I15Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I15Col2TIN2" name="frm1702EX:txtPg6S8I15Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I15Col2TIN3" name="frm1702EX:txtPg6S8I15Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I15Col2TIN4" name="frm1702EX:txtPg6S8I15Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I15Col3CapContri" name="frm1702EX:txtPg6S8I15Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I15Col4PTotal" name="frm1702EX:txtPg6S8I15Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I16Col1Name" name="frm1702EX:txtPg6S8I16Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <!--<input type="text" id="frm1702EX:txtPg6S8I16Col2TIN" name="frm1702EX:txtPg6S8I16Col2TIN"
                                                        style="width: 70%; text-align: left;" maxlength="12" onkeypress="return wholenumber(this, event)" />-->
                                                    <input type="text" id="frm1702EX:txtPg6S8I16Col2TIN1" name="frm1702EX:txtPg6S8I16Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I16Col2TIN2" name="frm1702EX:txtPg6S8I16Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I16Col2TIN3" name="frm1702EX:txtPg6S8I16Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I16Col2TIN4" name="frm1702EX:txtPg6S8I16Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I16Col3CapContri" name="frm1702EX:txtPg6S8I16Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I16Col4PTotal" name="frm1702EX:txtPg6S8I16Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I17Col1Name" name="frm1702EX:txtPg6S8I17Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <!--<input type="text" id="frm1702EX:txtPg6S8I17Col2TIN" name="frm1702EX:txtPg6S8I17Col2TIN"
                                                        style="width: 70%; text-align: left;" maxlength="12" onkeypress="return wholenumber(this, event)" />-->
                                                    <input type="text" id="frm1702EX:txtPg6S8I17Col2TIN1" name="frm1702EX:txtPg6S8I17Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I17Col2TIN2" name="frm1702EX:txtPg6S8I17Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I17Col2TIN3" name="frm1702EX:txtPg6S8I17Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I17Col2TIN4" name="frm1702EX:txtPg6S8I17Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I17Col3CapContri" name="frm1702EX:txtPg6S8I17Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I17Col4PTotal" name="frm1702EX:txtPg6S8I17Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I18Col1Name" name="frm1702EX:txtPg6S8I18Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <!--<input type="text" id="frm1702EX:txtPg6S8I18Col2TIN" name="frm1702EX:txtPg6S8I18Col2TIN"
                                                        style="width: 70%; text-align: left;" maxlength="12" onkeypress="return wholenumber(this, event)" />-->
                                                    <input type="text" id="frm1702EX:txtPg6S8I18Col2TIN1" name="frm1702EX:txtPg6S8I18Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I18Col2TIN2" name="frm1702EX:txtPg6S8I18Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I18Col2TIN3" name="frm1702EX:txtPg6S8I18Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I18Col2TIN4" name="frm1702EX:txtPg6S8I18Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I18Col3CapContri" name="frm1702EX:txtPg6S8I18Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I18Col4PTotal" name="frm1702EX:txtPg6S8I18Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I19Col1Name" name="frm1702EX:txtPg6S8I19Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <!--<input type="text" id="frm1702EX:txtPg6S8I19Col2TIN" name="frm1702EX:txtPg6S8I19Col2TIN"
                                                        style="width: 70%; text-align: left;" maxlength="12" onkeypress="return wholenumber(this, event)" />-->
                                                    <input type="text" id="frm1702EX:txtPg6S8I19Col2TIN1" name="frm1702EX:txtPg6S8I19Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I19Col2TIN2" name="frm1702EX:txtPg6S8I19Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I19Col2TIN3" name="frm1702EX:txtPg6S8I19Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I19Col2TIN4" name="frm1702EX:txtPg6S8I19Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I19Col3CapContri" name="frm1702EX:txtPg6S8I19Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I19Col4PTotal" name="frm1702EX:txtPg6S8I19Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I20Col1Name" name="frm1702EX:txtPg6S8I20Col1Name"
                                                        style="width: 80%; text-align: left;" onblur="return capitalize(this)" maxlength="24"
                                                        onkeypress="return Name(this)" />
                                                </td>
                                                <td align="center">
                                                    <!--<input type="text" id="frm1702EX:txtPg6S8I20Col2TIN" name="frm1702EX:txtPg6S8I20Col2TIN"
                                                        style="width: 70%; text-align: left;" maxlength="12" onkeypress="return wholenumber(this, event)" />-->
                                                    <input type="text" id="frm1702EX:txtPg6S8I20Col2TIN1" name="frm1702EX:txtPg6S8I20Col2TIN1"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I20Col2TIN2" name="frm1702EX:txtPg6S8I20Col2TIN2"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I20Col2TIN3" name="frm1702EX:txtPg6S8I20Col2TIN3"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                    <input type="text" id="frm1702EX:txtPg6S8I20Col2TIN4" name="frm1702EX:txtPg6S8I20Col2TIN4"
                                                        style="width: 17%; text-align: left;" maxlength="3" onkeypress="return wholenumber(this, event)" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I20Col3CapContri" name="frm1702EX:txtPg6S8I20Col3CapContri"
                                                        style="width: 80%; text-align: right;" onkeypress="return wholenumber(this, event)"
                                                        maxlength="12" />
                                                </td>
                                                <td align="center">
                                                    <input type="text" id="frm1702EX:txtPg6S8I20Col4PTotal" name="frm1702EX:txtPg6S8I20Col4PTotal"
                                                        style="width: 60%; text-align: center;" onkeypress="return numbersonly(this, event)"
                                                        maxlength="5" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div id="Page7Content" style="margin: 0 auto; display: none; position: relative;
                                    width: 820px;" class="noCellSpace">
                                    <div id="title9" style="margin: 0 auto; position: relative;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="FormHeader">
                                            <tr>
                                                <td align="center" style="width: 45%;">
                                                    <span class="xlargeBold">Annual Income Tax Return</span>
                                                    <br />
                                                    <span class="mediumBold">Page 7 - Schedules 9 & 10</span>
                                                </td>
                                                <td align="center">
                                                    <span class="xsmall">BIR Form No.<br />
                                                    </span><span class="xlargeBold">1702-EX<br />
                                                    </span><span class="xsmall">June 2013</span>
                                                </td>
                                                <td style="width: 40%;" valign="bottom" align="right">
                                                    <div style="float: right">
                                                        <img style="height: 35px; width: 250px;" src="{{ asset('images/Bar Codes/1702Ex_p7.png') }}"
                                                            alt="barcode" />
                                                        <br />
                                                        <span class="xsmallBold">1702-EX06/13P7</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="TinName9" style="margin: 0 auto; position: relative;">
                                        <table class="RowSubTable, tblForm" style="width: 100%">
                                            <tr>
                                                <td class="style1">
                                                    <span class="smallBold">TIN</span>
                                                </td>
                                                <td style="text-align: left;" class="style1">
                                                    <span class="smallBold">Registered Name</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%;">
                                                    <input id="frm1702EX:txtPg7TINC1" value="{{$company->tin1}}" name="frm1702EX:TIN1" type="text" disabled="disabled"
                                                        maxlength="3" size="4" />
                                                    <input id="frm1702EX:txtPg7TINC2" value="{{$company->tin2}}"  name="frm1702EX:TIN2" type="text" disabled="disabled"
                                                        maxlength="3" size="4" />
                                                    <input id="frm1702EX:txtPg7TINC3" value="{{$company->tin3}}"  name="frm1702EX:TIN3" type="text" disabled="disabled"
                                                        maxlength="3" size="4" />
                                                    <span style="display: none;">
                                                        <input id="frm1702EX:txtPg7TINC4" value="{{$company->tin4}}"  name="frm1702EX:TIN4" type="text" disabled="disabled"
                                                            maxlength="4" size="4" />
                                                    </span>
                                                    <input id="BranchMask7" name="BranchMask7" value="0000" size="4" disabled="disabled" />
                                                </td>
                                                <td style="width: 60%; text-align: left;">
                                                    <input type="text" id="frm1702EX:txtPg7RegisteredName"  value="{{$company->registered_name}}"  name="frm1702EX:RegName" disabled="disabled"
                                                                    style="width: 470px;" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="Schedule13and14" style="margin: 0 auto; position: relative;">
                                        <table id="page8table" class="page8table">
                                            <tr>
                                                <td>
                                                    <div id="frm1702EX:divSchedule12">
                                                        <table class="tblForm" id="frm1702EX:tblSchedule12Header">
                                                            <tr>
                                                                <td align="left" style="width: 820px; text-align: center;" class="border-grey TopBottomBorder">
                                                                    <span class="ContentHeader">Schedule 9 - Supplemental Information</span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <div id="sched9Pt1">
                                                            <table class="tblForm" id="frm1702EX:tblSchedule10I">
                                                                <tr>
                                                                    <td style="width: 139px; text-align: left;">
                                                                        <span style="font-size: 11px; font-weight: bold;">I) Gross Income /<br />
                                                                            &nbsp;&nbsp; Receipts Subjected to
                                                                            <br />
                                                                            &nbsp;&nbsp; Final Withholding</span>
                                                                    </td>
                                                                    <td style="width: 195px; text-align: center;">
                                                                        <span class="smallBold">A) Exempt</span>
                                                                    </td>
                                                                    <td style="width: 195px; text-align: center;">
                                                                        <span class="smallBold">B) Actual Amount / Fair Market Value / Net Capital Gains</span>
                                                                    </td>
                                                                    <td style="width: 195px; text-align: center;">
                                                                        <span class="smallBold">C) Final Tax Withheld / Paid</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 135px; text-align: left;">
                                                                        <span class="smallBold">1</span> Interests
                                                                    </td>
                                                                    <td style="width: 205px;text-align: center;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I1InterestsC1" tabindex="10" name="frm1702EX:txtPg7Sc9I1InterestsC1"
                                                                            size="25" style="text-align: right;" maxlength="12" onkeypress="return wholenumber(this, event)" />
                                                                    </td>
                                                                    <td style="width: 205px;text-align: center;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I1InterestsC2" tabindex="20" name="frm1702EX:txtPg7Sc9I1InterestsC2"
                                                                            size="25" style="text-align: right;" maxlength="12" onkeypress="return wholenumber(this, event)" />
                                                                    </td>
                                                                    <td style="width: 205px;text-align: center;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I1InterestsC3" tabindex="30" name="frm1702EX:txtPg7Sc9I1InterestsC3"
                                                                            size="25" onblur="Compute_Page7_Sched9_Item19()" style="text-align: right;" onkeypress="return wholenumber(this, event)"
                                                                            onblur="Compute_Page7_Sched9_Item19()" maxlength="12" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 135px; text-align: left;">
                                                                        <span class="smallBold">2</span> Royalties
                                                                    </td>
                                                                    <td style="width: 205px;text-align: center;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I2RoyaltiesC1"  tabindex="11" name="frm1702EX:txtPg7Sc9I2RoyaltiesC1"
                                                                            size="25" style="text-align: right;" maxlength="12" onkeypress="return wholenumber(this, event)" />
                                                                    </td>
                                                                    <td style="width: 205px;text-align: center;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I2RoyaltiesC2"  tabindex="21" name="frm1702EX:txtPg7Sc9I2RoyaltiesC2"
                                                                            size="25" style="text-align: right;" maxlength="12" onkeypress="return wholenumber(this, event)" />
                                                                    </td>
                                                                    <td style="width: 205px;text-align: center;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I2RoyaltiesC3"  tabindex="31" name="frm1702EX:txtPg7Sc9I2RoyaltiesC3"
                                                                            size="25" style="text-align: right;" onblur="Compute_Page7_Sched9_Item19()" maxlength="12"
                                                                            onkeypress="return wholenumber(this, event)" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 135px; text-align: left;">
                                                                        <span class="smallBold">3</span> Dividends
                                                                    </td>
                                                                    <td style="width: 205px;text-align: center;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I3DividendsC1"  tabindex="12" name="frm1702EX:txtPg7Sc9I3DividendsC1"
                                                                            size="25" style="text-align: right;" maxlength="12" onkeypress="return wholenumber(this, event)" />
                                                                    </td>
                                                                    <td style="width: 205px;text-align: center;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I3DividendsC2"  tabindex="22" name="frm1702EX:txtPg7Sc9I3DividendsC2"
                                                                            size="25" style="text-align: right;" maxlength="12" onkeypress="return wholenumber(this, event)" />
                                                                    </td>
                                                                    <td style="width: 205px;text-align: center;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I3DividendsC3"  tabindex="32" name="frm1702EX:txtPg7Sc9I3DividendsC3"
                                                                            size="25" style="text-align: right;" onblur="Compute_Page7_Sched9_Item19()" maxlength="12"
                                                                            onkeypress="return wholenumber(this, event)" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 135px; text-align: left;">
                                                                        <span class="smallBold">4</span> Prizes and Winnings
                                                                    </td>
                                                                    <td style="width: 205px;text-align: center;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I4PrizesC1"  tabindex="13" name="frm1702EX:txtPg7Sc9I4PrizesC1"
                                                                            size="25" style="text-align: right;" maxlength="12" onkeypress="return wholenumber(this, event)" />
                                                                    </td>
                                                                    <td style="width: 205px;text-align: center;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I4PrizesC2"  tabindex="23" name="frm1702EX:txtPg7Sc9I4PrizesC2"
                                                                            size="25" style="text-align: right;" maxlength="12" onkeypress="return wholenumber(this, event)" />
                                                                    </td>
                                                                    <td style="width: 205px;text-align: center;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I4PrizesC3"  tabindex="33" name="frm1702EX:txtPg7Sc9I4PrizesC3"
                                                                            size="25" style="text-align: right;" onblur="Compute_Page7_Sched9_Item19()" maxlength="12"
                                                                            onkeypress="return wholenumber(this, event)" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4" align="right">
                                                                        <input type="button" value="(Add more...)" id="Pg7S9Pt1More" onclick="openDialog($('#Pg7S9Pt1Pop')),  Load_Pg7S9Pt1PopTable()"
                                                                            name="moreButton" />
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div id="sched9Pt2">
                                                            <table class="tblForm" id="frm1702EX:tblSchedule10II">
                                                                <tr>
                                                                    <th style="width: 340px; text-align: left;">
                                                                        II) Sale / Exchange of Real Properties
                                                                    </th>
                                                                    <th style="width: 205px;">
                                                                        A) Sale / Exchange #1
                                                                    </th>
                                                                    <th style="width: 205px;">
                                                                        B) Sale / Exchange #2
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">5</span> Description of Property <span class="xsmallItalic">
                                                                            (e.g., land, improvement, etc.) </span><span class="xsmall"></span>
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I5DescriptionofPropertyC1"  tabindex="100" name="frm1702EX:txtPg7Sc9I5DescriptionofPropertyC1" size="36" maxlength="21" onkeypress="return Code(this);" onblur="checkBtnPg7Pt2More();return capitalize(this);" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I5DescriptionofPropertyC2" tabindex="110" name="frm1702EX:txtPg7Sc9I5DescriptionofPropertyC2" size="36" maxlength="20" onkeypress="return Code(this);" onblur="checkBtnPg7Pt2More();return capitalize(this);" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">6</span> OCT/TCT/CCT/Tax Declaration No.
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I6OCTC1" tabindex="101" name="frm1702EX:txtPg7Sc9I6OCTC1"
                                                                            size="36" onkeypress="return wholenumber(this, event)" maxlength="21" onkeypress="return Code(this)"
                                                                            onblur="return capitalize(this)" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I6OCTC2" tabindex="111" name="frm1702EX:txtPg7Sc9I6OCTC2"
                                                                            size="36" onkeypress="return wholenumber(this, event)" maxlength="20" onkeypress="return Code(this)"
                                                                            onblur="return capitalize(this)" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">7</span> Certificate Authorizing Registration (CAR) No.
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I7CARC1" tabindex="102" name="frm1702EX:txtPg7Sc9I7CARC1"
                                                                            size="36" maxlength="21" onkeypress="return Code(this)" onblur="return capitalize(this)" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I7CARC2" tabindex="112" name="frm1702EX:txtPg7Sc9I7CARC2"
                                                                            size="36" maxlength="20" onkeypress="return Code(this)" onblur="return capitalize(this)" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">8</span> Actual Amount/Fair Market Value/Net Capital Gains
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I8ActualAmountC1" tabindex="103" name="frm1702EX:txtPg7Sc9I8ActualAmountC1"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            maxlength="12" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I8ActualAmountC2" tabindex="113" name="frm1702EX:txtPg7Sc9I8ActualAmountC2"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            maxlength="12" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">9</span> Final Tax Withheld/Paid
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I9FinalTaxC1" tabindex="104" name="frm1702EX:txtPg7Sc9I9FinalTaxC1"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            onblur="Compute_Page7_Sched9_Item19()" maxlength="12" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I9FinalTaxC2" tabindex="114" name="frm1702EX:txtPg7Sc9I9FinalTaxC2"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            onblur="Compute_Page7_Sched9_Item19()" maxlength="12" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" style="text-align: right;">
                                                                        <input type="button" id="btnPg7S9Pt2More" value="(Add more...)" name="moreButton" onclick="openDialog($('#Pg7S9Pt2Pop')), Load_Pg7S9Pt2PopDiv()" />
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div id="sched9Pt3">
                                                            <table class="tblForm" id="frm1702EX:tblSchedule10III">
                                                                <tr>
                                                                    <th style="width: 340px; text-align: left;">
                                                                        III) Sale / Exchange of Shares of Stock
                                                                    </th>
                                                                    <th style="width: 205px;">
                                                                        A) Sale / Exchange #1
                                                                    </th>
                                                                    <th style="width: 205px;">
                                                                        B) Sale / Exchange #2
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">10</span>&nbsp; Kind (PS/CS) / Stock Certificate Series
                                                                        No.
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <select id="frm1702EX:ddPg7S9I10C1" tabindex="200" name="frm1702EX:ddPg7S9I10C1">
                                                                            <option value="PS">PS</option>
                                                                            <option value="CS">CS</option>
                                                                        </select>
                                                                        <span class="xlarge">/</span>
                                                                        <input type="text" size="8" maxlength="13" tabindex="201" onkeypress="return Code(this)" id="frm1702EX:txtPg7Sc9I10PSCSC1"
                                                                            name="frm1702EX:txtPg7Sc9I10PSCSC1" onblur="checkBtnPg7Pt3More();return capitalize(this);" style="width: 130px" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <select id="frm1702EX:ddPg7S9I10C2" tabindex="210" name="frm1702EX:ddPg7S9I10C2">
                                                                            <option value="PS">PS</option>
                                                                            <option value="CS">CS</option>
                                                                        </select><span class="xlarge">/</span>
                                                                        <input type="text" size="8" maxlength="13" tabindex="211" onkeypress="return Code(this)" id="frm1702EX:txtPg7Sc9I10PSCSC2"
                                                                            name="frm1702EX:txtPg7Sc9I10PSCSC4" onblur="checkBtnPg7Pt3More();return capitalize(this);" style="width: 130px" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">11</span> Certificate Authorizing Reg. (CAR) No.
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I11CARC1" tabindex="202" name="frm1702EX:txtPg7Sc9I11CARC1"
                                                                            size="36" maxlength="21" onkeypress="return Code(this)" onblur="return capitalize(this)" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I11CARC2" tabindex="212" name="frm1702EX:txtPg7Sc9I11CARC2"
                                                                            size="36" maxlength="20" onkeypress="return Code(this)" onblur="return capitalize(this)" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">12</span> Number of Shares
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I12NumberofSharesC1" tabindex="203" name="frm1702EX:txtPg7Sc9I12NumberofSharesC1"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            maxlength="12" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I12NumberofSharesC2" tabindex="213" name="frm1702EX:txtPg7Sc9I12NumberofSharesC2"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            maxlength="12" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">13</span> Date of Issue <span style="font-style: italic;">(MM/DD/YYYY)
                                                                        </span>
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input id="frm1702EX:txtPg7Sc9I13DateofIssueC1" tabindex="204" name="frm1702EX:txtPg7Sc9I13DateofIssueC1"
                                                                            type="text" maxlength="10" size="20" onfocus="onFocusIterate(this)" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this, event)"
                                                                            onblur="onBlurIterate(this),validateIssueDateSched9(this);" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input id="frm1702EX:txtPg7Sc9I13DateofIssueC2" tabindex="214" name="frm1702EX:txtPg7Sc9I13DateofIssueC2"
                                                                            type="text" maxlength="10" size="20" onfocus="onFocusIterate(this)" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this, event)"
                                                                            onblur="onBlurIterate(this),validateIssueDateSched9(this);" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">14</span> Actual Amount/Fair Market Value/Net Capital Gains
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I14ActualAmountC1" tabindex="205" name="frm1702EX:txtPg7Sc9I14ActualAmountC1"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            maxlength="12" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I14ActualAmountC2" tabindex="215" name="frm1702EX:txtPg7Sc9I14ActualAmountC2"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            maxlength="12" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">15</span> Final Tax Withheld/Paid
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I15FinalTaxC1" tabindex="206" name="frm1702EX:txtPg7Sc9I15FinalTaxC1"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            onblur="Compute_Page7_Sched9_Item19()" maxlength="12" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I15FinalTaxC2" tabindex="216" name="frm1702EX:txtPg7Sc9I15FinalTaxC2"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            onblur="Compute_Page7_Sched9_Item19()" maxlength="12" />
                                                                    </td>
                                                                    <tr>
                                                                        <td colspan="3" style="text-align: right;">
                                                                            <input type="button" id="btnPg7S9Pt3More" value="(Add more...)" name="moreButton"
                                                                                onclick="openDialog($('#Pg7S9Pt3Pop')), Load_Pg7S9Pt3PopDiv()" />
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                    </tr>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div id="sched9Pt4">
                                                            <table class="tblForm" id="frm1702EX:tblSchedule10IV">
                                                                <tr>
                                                                    <th style="width: 340px; text-align: left;">
                                                                        IV) Other Income <span class="helpText">(Specify)</span>
                                                                    </th>
                                                                    <th style="width: 205px;">
                                                                        A) Other Income #1
                                                                    </th>
                                                                    <th style="width: 205px;">
                                                                        B) Other Income #2
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">16</span> Other Income Subject to Final Tax Under Sections
                                                                        &nbsp;&nbsp;&nbsp;
                                                                        <br />
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 57(A)/127/others of the Tax Code, as amended <span
                                                                            class="helpText">
                                                                            <br />
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="xsmallItalic">(Specify)</span>
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I16OtherIncomeC1" tabindex="300" name="frm1702EX:txtPg7Sc9I16OtherIncomeC1"
                                                                            size="36" maxlength="21" onkeypress="return Code(this)" onblur="checkBtnPg7Pt4More();return capitalize(this)" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I16OtherIncomeC2" tabindex="310" name="frm1702EX:txtPg7Sc9I16OtherIncomeC2"
                                                                            size="36" maxlength="20" onkeypress="return Code(this)" onblur="checkBtnPg7Pt4More();return capitalize(this)" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">17</span> Actual Amount/Fair Market Value/Net Capital Gains
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I17ActualAmountC1" tabindex="301" name="frm1702EX:txtPg7Sc9I17ActualAmountC1"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            maxlength="12" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I17ActualAmountC2" tabindex="311" name="frm1702EX:txtPg7Sc9I17ActualAmountC2"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            maxlength="12" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">18</span> Final Tax Withheld/Paid
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I18FinalTaxC1" tabindex="302" name="frm1702EX:txtPg7Sc9I18FinalTaxC1"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            onblur="Compute_Page7_Sched9_Item19()" maxlength="12" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I18FinalTaxC2" tabindex="312" name="frm1702EX:txtPg7Sc9I18FinalTaxC2"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            onblur="Compute_Page7_Sched9_Item19()" maxlength="12" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" style="text-align: right;">
                                                                        <input type="button" id="btnPg7S9Pt4More" value="(Add more...)" name="moreButton"
                                                                            onclick="openDialog($('#Pg7S9Pt4Pop')), Load_Pg7S9Pt4PopDiv()" />
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <table class="tblForm">
                                                                <tr>
                                                                    <th style="width: 525px; text-align: left;">
                                                                        19 Total Final Tax Withheld/Paid <span class="xsmallItalic">(Sum of Items 1C to 4C,
                                                                            9A, 9B, 15A, 15B, 18A & 18B)</span>
                                                                    </th>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc9I19TotalFinalTax" name="frm1702EX:txtPg7Sc9I19TotalFinalTax"
                                                                            size="36" disabled="disabled" style="text-align: right;" maxlength="12" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div id="frm1702EX:divSchedule13">
                                                        <table class="tblForm" id="frm1702EX:tblSchedule13Header">
                                                            <tr>
                                                                <td class="TopBottomBorder ContentHeader border-grey" style="text-align: center;">
                                                                    <span class="smallBold">Schedule 10 - Gross Income/Receipts Exempt from Income Tax</span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <div id="sched10Pt1">
                                                            <table class="tblForm" id="frm1702EX:tblSchedule13ReturnOfPremium">
                                                                <tr>
                                                                    <td style="width: 525px; text-align: left;">
                                                                        <span class="smallBold">1</span> Return of Premium <span class="helpText"></span>
                                                                        <span class="xsmallItalic">(Actual Amount/Fair Market Value)</span>
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc10I1ReturnofPremium" tabindex="320" name="frm1702EX:txtPg7Sc10I1ReturnofPremium"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            onblur="Compute_Page7_Sched10_Item8()" maxlength="12" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <table class="tblForm" id="frm1702EX:tblSchedule10I">
                                                                <tr>
                                                                    <th style="width: 340px; text-align: left;">
                                                                        I) Personal/Real Properties Received thru Gifts, Bequests, and Devises
                                                                    </th>
                                                                    <th style="width: 205px;">
                                                                        A) Personal/Real Properties #1
                                                                    </th>
                                                                    <th style="width: 205px;">
                                                                        B) Personal/Real Properties #2
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">2</span> Description of Property <span class="helpText">
                                                                        </span><span class="xsmallItalic">(e.g., land, improvement, etc.)</span>
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc10I2DescriptionofPropertyC1" tabindex="400" name="frm1702EX:txtPg7Sc10I2DescriptionofPropertyC1"
                                                                            size="36" maxlength="21" onkeypress="return Code(this)" onblur="checkBtnPg7Pt5More();return capitalize(this)" />
                                                                        
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc10I2DescriptionofPropertyC2" tabindex="410" name="frm1702EX:txtPg7Sc10I2DescriptionofPropertyC2"
                                                                            size="36" maxlength="20" onkeypress="return Code(this)" onblur="checkBtnPg7Pt5More();return capitalize(this)" />
                                                                        
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">3</span> Mode of Transfer <span class="helpText"></span>
                                                                        <span class="xsmallItalic">(e.g. Donation)</span>
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc10I3ModeofTransferC1" tabindex="401" name="frm1702EX:txtPg7Sc10I3ModeofTransferC1"
                                                                            size="36" maxlength="21" onkeypress="return Code(this)" onblur="return capitalize(this)" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc10I3ModeofTransferC2" tabindex="411" name="frm1702EX:txtPg7Sc10I3ModeofTransferC2"
                                                                            size="36" maxlength="20" onkeypress="return Code(this)" onblur="return capitalize(this)" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">4</span> Certificate Authorizing Registration (CAR) No.
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc10I4CARC1" tabindex="402" name="frm1702EX:txtPg7Sc10I4CARC1"
                                                                            size="36" maxlength="21" onkeypress="return Code(this)" onblur="return capitalize(this)" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc10I4CARC2" tabindex="412" name="frm1702EX:txtPg7Sc10I4CARC2"
                                                                            size="36" maxlength="20" onkeypress="return Code(this)" onblur="return capitalize(this)" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">5</span> Actual Amount/Fair Market Value
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc10I5ActualAmountC1" tabindex="403" name="frm1702EX:txtPg7Sc10I5ActualAmountC1"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            maxlength="12" onblur="Compute_Page7_Sched10_Item8()" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc10I5ActualAmountC2" tabindex="413" name="frm1702EX:txtPg7Sc10I5ActualAmountC2"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            maxlength="12" onblur="Compute_Page7_Sched10_Item8()" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" style="text-align: right;">
                                                                        <input type="button" id="btnPg7S9Pt5More" value="(Add more...)" name="moreButton"
                                                                            onclick="openDialog($('#Pg7S9Pt5Pop')), Load_Pg7S9Pt5PopDiv()" />
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div id="sched10Pt2">
                                                            <table class="tblForm" id="frm1702EX:tblSchedule10II">
                                                                <tr>
                                                                    <th style="width: 340px; text-align: left;">
                                                                        II) Other Exempt Income/Receipts
                                                                    </th>
                                                                    <th style="width: 205px;">
                                                                        A) Other Exempt Income #1
                                                                    </th>
                                                                    <th style="width: 205px;">
                                                                        B) Other Exempt Income #2
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">6</span> Other Exempt Income/Receipts Under Sec. 32 (B)
                                                                        of the Tax Code, as amended <span class="helpText"></span><span class="xsmallItalic">
                                                                            (Specify)</span>
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc10I6OtherExemptC1" tabindex="500" name="frm1702EX:txtPg7Sc10I6OtherExemptC1"
                                                                            size="36" maxlength="21" onkeypress="return Code(this)" onblur="checkBtnPg7Pt6More();return capitalize(this)" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc10I6OtherExemptC2" tabindex="510" name="frm1702EX:txtPg7Sc10I6OtherExemptC2"
                                                                            size="36" maxlength="20" onkeypress="return Code(this)" onblur="checkBtnPg7Pt6More();return capitalize(this)" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 340px; text-align: left;">
                                                                        <span class="smallBold">7</span> Actual Amount/Fair Market Value/Net Capital Gains
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc10I7ActualAmountC1" tabindex="501" name="frm1702EX:txtPg7Sc10I7ActualAmountC1"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            onblur="Compute_Page7_Sched10_Item8()" maxlength="12" />
                                                                    </td>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc10I7ActualAmountC2" tabindex="511" name="frm1702EX:txtPg7Sc10I7ActualAmountC2"
                                                                            size="36" onkeypress="return wholenumber(this, event)" style="text-align: right"
                                                                            onblur="Compute_Page7_Sched10_Item8()" maxlength="12" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" style="text-align: right;">
                                                                        <input type="button" id="btnPg7S9Pt6More" value="(Add more...)" name="moreButton"
                                                                            onclick="openDialog($('#Pg7S9Pt6Pop')), Load_Pg7S9Pt6PopDiv()" />
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <table class="tblForm" id="Table1">
                                                                <tr>
                                                                    <th style="width: 525px; text-align: left;">
                                                                        8 Total Income/Receipts Exempt from Income Tax <span class="xsmallItalic">(Sum of Items
                                                                            1, 5A, 5B, 7A & 7B)</span>
                                                                    </th>
                                                                    <td style="width: 205px;">
                                                                        <input type="text" id="frm1702EX:txtPg7Sc10I8TotalIncome" name="frm1702EX:txtPg7Sc10I8TotalIncome"
                                                                            size="36" disabled="disabled" style="text-align: right;" maxlength="12" />
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
                                <!--<div id="Print1Content" style="background-image: url('../img/for_printing/BIR Form 1702-EX1.png'); width:850px; height:1300px; position:relative; display:none; font-family: courier new;">                                    
                                -->
                                <div id="Print1Content" style="display: none; width: 850px; height: 1300px; font-family: Arial;">
                                    <img src="{{ asset('images/Print/BIR Form 1702-EX1.png') }}" style="position: absolute; background-color: white;
                                        width: 850px; height: 1300px;" />
                                    <div style="float: left; position: relative;" class="divPrint">
                                        <div style="float: left; position: absolute; left: 76px; top: 192px; height: 20px;
                                            width: 16px;">
                                            <span class='mediumBold' id="p1I0"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 154px; top: 192px; height: 17px;
                                            width: 12px;">
                                            <span class='mediumBold' id="p1I1"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 72px; top: 237px; width: 24px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I2" style="letter-spacing: 8px;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 150px; top: 237px; width: 24px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I3" style="letter-spacing: 8px;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 226px; top: 224px; height: 23px;
                                            width: 13px;">
                                            <span class='mediumBold' id="p1I4"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 289px; top: 224px; height: 19px;
                                            width: 13px;">
                                            <span class='mediumBold' id="p1I5"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 352px; top: 225px; width: 13px;">
                                            <span class='mediumBold' id="p1I6"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 417px; top: 225px; height: 20px;
                                            width: 12px;">
                                            <span class='mediumBold' id="p1I7"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 783px; top: 209px; height: 19px;
                                            width: 13px;">
                                            <span class='mediumBold' id="p1I8"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 783px; top: 231px; height: 23px;
                                            width: 13px;">
                                            <span class='mediumBold' id="p1I9"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 232px; top: 285px; width: 52px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I10" style="letter-spacing: 12pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 330px; top: 285px; width: 52px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I11" style="letter-spacing: 12pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 429px; top: 285px; width: 52px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I12" style="letter-spacing: 12pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 728px; top: 285px; width: 52px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I13" style="letter-spacing: 9pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 600px; top: 310px; width: 32px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I14" style="letter-spacing: 11pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 668px; top: 310px; width: 32px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I15" style="letter-spacing: 8pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 730px; top: 310px; width: 71px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I16" style="letter-spacing: 9pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 38px; top: 348px; width: 784px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I17" style="letter-spacing: 6pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 38px; top: 369px; width: 777px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I18" style="letter-spacing: 6pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 38px; top: 410px; width: 777px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I19" style="letter-spacing: 6pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 38px; top: 432px; width: 776px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I20" style="letter-spacing: 6pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 38px; top: 470px; width: 73px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I21" style="letter-spacing: 8.5pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 140px; top: 470px; width: 163px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I22" style="letter-spacing: 2pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 320px; top: 470px; width: 163px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I23" style="letter-spacing: 2pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 38px; top: 512px; width: 615px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I24" style="letter-spacing: 2pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 685px; top: 512px; width: 124px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I25" style="letter-spacing: 9.4pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 38px; top: 578px; width: 308px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I26" style="letter-spacing: 2pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 350px; top: 578px; width: 484px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I27" style="letter-spacing: 2pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 36px; top: 620px; width: 261px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I28" style="letter-spacing: 2pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 330px; top: 620px; width: 42px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I29" style="letter-spacing: 9.5pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 398px; top: 620px; width: 42px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I30" style="letter-spacing: 9.5pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 462px; top: 620px; width: 42px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I31" style="letter-spacing: 9.5pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 596px; top: 620px; width: 42px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I32" style="letter-spacing: 9.5pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 663px; top: 620px; width: 42px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I33" style="letter-spacing: 9.5pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 729px; top: 620px; width: 42px;
                                            height: 20px;">
                                            <span class='mediumBold' id="p1I34" style="letter-spacing: 9.5pt;"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 460px; top: 665px; width: 280px;
                                            text-align: right;">
                                            <span style="letter-spacing: 5pt; display:none;" class='mediumBold' id="p1I35"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 528px; top: 689px; width: 280px;
                                            text-align: right;">
                                            <span style="letter-spacing: 5pt;" class='mediumBold' id="p1I36"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 528px; top: 714px; width: 280px;
                                            text-align: right;">
                                            <span style="letter-spacing: 5pt;" class='mediumBold' id="p1I37"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 177px; top: 814px; width: 461px;">
                                            <span style="letter-spacing: 9pt;" class='mediumBold' id="p1I38"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 788px; top: 814px; width: 20px;">
                                            <span style="letter-spacing: 8pt;" class='mediumBold' id="p1I39"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 177px; top: 842px;">
                                            <span style="letter-spacing: 8pt;" class='mediumBold' id="p1I40"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 598px; top: 842px;">
                                            <span style="letter-spacing: 10pt;" class='mediumBold' id="p1I41"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 664px; top: 842px;">
                                            <span style="letter-spacing: 10pt;" class='mediumBold' id="p1I42"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 728px; top: 842px;">
                                            <span style="letter-spacing: 10pt;" class='mediumBold' id="p1I43"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 175px; top: 860px; width: 378px;">
                                            <span style="letter-spacing: 1pt;" class='mediumBold' id="p1I44"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 660px; top: 860px; width: 150px;
                                            text-align: right;">
                                            <span style="letter-spacing: 2pt;" class='mediumBold' id="p1I45"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 192px; top: 926px;">
                                            <span style="letter-spacing: 1pt;" class='mediumBold' id="p1I46"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 290px; top: 926px;">
                                            <span style="letter-spacing: 1pt;" class='mediumBold' id="p1I47"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 425px; top: 926px;">
                                            <span style="letter-spacing: 7.5pt;" class='mediumBold' id="p1I48"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 484px; top: 926px;">
                                            <span style="letter-spacing: 7.5pt;" class='mediumBold' id="p1I49"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 545px; top: 926px;">
                                            <span style="letter-spacing: 7.5pt;" class='mediumBold' id="p1I50"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 623px; top: 926px; width: 185px;
                                            text-align: right;">
                                            <span style="letter-spacing: 2pt;" class='mediumBold' id="p1I51"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 192px; top: 950px;">
                                            <span style="letter-spacing: 1pt;" class='mediumBold' id="p1I52"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 290px; top: 950px;">
                                            <span style="letter-spacing: 1pt;" class='mediumBold' id="p1I53"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 425px; top: 950px;">
                                            <span style="letter-spacing: 7.5pt;" class='mediumBold' id="p1I54"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 484px; top: 950px;">
                                            <span style="letter-spacing: 7.5pt;" class='mediumBold' id="p1I55"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 545px; top: 950px;">
                                            <span style="letter-spacing: 7.5pt;" class='mediumBold' id="p1I56"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 623px; top: 950px; width: 185px;
                                            text-align: right;">
                                            <span style="letter-spacing: 2pt;" class='mediumBold' id="p1I57"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 290px; top: 973px;">
                                            <span style="letter-spacing: 1pt;" class='mediumBold' id="p1I58"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 425px; top: 973px;">
                                            <span style="letter-spacing: 7.5pt;" class='mediumBold' id="p1I59"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 484px; top: 973px;">
                                            <span style="letter-spacing: 7.5pt;" class='mediumBold' id="p1I60"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 545px; top: 973px;">
                                            <span style="letter-spacing: 7.5pt;" class='mediumBold' id="p1I61"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 623px; top: 973px; width: 185px;
                                            text-align: right;">
                                            <span style="letter-spacing: 2pt;" class='mediumBold' id="p1I62"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 36px; top: 1013px; width: 170px;">
                                            <span style="letter-spacing: 1pt;" class='mediumBold' id="p1I63"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 192px; top: 1013px;">
                                            <span style="letter-spacing: 1pt;" class='mediumBold' id="p1I64"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 290px; top: 1013px;">
                                            <span style="letter-spacing: 1pt;" class='mediumBold' id="p1I65"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 425px; top: 1013px;">
                                            <span style="letter-spacing: 7pt;" class='mediumBold' id="p1I66"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 484px; top: 1013px;">
                                            <span style="letter-spacing: 7pt;" class='mediumBold' id="p1I67"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 545px; top: 1013px;">
                                            <span style="letter-spacing: 7pt;" class='mediumBold' id="p1I68"></span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 623px; top: 1013px; width: 185px;
                                            text-align: right;">
                                            <span style="letter-spacing: 2pt;" class='mediumBold' id="p1I69"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--<div id="Print2Content" style="background-image: url('../img/for_printing/BIR Form 1702-EX2.png'); width:850px; height:1300px; position:relative; display:none; font-family: courier new;">                                    
                -->
                                <div id="Print2Content" style="display: none; width: 850px; height: 1300px; font-family: Arial;">
                                    <img src="{{ asset('images/Print/BIR Form 1702-EX2.png') }}" style="position: absolute; background-color: white;
                                        width: 850px; height: 1300px;" />
                                    <div style="float: left; position: relative;" class="divPrint">
                                        <div style="float: left; position: absolute; left: 38px; top: 156px;">
                                            <span class='mediumBold' style="letter-spacing: 9.4pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 104px; top: 156px;">
                                            <span class='mediumBold' style="letter-spacing: 9.4pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 170px; top: 156px;">
                                            <span class='mediumBold' style="letter-spacing: 9.4pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 351px; top: 156px; width: 456px;">
                                            <span class='mediumBold' style="letter-spacing: 2pt;">XXXXXXXXXXXXXXXXXXXXX</span>
                                        </div>
                                        <div id="Part4to5Print">
                                            <div style="float: left; position: absolute; left: 537px; top: 222px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='Part4to5I0' style="letter-spacing: 5pt;">568741235959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 537px; top: 245px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='Part4to5I1' style="letter-spacing: 5pt;">5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 537px; top: 269px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='Part4to5I2' style="letter-spacing: 5pt;">5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 537px; top: 293px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='Part4to5I3' style="letter-spacing: 5pt;">5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 537px; top: 319px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='Part4to5I4' style="letter-spacing: 5pt;">5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 335px; top: 372px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='Part4to5I5' style="letter-spacing: 5pt;">5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 335px; top: 401px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='Part4to5I6' style="letter-spacing: 5pt;">5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 335px; top: 427px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='Part4to5I7' style="letter-spacing: 5pt;">5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 534px; top: 460px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='Part4to5I8' style="letter-spacing: 5pt;">568741235959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 466px; top: 508px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='Part4to5I9' style="letter-spacing: 5pt; display:none;">5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 537px; top: 568px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='Part4to5I10' style="letter-spacing: 5pt;">568741235959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 537px; top: 591px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='Part4to5I11' style="letter-spacing: 5pt;">568741235959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 537px; top: 617px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='Part4to5I12' style="letter-spacing: 5pt;">568741235959</span>
                                            </div>
                                        </div>
                                        <div id="Part6Print">
                                            <div style="float: left; position: absolute; left: 39px; top: 703px; width: 773px;">
                                                <span class='mediumBold' id='Part6I0' style="letter-spacing: 2pt;">568741235959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 39px; top: 728px; width: 427px;">
                                                <span class='mediumBold' id='Part6I1' style="letter-spacing: 2pt;">568741235959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 728px; width: 271px;">
                                                <span class='mediumBold' id='Part6I2' style="letter-spacing: 9.4pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 603px; top: 728px; width: 271px;">
                                                <span class='mediumBold' id='Part6I3' style="letter-spacing: 9.4pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 670px; top: 728px; width: 271px;">
                                                <span class='mediumBold' id='Part6I4' style="letter-spacing: 9.4pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 735px; top: 728px; width: 271px;">
                                                <span class='mediumBold' id='Part6I5' style="letter-spacing: 9.4pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 39px; top: 769px; width: 774px;">
                                                <span class='mediumBold' id='Part6I6' style="letter-spacing: 2pt;">568741235959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 39px; top: 794px; width: 427px;">
                                                <span class='mediumBold' id='Part6I7' style="letter-spacing: 2pt;">568741235959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 794px; width: 271px;">
                                                <span class='mediumBold' id='Part6I8' style="letter-spacing: 9.4pt;">OOO</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 603px; top: 794px; width: 271px;">
                                                <span class='mediumBold' id='Part6I9' style="letter-spacing: 9.4pt;">OOO</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 670px; top: 794px; width: 271px;">
                                                <span class='mediumBold' id='Part6I10' style="letter-spacing: 9.4pt;">OOO</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 735px; top: 794px; width: 271px;">
                                                <span class='mediumBold' id='Part6I11' style="letter-spacing: 9.4pt;">OOO</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 35px; top: 836px; width: 271px;">
                                                <span class='mediumBold' id='Part6I12' style="letter-spacing: 7.5pt;"></span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 94px; top: 836px; width: 271px;">
                                                <span class='mediumBold' id='Part6I13' style="letter-spacing: 7.5pt;"></span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 232px; top: 836px; width: 271px;">
                                                <span class='mediumBold' id='Part6I14' style="letter-spacing: 7.5pt;"></span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 836px; width: 271px;">
                                                <span class='mediumBold' id='Part6I15' style="letter-spacing: 7.5pt;"></span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 410px; top: 836px; width: 271px;">
                                                <span class='mediumBold' id='Part6I16' style="letter-spacing: 7.5pt;"></span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 470px; top: 836px; width: 271px;">
                                                <span class='mediumBold' id='Part6I17' style="letter-spacing: 7.5pt;"></span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 527px; top: 836px; width: 271px;">
                                                <span class='mediumBold' id='Part6I18' style="letter-spacing: 7.5pt;"></span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 625px; top: 836px; width: 271px;">
                                                <span class='mediumBold' id='Part6I19' style="letter-spacing: 7.5pt;"></span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 683px; top: 836px; width: 271px;">
                                                <span class='mediumBold' id='Part6I20' style="letter-spacing: 7.5pt;"></span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 740px; top: 836px; width: 271px;">
                                                <span class='mediumBold' id='Part6I21' style="letter-spacing: 7.5pt;"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div id="Print3Content" style="background-image: url('../img/for_printing/BIR Form 1702-EX3.png'); width:850px; height:1300px; position:relative; display:none; font-family: courier new;">                                    -->
                                <div id="Print3Content" style="display: none; width: 850px; margin-left:7px; height: 1300px; font-family: Arial;">
                                    <img src="{{ asset('images/Print/BIR Form 1702-EX3.png') }}" style="position: absolute; background-color: white;
                                        width: 850px; height: 1300px;" />
                                    <div style="float: left; position: relative; " class="divPrint">
                                        <div style="float: left; position: absolute; left: 32px; top: 132px;">
                                            <span class='mediumBold' style="letter-spacing: 9pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 98px; top: 132px;">
                                            <span class='mediumBold' style="letter-spacing: 9pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 164px; top: 132px;">
                                            <span class='mediumBold' style="letter-spacing: 9pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 344px; top: 132px; width: 456px;">
                                            <span class='mediumBold' style="letter-spacing: 2pt;">XXXXXXXXXXXXXXXXXXXXX</span>
                                        </div>
                                        <div id="sched1Print">
                                            <div style="float: left; position: absolute; left: 535px; top: 182px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched1I0' style="letter-spacing: 5pt;">595932323211</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 206px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched1I1' style="letter-spacing: 5pt;">5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 229px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched1I2' style="letter-spacing: 5pt;">5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 253px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched1I3' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 277px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched1I4' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 302px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched1I5' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                        </div>
                                        <div id="sched2Print">
                                            <div style="float: left; position: absolute; left: 535px; top: 380px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I0' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 404px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I1' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 429px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I2' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 452px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I3' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 476px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I4' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 325px; top: 524px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I5' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 325px; top: 549px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I6' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 325px; top: 573px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I7' style="letter-spacing: 5pt;">RRRR</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 325px; top: 595px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I8' style="letter-spacing: 5pt;">AAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 620px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I9' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 643px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I10' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 667px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I11' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 690px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I12' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 325px; top: 716px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I13' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 325px; top: 739px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I14' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 762px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I15' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 325px; top: 785px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I16' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 325px; top: 809px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I17' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 838px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I18' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 899px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I19' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 922px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I20' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 944px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I21' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 969px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I22' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 993px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I23' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 1017px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I24' style="letter-spacing: 5pt;">959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 1042px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I25' style="letter-spacing: 5pt;">XXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 1078px; width: 271px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched2I26' style="letter-spacing: 5pt;">5959</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div id="Print4Content" style="background-image: url('../img/for_printing/BIR Form 1702-EX4.png'); width:850px; height:1300px; position:relative; display:none; font-family: courier new;">                                    
                                 -->
                                <div id="Print4Content" style="display: none; width: 850px; margin-left:7px; height: 1300px; font-family: Arial;">
                                    <img src="{{ asset('images/Print/BIR Form 1702-EX4.png') }}" style="position: absolute; background-color: white;
                                        width: 850px; height: 1300px;" />
                                    <div style="float: left; position: relative;" class="divPrint">
                                        <div style="float: left; position: absolute; left: 30px; top: 132px;">
                                            <span class='mediumBold' style="letter-spacing: 9.5pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 96px; top: 132px;">
                                            <span class='mediumBold' style="letter-spacing: 9.5pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 162px; top: 132px;">
                                            <span class='mediumBold' style="letter-spacing: 9.5pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 344px; top: 132px; width: 469px;">
                                            <span class='mediumBold' style="letter-spacing: 2pt;">XXXXXXXX</span>
                                        </div>
                                        <div id="sched3Print">
                                            <div style="float: left; position: absolute; left: 48px; top: 192px; width: 478px;">
                                                <span class='mediumBold' id='sched3I0' style="letter-spacing: 2pt;">XXXXXXXXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 192px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched3I1' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 48px; top: 218px; width: 475px;">
                                                <span class='mediumBold' id='sched3I2' style="letter-spacing: 2pt;">XXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 218px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched3I3' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 48px; top: 245px; width: 474px;">
                                                <span class='mediumBold' id='sched3I4' style="letter-spacing: 2pt;">XXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 245px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched3I5' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 273px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched3I6' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                        </div>
                                        <div id="sched4p1Print">
                                            <div style="float: left; position: absolute; left: 535px; top: 332px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I0' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 48px; top: 376px; width: 472px;">
                                                <span class='mediumBold' id='sched4p1I1' style="letter-spacing: 2pt;">XXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 376px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I2' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 48px; top: 403px; width: 476px;">
                                                <span class='mediumBold' id='sched4p1I3' style="letter-spacing: 2pt;">XXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 403px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I4' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 48px; top: 430px; width: 478px;">
                                                <span class='mediumBold' id='sched4p1I5' style="letter-spacing: 2pt;">XXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 430px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I6' style="letter-spacing: 5pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 457px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I7' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 484px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I8' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 511px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I9' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 538px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I10' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 564px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I11' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 592px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I12' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 618px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I13' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 645px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I14' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 672px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I15' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 699px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I16' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 726px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I17' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 753px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I18' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 780px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I19' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 807px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I20' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 835px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I21' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 862px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I22' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 888px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I23' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 914px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I24' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 942px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I25' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 969px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I26' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 996px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I27' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 1024px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I28' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 1051px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I29' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 1076px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I30' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 1105px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p1I31' style="letter-spacing: 5pt;">XXXXXXXX5959</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div id="Print5Content" style="background-image: url('../img/for_printing/BIR Form 1702-EX5.png'); width:850px; height:1300px; position:relative; display:none; font-family: courier new;">                                    
                                 -->
                                <div id="Print5Content" style="display: none; width: 850px; margin-left:7px; height: 1300px; font-family: Arial;">
                                    <img src="{{ asset('images/Print/BIR Form 1702-EX5.png') }}" style="position: absolute; background-color: white;
                                        width: 850px; height: 1300px;" />
                                    <div style="float: left; position: relative;" class="divPrint">
                                        <div style="float: left; position: absolute; left: 30px; top: 141px;">
                                            <span class='mediumBold' style="letter-spacing: 9.5pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 97px; top: 141px;">
                                            <span class='mediumBold' style="letter-spacing: 9.5pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 162px; top: 141px;">
                                            <span class='mediumBold' style="letter-spacing: 9.5pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 342px; top: 141px; width: 452px;">
                                            <span class='mediumBold' style="letter-spacing: 2pt;">XXXXXXXX</span>
                                        </div>
                                        <div id="sched4p2Print">
                                            <div style="float: left; position: absolute; left: 535px; top: 199px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p2I0' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 226px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p2I1' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 254px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p2I2' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 280px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p2I3' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 307px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p2I4' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 333px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p2I5' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 57px; top: 378px; width: 465px;">
                                                <span class='mediumBold' id='sched4p2I6' style="letter-spacing: 2pt;">XXXXXXXXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 378px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p2I7' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 57px; top: 404px; width: 464px;">
                                                <span class='mediumBold' id='sched4p2I8' style="letter-spacing: 2pt;">XXXXXXXXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 404px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p2I9' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 57px; top: 431px; width: 466px;">
                                                <span class='mediumBold' id='sched4p2I10' style="letter-spacing: 2pt;">XXXXXXXXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 431px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p2I11' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 57px; top: 458px; width: 461px;">
                                                <span class='mediumBold' id='sched4p2I12' style="letter-spacing: 2pt;">XXXXXXXXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 458px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p2I13' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 494px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched4p2I14' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                        </div>
                                        <div id="sched5Print">
                                            <div style="float: left; position: absolute; left: 57px; top: 575px; width: 306px;">
                                                <span class='mediumBold' id='sched5I0' style="letter-spacing: 2pt;">XXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 368px; top: 575px; width: 272px;">
                                                <span class='mediumBold' id='sched5I1' style="letter-spacing: 2pt;">XXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 575px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched5I2' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 57px; top: 602px; width: 310px;">
                                                <span class='mediumBold' id='sched5I3' style="letter-spacing: 2pt;">XXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 368px; top: 602px; width: 272px;">
                                                <span class='mediumBold' id='sched5I4' style="letter-spacing: 2pt;">XXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 602px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched5I5' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 57px; top: 629px; width: 307px;">
                                                <span class='mediumBold' id='sched5I6' style="letter-spacing: 2pt;">XXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 368px; top: 629px; width: 272px;">
                                                <span class='mediumBold' id='sched5I7' style="letter-spacing: 2pt;">XXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 629px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched5I8' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 57px; top: 656px; width: 303px;">
                                                <span class='mediumBold' id='sched5I9' style="letter-spacing: 2pt;">XXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 368px; top: 656px; width: 272px;">
                                                <span class='mediumBold' id='sched5I10' style="letter-spacing: 2pt;">XXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 656px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched5I11' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 684px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched5I12' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                        </div>
                                        <div id="sched6Print">
                                            <div style="float: left; position: absolute; left: 535px; top: 745px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched6I0' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 57px; top: 788px; width: 464px;">
                                                <span class='mediumBold' id='sched6I1' style="letter-spacing: 2pt;">XXXXXXXXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 788px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched6I2' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 57px; top: 815px; width: 465px;">
                                                <span class='mediumBold' id='sched6I3' style="letter-spacing: 2pt;">XXXXXXXXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 815px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched6I4' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 842px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched6I5' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 57px; top: 886px; width: 463px;">
                                                <span class='mediumBold' id='sched6I6' style="letter-spacing: 2pt;">XXXXXXXXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 886px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched6I7' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 57px; top: 912px; width: 462px;">
                                                <span class='mediumBold' id='sched6I8' style="letter-spacing: 2pt;">XXXXXXXXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 912px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched6I9' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 57px; top: 956px; width: 463px;">
                                                <span class='mediumBold' id='sched6I10' style="letter-spacing: 2pt;">XXXXXXXXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 956px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched6I11' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 57px; top: 984px; width: 462px;">
                                                <span class='mediumBold' id='sched6I12' style="letter-spacing: 2pt;">XXXXXXXXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 984px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched6I13' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 1011px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched6I14' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 535px; top: 1039px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched6I15' style="letter-spacing: 5pt;">XX5959</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div id="Print6Content" style="background-image: url('../img/for_printing/BIR Form 1702-EX6.png'); width:850px; height:1300px; position:relative; display:none; font-family: courier new;">                                    
                -->
                                <div id="Print6Content" style="display: none; width: 850px; margin-left:.8mm; height: 1300px; font-family: Arial;">
                                    <img src="{{ asset('images/Print/BIR Form 1702-EX6.png') }}" style="position: absolute; background-color: white;
                                        width: 850px; height: 1300px;" />
                                    <div style="float: left; position: relative;" class="divPrint">
                                        <div style="float: left; position: absolute; left: 29px; top: 128px;">
                                            <span class='mediumBold' style="letter-spacing: 10pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 94px; top: 128px;">
                                            <span class='mediumBold' style="letter-spacing: 10pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 161px; top: 128px;">
                                            <span class='mediumBold' style="letter-spacing: 10pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 343px; top: 128px; width: 452px;">
                                            <span class='mediumBold' style="letter-spacing: 2pt;">XXXXXXXXXXXXXXXXXXXXX</span>
                                        </div>
                                        <div id="sched7Print">
                                            <div style="float: left; position: absolute; left: 539px; top: 196px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I0' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 219px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I1' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 240px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I2' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 263px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I3' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 285px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I4' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 307px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I5' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 330px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I6' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 377px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I7' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 398px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I8' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 421px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I9' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 443px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I10' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 464px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I11' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 486px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I12' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 508px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I13' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 530px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I14' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 552px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I15' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 539px; top: 576px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched7I16' style="letter-spacing: 4pt;">XXXXXXX5959</span>
                                            </div>
                                        </div>
                                        <div style="float: left; position: absolute; left: 127px; top: 601px; width: 272px;">
                                            <span class='mediumBold' style="letter-spacing: 9pt;">X</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 250px; top: 601px; width: 272px;">
                                            <span class='mediumBold' style="letter-spacing: 9pt;">X</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 347px; top: 601px; width: 272px;">
                                            <span class='mediumBold' style="letter-spacing: 9pt;">X</span>
                                        </div>
                                        <div id="sched8Print">
                                            <div style="float: left; position: absolute; left: 27px; top: 664px; width: 276px;">
                                                <span class='mediumBold' id='sched8I0' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 664px; width: 272px;">
                                                <span class='mediumBold' id='sched8I1' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 664px; width: 272px;">
                                                <span class='mediumBold' id='sched8I2' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 664px; width: 272px;">
                                                <span class='mediumBold' id='sched8I3' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 664px; width: 272px;">
                                                <span class='mediumBold' id='sched8I4' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 664px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I5' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 664px; width: 272px; ">
                                                <span class='mediumBold' id='sched8I6' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 686px; width: 276px;">
                                                <span class='mediumBold' id='sched8I7' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 686px; width: 272px;">
                                                <span class='mediumBold' id='sched8I8' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 686px; width: 272px;">
                                                <span class='mediumBold' id='sched8I9' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 686px; width: 272px;">
                                                <span class='mediumBold' id='sched8I10' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 686px; width: 272px;">
                                                <span class='mediumBold' id='sched8I11' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 686px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I12' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 686px; width: 272px;">
                                                <span class='mediumBold' id='sched8I13' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 711px; width: 272px;">
                                                <span class='mediumBold' id='sched8I14' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 711px; width: 272px;">
                                                <span class='mediumBold' id='sched8I15' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 711px; width: 272px;">
                                                <span class='mediumBold' id='sched8I16' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 711px; width: 272px;">
                                                <span class='mediumBold' id='sched8I17' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 711px; width: 272px;">
                                                <span class='mediumBold' id='sched8I18' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 711px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I19' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 711px; width: 272px;">
                                                <span class='mediumBold' id='sched8I20' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 735px; width: 272px;">
                                                <span class='mediumBold' id='sched8I21' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 735px; width: 272px;">
                                                <span class='mediumBold' id='sched8I22' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 735px; width: 272px;">
                                                <span class='mediumBold' id='sched8I23' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 735px; width: 272px;">
                                                <span class='mediumBold' id='sched8I24' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 735px; width: 272px;">
                                                <span class='mediumBold' id='sched8I25' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 735px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I26' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 735px; width: 272px;">
                                                <span class='mediumBold' id='sched8I27' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 759px; width: 272px;">
                                                <span class='mediumBold' id='sched8I28' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 759px; width: 272px;">
                                                <span class='mediumBold' id='sched8I29' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 759px; width: 272px;">
                                                <span class='mediumBold' id='sched8I30' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 759px; width: 272px;">
                                                <span class='mediumBold' id='sched8I31' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 759px; width: 272px;">
                                                <span class='mediumBold' id='sched8I32' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 759px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I33' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 759px; width: 272px;">
                                                <span class='mediumBold' id='sched8I34' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 782px; width: 272px;">
                                                <span class='mediumBold' id='sched8I35' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 782px; width: 272px;">
                                                <span class='mediumBold' id='sched8I36' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 782px; width: 272px;">
                                                <span class='mediumBold' id='sched8I37' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 782px; width: 272px;">
                                                <span class='mediumBold' id='sched8I38' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 782px; width: 272px;">
                                                <span class='mediumBold' id='sched8I39' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 782px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I40' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 782px; width: 272px;">
                                                <span class='mediumBold' id='sched8I41' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 806px; width: 272px;">
                                                <span class='mediumBold' id='sched8I42' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 806px; width: 272px;">
                                                <span class='mediumBold' id='sched8I43' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 806px; width: 272px;">
                                                <span class='mediumBold' id='sched8I44' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 806px; width: 272px;">
                                                <span class='mediumBold' id='sched8I45' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 806px; width: 272px;">
                                                <span class='mediumBold' id='sched8I46' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 806px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I47' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 806px; width: 272px;">
                                                <span class='mediumBold' id='sched8I48' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 829px; width: 272px;">
                                                <span class='mediumBold' id='sched8I49' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 829px; width: 272px;">
                                                <span class='mediumBold' id='sched8I50' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 829px; width: 272px;">
                                                <span class='mediumBold' id='sched8I51' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 829px; width: 272px;">
                                                <span class='mediumBold' id='sched8I52' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 829px; width: 272px;">
                                                <span class='mediumBold' id='sched8I53' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 829px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I54' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 829px; width: 272px;">
                                                <span class='mediumBold' id='sched8I55' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 854px; width: 272px;">
                                                <span class='mediumBold' id='sched8I56' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 854px; width: 272px;">
                                                <span class='mediumBold' id='sched8I57' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 854px; width: 272px;">
                                                <span class='mediumBold' id='sched8I58' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 854px; width: 272px;">
                                                <span class='mediumBold' id='sched8I59' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 854px; width: 272px;">
                                                <span class='mediumBold' id='sched8I60' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 854px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I61' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 854px; width: 272px;">
                                                <span class='mediumBold' id='sched8I62' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 877px; width: 272px;">
                                                <span class='mediumBold' id='sched8I63' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 877px; width: 272px;">
                                                <span class='mediumBold' id='sched8I64' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 877px; width: 272px;">
                                                <span class='mediumBold' id='sched8I65' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 877px; width: 272px;">
                                                <span class='mediumBold' id='sched8I66' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 877px; width: 272px;">
                                                <span class='mediumBold' id='sched8I67' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 877px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I68' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 877px; width: 272px;">
                                                <span class='mediumBold' id='sched8I69' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 901px; width: 272px;">
                                                <span class='mediumBold' id='sched8I70' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 901px; width: 272px;">
                                                <span class='mediumBold' id='sched8I71' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 901px; width: 272px;">
                                                <span class='mediumBold' id='sched8I72' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 901px; width: 272px;">
                                                <span class='mediumBold' id='sched8I73' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 901px; width: 272px;">
                                                <span class='mediumBold' id='sched8I74' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 901px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I75' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 901px; width: 272px;">
                                                <span class='mediumBold' id='sched8I76' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 924px; width: 272px;">
                                                <span class='mediumBold' id='sched8I77' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 924px; width: 272px;">
                                                <span class='mediumBold' id='sched8I78' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 924px; width: 272px;">
                                                <span class='mediumBold' id='sched8I79' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 924px; width: 272px;">
                                                <span class='mediumBold' id='sched8I80' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 924px; width: 272px;">
                                                <span class='mediumBold' id='sched8I81' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 924px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I82' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 924px; width: 272px;">
                                                <span class='mediumBold' id='sched8I83' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 947px; width: 272px;">
                                                <span class='mediumBold' id='sched8I84' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 947px; width: 272px;">
                                                <span class='mediumBold' id='sched8I85' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 947px; width: 272px;">
                                                <span class='mediumBold' id='sched8I86' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 947px; width: 272px;">
                                                <span class='mediumBold' id='sched8I87' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 947px; width: 272px;">
                                                <span class='mediumBold' id='sched8I88' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 947px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I89' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 947px; width: 272px;">
                                                <span class='mediumBold' id='sched8I90' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 971px; width: 272px;">
                                                <span class='mediumBold' id='sched8I91' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 971px; width: 272px;">
                                                <span class='mediumBold' id='sched8I92' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 971px; width: 272px;">
                                                <span class='mediumBold' id='sched8I93' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 971px; width: 272px;">
                                                <span class='mediumBold' id='sched8I94' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 971px; width: 272px;">
                                                <span class='mediumBold' id='sched8I95' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 971px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I96' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 971px; width: 272px;">
                                                <span class='mediumBold' id='sched8I97' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 996px; width: 272px;">
                                                <span class='mediumBold' id='sched8I98' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 996px; width: 272px;">
                                                <span class='mediumBold' id='sched8I99' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 996px; width: 272px;">
                                                <span class='mediumBold' id='sched8I100' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 996px; width: 272px;">
                                                <span class='mediumBold' id='sched8I101' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 996px; width: 272px;">
                                                <span class='mediumBold' id='sched8I102' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 996px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I103' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 996px; width: 272px;">
                                                <span class='mediumBold' id='sched8I104' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 1018px; width: 272px;">
                                                <span class='mediumBold' id='sched8I105' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 1018px; width: 272px;">
                                                <span class='mediumBold' id='sched8I106' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 1018px; width: 272px;">
                                                <span class='mediumBold' id='sched8I107' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 1018px; width: 272px;">
                                                <span class='mediumBold' id='sched8I108' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 1018px; width: 272px;">
                                                <span class='mediumBold' id='sched8I109' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 1018px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I110' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 1018px; width: 272px;">
                                                <span class='mediumBold' id='sched8I111' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 1043px; width: 272px;">
                                                <span class='mediumBold' id='sched8I112' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 1043px; width: 272px;">
                                                <span class='mediumBold' id='sched8I113' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 1043px; width: 272px;">
                                                <span class='mediumBold' id='sched8I114' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 1043px; width: 272px;">
                                                <span class='mediumBold' id='sched8I115' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 1043px; width: 272px;">
                                                <span class='mediumBold' id='sched8I116' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 1043px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I117' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 1043px; width: 272px;">
                                                <span class='mediumBold' id='sched8I118' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 1067px; width: 272px;">
                                                <span class='mediumBold' id='sched8I119' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 1067px; width: 272px;">
                                                <span class='mediumBold' id='sched8I120' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 1067px; width: 272px;">
                                                <span class='mediumBold' id='sched8I121' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 1067px; width: 272px;">
                                                <span class='mediumBold' id='sched8I122' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 1067px; width: 272px;">
                                                <span class='mediumBold' id='sched8I123' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 1067px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I124' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 1067px; width: 272px;">
                                                <span class='mediumBold' id='sched8I125' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 1090px; width: 272px;">
                                                <span class='mediumBold' id='sched8I126' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 1090px; width: 272px;">
                                                <span class='mediumBold' id='sched8I127' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 1090px; width: 272px;">
                                                <span class='mediumBold' id='sched8I128' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 1090px; width: 272px;">
                                                <span class='mediumBold' id='sched8I129' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 1090px; width: 272px;">
                                                <span class='mediumBold' id='sched8I130' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 1090px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I131' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 1090px; width: 272px;">
                                                <span class='mediumBold' id='sched8I132' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 27px; top: 1114px; width: 272px;">
                                                <span class='mediumBold' id='sched8I133' style="letter-spacing: 2pt;">XXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 1114px; width: 272px;">
                                                <span class='mediumBold' id='sched8I134' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 376px; top: 1114px; width: 272px;">
                                                <span class='mediumBold' id='sched8I135' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 1114px; width: 272px;">
                                                <span class='mediumBold' id='sched8I136' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 507px; top: 1114px; width: 272px;">
                                                <span class='mediumBold' id='sched8I137' style="letter-spacing: 9pt;">XXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 485px; top: 1114px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched8I138' style="letter-spacing: 2pt;">AAAAAAAA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 542px; text-align: right; top: 1114px; width: 272px;">
                                                <span class='mediumBold' id='sched8I139' style="letter-spacing: 0.5pt;">PG</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div id="Print7Content" style="background-image: url('../img/for_printing/BIR Form 1702-EX7.png'); width:850px; height:1300px; position:relative; display:none; font-family: courier new;">                                    
                                  -->
                                <div id="Print7Content" style="display: none; width: 850px; margin-left:.85mm; height: 1300px; font-family: Arial; ">
                                    <img src="{{ asset('images/Print/BIR Form 1702-EX7.png') }}" style="position: absolute;  background-color: white;
                                        width: 850px; height: 1300px;" />
                                    <div style="float: left; position: relative;" class="divPrint">
                                        <div style="float: left; position: absolute; left: 30px; top: 128px;">
                                            <span class='mediumBold' style="letter-spacing: 9.8pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 96px; top: 128px;">
                                            <span class='mediumBold' style="letter-spacing: 9.8pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 163px; top: 128px;">
                                            <span class='mediumBold' style="letter-spacing: 9.8pt;">123</span>
                                        </div>
                                        <div style="float: left; position: absolute; left: 340px; top: 128px; width: 452px;">
                                            <span class='mediumBold' style="letter-spacing: 2pt;">XXXXXXXX</span>
                                        </div>
                                        <div id="sched9Pt1Print">
                                            <div style="float: left; position: absolute; left: 104px; top: 215px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt1I0' style="letter-spacing: 3pt;">XXXXX59590</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 328px; top: 215px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt1I1' style="letter-spacing: 3pt;">XXXXX59590</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 538px; top: 215px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt1I2' style="letter-spacing: 3pt;">XXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 104px; top: 239px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt1I3' style="letter-spacing: 3pt;">XXXXX59590</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 328px; top: 239px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt1I4' style="letter-spacing: 3pt;">XXXXX59590</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 538px; top: 239px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt1I5' style="letter-spacing: 3pt;">XXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 104px; top: 262px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt1I6' style="letter-spacing: 3pt;">XXXXX59590</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 328px; top: 262px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt1I7' style="letter-spacing: 3pt;">XXXXX59590</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 538px; top: 262px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt1I8' style="letter-spacing: 3pt;">XXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 104px; top: 285px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt1I9' style="letter-spacing: 3pt;">XXXXX59590</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 328px; top: 285px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt1I10' style="letter-spacing: 3pt;">XXXXX59590</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 538px; top: 285px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt1I11' style="letter-spacing: 3pt;">XXXXX5959</span>
                                            </div>
                                        </div>
                                        <div id="sched9Pt2Print">
                                            <div style="float: left; position: absolute; left: 386px; top: 336px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt2I0' style="letter-spacing: 2pt;">XXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 611px; top: 336px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt2I1' style="letter-spacing: 2pt;">XXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 386px; top: 362px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt2I2' style="letter-spacing: 2pt;">XXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 611px; top: 362px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt2I3' style="letter-spacing: 2pt;">XXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 386px; top: 389px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt2I4' style="letter-spacing: 2pt;">XXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 611px; top: 389px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt2I5' style="letter-spacing: 2pt;">XXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 328px; top: 416px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt2I6' style="letter-spacing: 3pt;">XXXXX59590</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 538px; top: 416px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt2I7' style="letter-spacing: 3pt;">XXXXX5959</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 328px; top: 443px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt2I8' style="letter-spacing: 3pt;">XXXXX59590</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 538px; top: 443px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt2I9' style="letter-spacing: 3pt;">XXXXX5959</span>
                                            </div>
                                        </div>
                                        <div id="sched9Pt3print">
                                            <div style="float: left; position: absolute; left: 386px; top: 492px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt3I0' style="letter-spacing: 9.5pt;">XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 452px; top: 492px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt3I1' style="letter-spacing: 2pt;">HOHOHOH</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 610px; top: 492px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt3I2' style="letter-spacing: 10pt;">XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 680px; top: 492px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt3I3' style="letter-spacing: 2pt;">HOHOHO</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 386px; top: 520px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt3I4' style="letter-spacing: 2pt;">LALALALA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 610px; top: 520px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt3I5' style="letter-spacing: 2pt;">XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 326px; top: 546px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt3I6' style="letter-spacing: 3pt;">X59590</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 538px; top: 546px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt3I7' style="letter-spacing: 3pt;">XXX59</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 398px; top: 568px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt3I8' style="letter-spacing: 6pt;"></span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 448px; top: 568px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt3I9' style="letter-spacing: 6pt;"></span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 498px; top: 568px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt3I10' style="letter-spacing: 7.5pt;"></span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 616px; top: 568px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt3I11' style="letter-spacing: 6pt;"></span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 664px; top: 568px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt3I12' style="letter-spacing: 6pt;"></span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 709px; top: 568px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt3I13' style="letter-spacing: 7.5pt;"></span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 326px; top: 596px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt3I14' style="letter-spacing: 3pt;">X59590</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 538px; top: 596px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt3I15' style="letter-spacing: 3pt;">XddsdXX59</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 326px; top: 623px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt3I16' style="letter-spacing: 3pt;">X59590</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 538px; top: 623px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt3I17' style="letter-spacing: 3pt;">XXX59</span>
                                            </div>
                                        </div>
                                        <div id="sched9Pt4print">
                                            <div style="float: left; position: absolute; left: 386px; top: 672px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt4I0' style="letter-spacing: 2pt;">LALALALA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 610px; top: 672px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt4I1' style="letter-spacing: 2pt;">XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 386px; top: 699px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt4I2' style="letter-spacing: 2pt;">LALALALA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 610px; top: 699px; width: 272px;">
                                                <span class='mediumBold' id='sched9Pt4I3' style="letter-spacing: 2pt;">XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 326px; top: 726px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt4I4' style="letter-spacing: 3pt;">X59590</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 538px; top: 726px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt4I5' style="letter-spacing: 3pt;">XXX59</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 326px; top: 753px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt4I6' style="letter-spacing: 3pt;">X59590</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 538px; top: 753px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt4I7' style="letter-spacing: 3pt;">XXX59</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 536px; top: 784px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched9Pt4I8' style="letter-spacing: 3pt;">XXX59</span>
                                            </div>
                                        </div>
                                        <div id="sched10Pt1print">
                                            <div style="float: left; position: absolute; left: 538px; top: 836px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched10Pt1I0' style="letter-spacing: 2pt;">XXX59</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 386px; top: 904px; width: 272px;">
                                                <span class='mediumBold' id='sched10Pt1I1' style="letter-spacing: 2pt;">LALALALA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 610px; top: 904px; width: 272px;">
                                                <span class='mediumBold' id='sched10Pt1I2' style="letter-spacing: 2pt;">XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 386px; top: 931px; width: 272px;">
                                                <span class='mediumBold' id='sched10Pt1I3' style="letter-spacing: 2pt;">LALALALA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 610px; top: 931px; width: 272px;">
                                                <span class='mediumBold' id='sched10Pt1I4' style="letter-spacing: 2pt;">XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 386px; top: 958px; width: 272px;">
                                                <span class='mediumBold' id='sched10Pt1I5' style="letter-spacing: 2pt;">LALALALA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 610px; top: 958px; width: 272px;">
                                                <span class='mediumBold' id='sched10Pt1I6' style="letter-spacing: 2pt;">XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 326px; top: 984px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched10Pt1I7' style="letter-spacing: 3pt;">XXX59</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 538px; top: 984px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched10Pt1I8' style="letter-spacing: 3pt;">XXX59</span>
                                            </div>
                                        </div>
                                        <div id="sched10Pt2print">
                                            <div style="float: left; position: absolute; left: 386px; top: 1032px; width: 272px;">
                                                <span class='mediumBold' id='sched10Pt2I0' style="letter-spacing: 2pt;">LALALALA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 610px; top: 1032px; width: 272px;">
                                                <span class='mediumBold' id='sched10Pt2I1' style="letter-spacing: 2pt;">XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 386px; top: 1054px; width: 272px;">
                                                <span class='mediumBold' id='sched10Pt2I2' style="letter-spacing: 2pt;">LALALALA</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 610px; top: 1054px; width: 272px;">
                                                <span class='mediumBold' id='sched10Pt2I3' style="letter-spacing: 2pt;">XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 326px; top: 1079px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched10Pt2I4' style="letter-spacing: 3pt;">XXX59</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 538px; top: 1079px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched10Pt2I5' style="letter-spacing: 3pt;">XXX59</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 538px; top: 1109px; width: 272px;
                                                text-align: right;">
                                                <span class='mediumBold' id='sched10Pt2I6' style="letter-spacing: 3pt;">XXX59</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="PageFooter">
                                <table width="751" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table width="735" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td width="40">
                                                        </td>
                                                        <td width="616" style="text-align: center;">
                                                            <input class="printButtonClass" type="button" value="Prev" style="width: 100px;"
                                                                name="frm1702EX:btnPrevPage" id="frm1702EX:btnPrevPage" onclick="processPrev();" />
                                                            <input id="frm1702EX:txtCurrentPage" name="frm1702EX:txtCurrentPage" size="1" type="text"
                                                                style="text-align: center;" onkeyup="goToPage(this);"  />
                                                            <span class="large">/&nbsp;</span><input type="text" id="frm1702EX:txtMaxPage" readonly="readonly"
                                                                size="2" value="7" style="text-align: center;" />
                                                            <input class="printButtonClass" type="button" value="Next" style="width: 100px;"
                                                                name="frm1702EX:btnNextPage" id="frm1702EX:btnNextPage" onclick="processNext();" />
                                                        </td>
                                                    </tr>
                                                    <tr valign="middle">
                                                        <td width="40">
                                                        </td>
                                                        <td width="616">
                                                            <div>
                                                                <div align="center">
                                                                    @if($action != 'view')
                                                                    <input class="printButtonClass" type="button" value="Validate" style="width: 100px;"
                                                                        name="frm1702EX:btnValidate" id="frm1702EX:btnValidate" onclick="validate()" />
                                                                    <input class="printButtonClass" type="button" value="Edit" style="width: 100px;"
                                                                        name="frm1702EX:btnEdit" id="frm1702EX:btnEdit" onclick="enableAllControl()" />
                                                                    <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;"
                                                                        name="btnUpload" id="btnUpload" />
                                                                    <input class="printButtonClass" type="button" value="Save" style="width: 100px;"
                                                                        name="btnSave" id="btnSave" onclick="saveData();" />
                                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;"
                                                                        name="btnPrint" id="btnPrint" disabled onclick="printme();" />
                                                                    <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;"
                                                                        name="frm1702EX:btnFinalCopy" id="frm1702EX:btnFinalCopy" onclick="submitForm();" /> 
                                                                    <div id="msg" class="printButtonClass" style="display: none;">
                                                                    @else
                                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                    <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <div id="DummyTxt" style='display: none;'>
                                                        </div>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                  <tr>
                                          <td>
                                            <div class="footer footer2200S" style="padding:6px; text-align: center; font-size: 11px; background-color: white; width: 100%;">
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
    <!--Modal Pop-ups-->
    <div id="modals">
        <div id="dialog2" class="dialog2" style="display: none">
        </div>
        <div id="overlay2" style="display: none">
        </div>
    </div>
    <div id="Pg4S3I3Pop" class="modalShow" style="display: none;">
        <br />
        <div class="SubPageDiv">
            <table class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td align="left" class="tdschedTitle border-grey">
                        <center>
                            <span style="font-weight: bold; font-size: small;">Schedule 3 - Other Taxable Income
                                Not Subjected to Final Tax</span> <span style="font-style: italic; font-size: x-small;">
                                    (Attach additional sheet/s,if necessary)</span>
                        </center>
                    </td>
                </tr>
            </table>
            <table id="Pg4S3I3PopTable" class="RowSubTable, tblForm" style="width: 100%">
            </table>
            <table id="Pg4S3I3TotalTable" class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td colspan="2" align="right">
                        <br />
                        <!--<input type="button" value=" Add More " onclick="AddRow_Pg4S3I3PopTable()" />-->
                        <input type="button" value=" Add More " onclick="ConditionAddRow('Pg4S3I3PopTable', '3.', 'add more', AddRow_Pg4S3I3PopTable)" />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-weight: bold; font-size: small;">Subtotal: </span>
                    </td>
                    <td>
                        <input type="text" id="Pg4S3I3SubTotal" name="Pg4S3I3SubTotal" disabled="disabled" />
                    </td>
                </tr>
            </table>
            <br />
            <center>
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Save " onclick="Save_Pg4S3I3PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Save and Close " onclick="SaveAndClose(Save_Pg4S3I3PopTable, '#Pg4S3I3Pop')" />
                &nbsp;&nbsp;&nbsp;
                <!--<input type="button" value=" Cancel " onclick="cancelModal('#Pg4S3I3Pop' , Load_Pg4S3I3PopTable)" />-->
                <input type="button" value=" Cancel " onclick="Load_Pg4S3I3PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Close " name="closeModal" onclick="closeDialog('#Pg4S3I3Pop'), Load_Pg4S3I3PopTable() " />
                &nbsp;&nbsp;&nbsp;
                <br />
                <br />
                <input type="button" value=" Print " name="prnModal" onclick="printModal('Pg4S3I3Pop')" />
            </center>
        </div>
        <br />
    </div>
    <div id="Pg4S4I4Pop" class="modalShow" style="display: none; width: 800;">
        <br />
        <div class="SubPageDiv">
            <table class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td align="left" class="tdschedTitle">
                        <center>
                            <span style="font-weight: bold; font-size: small;">Schedule 4 - Ordinary Allowable Itemized
                                Deductions</span> <span style="font-style: italic; font-size: x-small;">(Attach additional
                                    sheet/s,if necessary)</span>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        Other Amortizations
                    </td>
                </tr>
            </table>
            <table id="Pg4S4I4PopTable" class="RowSubTable, tblForm" style="width: 100%">
            </table>
            <table id="Pg4S4I4TotalTable" class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td colspan="2" align="right">
                        <br />
                        <!--<input type="button" value=" Add More " onclick="AddRow_Pg4S4I4PopTable()" />-->
                        <input type="button" value=" Add More " onclick="ConditionAddRow('Pg4S4I4PopTable', '4.', 'add more', AddRow_Pg4S4I4PopTable)" />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-weight: bold; font-size: small;">Subtotal: </span>
                    </td>
                    <td>
                        <input type="text" id="Pg4S4I4SubTotal" name="Pg4S4I4SubTotal" disabled="disabled" />
                    </td>
                </tr>
            </table>
            <br />
            <center>
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Save " onclick="Save_Pg4S4I4PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Save and Close " onclick="SaveAndClose(Save_Pg4S4I4PopTable, '#Pg4S4I4Pop')" />
                &nbsp;&nbsp;&nbsp;
                <!--<input type="button" value=" Cancel " onclick="cancelModal('#Pg4S4I4Pop', Load_Pg4S4I4PopTable)" />-->
                <input type="button" value=" Cancel " onclick="Load_Pg4S4I4PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Close " name="closeModal" onclick="closeDialog('#Pg4S4I4Pop'),Load_Pg4S4I4PopTable() " />
                &nbsp;&nbsp;&nbsp;
                <br />
                <br />
                <input type="button" value=" Print " name="prnModal" onclick="printModal('Pg4S4I4Pop')" />
            </center>
        </div>
    </div>
    <div id="Pg5S4I39Pop" class="modalShow" style="display: none;">
        <br />
        <div class="SubPageDiv">
            <table class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td align="left" class="tdschedTitle">
                        <center>
                            <span style="font-weight: bold; font-size: small;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Schedule 4 - Ordinary Allowable Itemized Deductions</span> <span style="font-style: italic;
                                    font-size: x-small;">(Continued from Previous Page)</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </center>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        Others
                    </td>
                </tr>
            </table>
            <table id="Pg5S4I39PopTable" class="RowSubTable, tblForm" style="width: 100%">
            </table>
            <table id="Pg5S4I39PopTotalTable" class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td colspan="2" align="right">
                        <br />
                        <!--<input type="button" value=" Add More " onclick="AddRow_Pg5S4I39PopTable()" />-->
                        <input type="button" value=" Add More " onclick="ConditionAddRow('Pg5S4I39PopTable', '39.', 'add more', AddRow_Pg5S4I39PopTable)" />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-weight: bold; font-size: small;">Subtotal: </span>
                    </td>
                    <td>
                        <input type="text" id="Pg5S4I39SubTotal" name="Pg5S4I39SubTotal" disabled="disabled" />
                    </td>
                </tr>
            </table>
            <br />
            <center>
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Save " onclick="Save_Pg5S4I39PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Save and Close " onclick="SaveAndClose(Save_Pg5S4I39PopTable, '#Pg5S4I39Pop')" />
                &nbsp;&nbsp;&nbsp;
                <!--<input type="button" value=" Cancel " onclick="cancelModal('#Pg5S4I39Pop', Load_Pg5S4I39PopTable)" />-->
                <input type="button" value=" Cancel " onclick="Load_Pg5S4I39PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Close " name="closeModal" onclick="closeDialog('#Pg5S4I39Pop'), Load_Pg5S4I39PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <br />
                <br />
                <input type="button" value=" Print " name="prnModal" onclick="printModal('Pg5S4I39Pop')" />
            </center>
        </div>
    </div>
    <div id="Pg5S5I4Pop" class="modalShow" style="display: none;">
        <br />
        <div class="SubPageDiv">
            <table class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td align="left" class="tdschedTitle">
                        <center>
                            <span style="font-weight: bold; font-size: small;">Schedule 5 - Special Allowable Itemized
                                Deduction </span><span style="font-style: italic; font-size: x-small;">(Attach additional
                                    sheet/s,if necessary)</span>
                        </center>
                    </td>
                </tr>
            </table>
            <table id="Pg5S5I4PopTable" class="RowSubTable, tblForm" style="width: 100%">
            </table>
            <table id="Pg5S5I4TotalTable" class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td colspan="2" align="right">
                        <br />
                        <!--<input type="button" value=" Add More " onclick="AddRow_Pg5S5I4PopTable()" />-->
                        <input type="button" value=" Add More " onclick="ConditionAddRow('Pg5S5I4PopTable', '4.', 'add more', AddRow_Pg5S5I4PopTable)" />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-weight: bold; font-size: small;">Subtotal: </span>
                    </td>
                    <td>
                        <input type="text" id="Pg5S5I4SubTotal" name="Pg5S5I4SubTotal" disabled="disabled" />
                    </td>
                </tr>
            </table>
            <br />
            <center>
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Save " onclick="Save_Pg5S5I4PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Save and Close " onclick="SaveAndClose(Save_Pg5S5I4PopTable, '#Pg5S5I4Pop')" />
                &nbsp;&nbsp;&nbsp;
                <!--<input type="button" value=" Cancel " onclick="cancelModal('#Pg5S5I4Pop', Load_Pg5S5I4PopTable)" />-->
                <input type="button" value=" Cancel " onclick="Load_Pg5S5I4PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Close " name="closeModal" onclick="closeDialog('#Pg5S5I4Pop'), Load_Pg5S5I4PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <br />
                <br />
                <input type="button" value=" Print " name="prnModal" onclick="printModal('Pg5S5I4Pop')" />
            </center>
        </div>
        <br />
    </div>
    <div id="Pg5S6I3Pop" class="modalShow" style="display: none; width: 800;">
        <br />
        <div class="SubPageDiv">
            <table class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td align="left" class="tdschedTitle">
                        <center>
                            <span style="font-weight: bold; font-size: small;">Schedule 6 - Reconciliation of Net
                                Income per Books Against Taxable Income</span> <span style="font-style: italic; font-size: x-small;">
                                    (Attach additional sheet/s, if necessary)</span>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        Add: Non-deductible Expenses/Taxable Other Income
                    </td>
                </tr>
            </table>
            <table id="Pg5S6I3PopTable" class="RowSubTable, tblForm" style="width: 100%">
            </table>
            <table id="Pg5S6I3PopTotalTable" class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td colspan="2" align="right">
                        <br />
                        <!--<input type="button" value=" Add More " onclick="AddRow_Pg5S6I3PopTable()" />-->
                        <input type="button" value=" Add More " onclick="ConditionAddRow('Pg5S6I3PopTable', '3.', 'add more', AddRow_Pg5S6I3PopTable)" />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-weight: bold; font-size: small;">Subtotal: </span>
                    </td>
                    <td>
                        <input type="text" id="Pg5S6I3SubTotal" name="Pg5S6I3SubTotal" disabled="disabled" />
                    </td>
                </tr>
            </table>
            <br />
            <center>
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Save " onclick="Save_Pg5S6I3PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Save and Close " onclick="SaveAndClose(Save_Pg5S6I3PopTable, '#Pg5S6I3Pop')" />
                &nbsp;&nbsp;&nbsp;
                <!--<input type="button" value=" Cancel " onclick="cancelModal('#Pg5S6I3Pop', Load_Pg5S6I3PopTable)" />-->
                <input type="button" value=" Cancel " onclick="Load_Pg5S6I3PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Close " name="closeModal" onclick="closeDialog('#Pg5S6I3Pop'), Load_Pg5S6I3PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <br />
                <br />
                <input type="button" value=" Print " name="prnModal" onclick="printModal('Pg5S6I3Pop')" />
            </center>
        </div>
    </div>
    <div id="Pg5S6I6Pop" class="modalShow" style="display: none; width: 800;">
        <br />
        <div class="SubPageDiv">
            <table class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td align="left" class="tdschedTitle">
                        <center>
                            <span style="font-weight: bold; font-size: small;">Schedule 6 - Reconciliation of Net
                                Income per Books Against Taxable Income</span> <span style="font-style: italic; font-size: x-small;">
                                    (Attach additional sheet/s, if necessary)</span>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        Less: A) Non-taxable Income and Income Subjected to Final Tax
                    </td>
                </tr>
            </table>
            <table id="Pg5S6I6PopTable" class="RowSubTable, tblForm" style="width: 100%">
            </table>
            <table id="Pg5S6I6PopTotalTable" class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td colspan="2" align="right">
                        <br />
                        <!--<input type="button" value=" Add More " onclick="AddRow_Pg5S6I6PopTable()" />-->
                        <input type="button" value=" Add More " onclick="ConditionAddRow('Pg5S6I6PopTable', '6.', 'add more', AddRow_Pg5S6I6PopTable)" />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-weight: bold; font-size: small;">Subtotal: </span>
                    </td>
                    <td>
                        <input type="text" id="Pg5S6I6SubTotal" name="Pg5S6I6SubTotal" disabled="disabled" />
                    </td>
                </tr>
            </table>
            <br />
            <center>
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Save " onclick="Save_Pg5S6I6PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Save and Close " onclick="SaveAndClose(Save_Pg5S6I6PopTable, '#Pg5S6I6Pop')" />
                &nbsp;&nbsp;&nbsp;
                <!--<input type="button" value=" Cancel " onclick="cancelModal('#Pg5S6I6Pop', Load_Pg5S6I6PopTable)" />-->
                <input type="button" value=" Cancel " onclick="Load_Pg5S6I6PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Close " name="closeModal" onclick="closeDialog('#Pg5S6I6Pop'),Load_Pg5S6I6PopTable() " />
                &nbsp;&nbsp;&nbsp;
                <br />
                <br />
                <input type="button" value=" Print " name="prnModal" onclick="printModal('Pg5S6I6Pop')" />
            </center>
        </div>
    </div>
    <div id="Pg5S6I8Pop" class="modalShow" style="display: none; width: 800;">
        <br />
        <div class="SubPageDiv">
            <table class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td align="left" class="tdschedTitle">
                        <center>
                            <span style="font-weight: bold; font-size: small;">Schedule 6 - Reconciliation of Net
                                Income per Books Against Taxable Income</span> <span style="font-style: italic; font-size: x-small;">
                                    (Attach additional sheet/s, if necessary)</span>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        Less: B) Special Deductions
                    </td>
                </tr>
            </table>
            <table id="Pg5S6I8PopTable" class="RowSubTable, tblForm" style="width: 100%">
            </table>
            <table id="Pg5S6I8PopTotalTable" class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td colspan="2" align="right">
                        <br />
                        <!--<input type="button" value=" Add More " onclick="AddRow_Pg5S6I8PopTable()" />-->
                        <input type="button" value=" Add More " onclick="ConditionAddRow('Pg5S6I8PopTable', '8.', 'add more', AddRow_Pg5S6I8PopTable)" />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-weight: bold; font-size: small;">Subtotal: </span>
                    </td>
                    <td>
                        <input type="text" id="Pg5S6I8SubTotal" name="Pg5S6I8SubTotal" disabled="disabled" />
                    </td>
                </tr>
            </table>
            <br />
            <center>
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Save " onclick="Save_Pg5S6I8PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <!--<input type="button" value=" Save and Close " onclick="Save_Pg5S6I8PopTable(), closeDialog('#Pg5S6I8Pop')" />-->
                <input type="button" value=" Save and Close " onclick="SaveAndClose(Save_Pg5S6I8PopTable, '#Pg5S6I8Pop')" />
                &nbsp;&nbsp;&nbsp;
                <!--<input type="button" value=" Cancel " onclick="cancelModal('#Pg5S6I8Pop', Load_Pg5S6I8PopTable)" />-->
                <input type="button" value=" Cancel " onclick="Load_Pg5S6I8PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Close " name="closeModal" onclick="closeDialog('#Pg5S6I8Pop'), Load_Pg5S6I8PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <br />
                <br />
                <input type="button" value=" Print " name="prnModal" onclick="printModal('Pg5S6I8Pop')" />
            </center>
        </div>
    </div>
    <div id="Pg7S9Pt1Pop" class="modalShow" style="display: none;">
        <br />
        <div class="SubPageDiv">
            <table class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td align="left" colspan="4" class="tdschedTitle">
                        <center>
                            <span style="font-weight: bold; font-size: small;">Schedule 3 - Other Taxable Income
                                Not Subjected to Final Tax</span> <span style="font-style: italic; font-size: x-small;">
                                    (Attach additional sheet/s,if necessary)</span>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td align="left" colspan="4" class="tdschedTitle">
                        <center>
                            <span style="font-size: x-small;">Gross Income/ Receipts Subjected to Final Withholding</span>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: small; width: 220px; text-align: center;">
                        Description
                    </td>
                    <td style="font-size: small; width: 130px;">
                        A) Exempt
                    </td>
                    <td style="font-size: small; width: 150px;">
                        B) Actual Amount/Fair
                        <br />
                        Market Value/Net Capital Gains
                    </td>
                    <td style="font-size: small; width: 150px;">
                        C) Final Tax Withheld/Paid
                    </td>
                </tr>
            </table>
            <table id="Pg7S9Pt1PopTable" class="RowSubTable, tblForm" style="width: 100%">
            </table>
            <table id="Pg7S9Pt1TotalTable" class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td colspan="2" align="right">
                        <br />
                        <!--<input type="button" value=" Add More " onclick="AddRow_Pg7S9Pt1PopTable()" />-->
                        <input type="button" value=" Add More " onclick="ConditionAddRow('Pg7S9Pt1PopTable', '4.', 'add more', AddRow_Pg7S9Pt1PopTable)" />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-weight: bold; font-size: small;">C) Final Tax Withheld/Paid Subtotal:
                        </span>
                    </td>
                    <td>
                        <input type="text" id="Pg7S9Pt1SubTotal" name="Pg7S9Pt1SubTotal" disabled="disabled" />
                    </td>
                </tr>
            </table>
            <br />
            <center>
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Save " onclick="Save_Pg7S9Pt1PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Save and Close " onclick="SaveAndClose(Save_Pg7S9Pt1PopTable, '#Pg7S9Pt1Pop')" />
                &nbsp;&nbsp;&nbsp;
                <!--<input type="button" value=" Cancel " onclick="cancelModal('#Pg7S9Pt1Pop' , Load_Pg7S9Pt1PopTable)" />-->
                <input type="button" value=" Cancel " onclick="Load_Pg7S9Pt1PopTable()" />
                &nbsp;&nbsp;&nbsp;
                <input type="button" value=" Close " name="closeModal" onclick="closeDialog('#Pg7S9Pt1Pop'), Load_Pg7S9Pt1PopTable() " />
                &nbsp;&nbsp;&nbsp;
                <br />
                <br />
                <input type="button" value=" Print " name="prnModal" onclick="printModal('Pg7S9Pt1Pop')" />
            </center>
        </div>
        <br />
    </div>
    <div id="Pg7S9Pt2Pop" class="modalShow2" style="display: none; width: 850;">
        <br />
        <div class="SubPageDiv">
            <table class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td align="left" class="tdschedTitle">
                        <center>
                            <span style="font-weight: bold; font-size: small;">Schedule 9 - Supplemental Information</span>
                            <span style="font-style: italic; font-size: x-small;">(Attach additional sheet/s, if
                                necessary)</span>
                        </center>
                    </td>
                </tr>
            </table>
            <div id="Pg7S9Pt2IterationDiv">
                <!-- content here-->
            </div>
            <div id="Pg7S9Pt2IterationDivSaver" style="display: none;">
                <!-- content here-->
            </div>
            <div id="Pg7S9Pt2IterationMenu">
                <br />
                <input type="button" value="Add More" onclick="ConditionAddDiv('#Pg7S9Pt2IterationDiv',') Sale / Exchange #',AddDiv_Pg7S9Pt2PopDiv)" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <center>
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" value=" Save " onclick="Save_Pg7S9Pt2PopDiv()" />
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" value=" Save and Close " onclick="ConditionSave(Save_Pg7S9Pt2PopDiv, '#Pg7S9Pt2Pop', '#Pg7S9Pt2IterationDiv')" />
                    &nbsp;&nbsp;&nbsp;
                    <!--<input type="button" value=" Cancel " onclick="cancelModal2('#Pg7S9Pt2Pop', '#Pg7S9Pt2IterationDiv')" />-->
                    <input type="button" value=" Cancel " onclick="Load_Pg7S9Pt2PopDiv()" />
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" value=" Close " name="closeModal" onclick="closeDialog('#Pg7S9Pt2Pop'), Empty_Temp('#Pg7S9Pt2IterationDiv')" />
                    &nbsp;&nbsp;&nbsp;
                    <br />
                    <br />
                    <input type="button" value=" Print " name="prnModal" onclick="printModal('Pg7S9Pt2Pop')" />
                </center>
            </div>
        </div>
    </div>
    <div id="Pg7S9Pt3Pop" class="modalShow2" style="display: none; width: 850;">
        <br />
        <div class="SubPageDiv">
            <table class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td align="left" class="tdschedTitle">
                        <center>
                            <span style="font-weight: bold; font-size: small;">Schedule 9 - Supplemental Information</span>
                            <span style="font-style: italic; font-size: x-small;">(Attach additional sheet/s, if
                                necessary)</span>
                        </center>
                    </td>
                </tr>
            </table>
            <div id="Pg7S9Pt3IterationDiv">
                <!-- content here-->
            </div>
            <div id="Pg7S9Pt3IterationDivSaver" style="display: none;">
                <!-- content here-->
            </div>
            <div id="Pg7S9Pt3IterationMenu">
                <br />
                <!--<input type="button" value="Add More" onclick="AddDiv_Pg7S9Pt3PopDiv()" />-->
                <input type="button" value="Add More" onclick="ConditionAddDiv('#Pg7S9Pt3IterationDiv', ') Sale / Exchange #' ,AddDiv_Pg7S9Pt3PopDiv)" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <center>
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" value=" Save " onclick="Save_Pg7S9Pt3PopDiv()" />
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" value=" Save and Close " onclick="Pg7S9Pt3ConditionSave()" />
                    &nbsp;&nbsp;&nbsp;
                    <!--<input type="button" value=" Cancel " onclick="cancelModal2('#Pg7S9Pt3Pop', '#Pg7S9Pt3IterationDiv')" />-->
                    <input type="button" value=" Cancel " onclick="Load_Pg7S9Pt3PopDiv()" />
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" value=" Close " name="closeModal" onclick="closeDialog('#Pg7S9Pt3Pop'), Empty_Temp('#Pg7S9Pt3IterationDiv')" />
                    &nbsp;&nbsp;&nbsp;
                    <br />
                    <br />
                    <input type="button" value=" Print " name="prnModal" onclick="printModal('Pg7S9Pt3Pop')" />
                </center>
            </div>
        </div>
    </div>
    <div id="Pg7S9Pt4Pop" class="modalShow2" style="display: none; width: 850;">
        <br />
        <div class="SubPageDiv">
            <table class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td align="left" class="tdschedTitle">
                        <center>
                            <span style="font-weight: bold; font-size: small;">Schedule 9 - Supplemental Information</span>
                            <span style="font-style: italic; font-size: x-small;">(Attach additional sheet/s, if
                                necessary)</span>
                        </center>
                    </td>
                </tr>
            </table>
            <div id="Pg7S9Pt4IterationDiv">
            </div>
            <div id="Pg7S9Pt4IterationDivSaver" style="display: none;">
            </div>
            <div id="Pg7S9Pt4IterationMenu">
                <br />
                <!--<input type="button" value="Add More" onclick="AddDiv_Pg7S9Pt4PopDiv()" />-->
                <input type="button" value="Add More" onclick="ConditionAddDiv('#Pg7S9Pt4IterationDiv', ') Other Income #' ,AddDiv_Pg7S9Pt4PopDiv)" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <center>
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" value=" Save " onclick="Save_Pg7S9Pt4PopDiv()" />
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" value=" Save and Close " onclick="Save_Pg7S9Pt4PopDiv(), closeDialog('#Pg7S9Pt4Pop'), Empty_Temp('#Pg7S9Pt4IterationDiv')" />
                    &nbsp;&nbsp;&nbsp;
                    <!--<input type="button" value=" Cancel " onclick="cancelModal2('#Pg7S9Pt4Pop', '#Pg7S9Pt4IterationDiv')" />-->
                    <input type="button" value=" Cancel " onclick="Load_Pg7S9Pt4PopDiv()" />
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" value=" Close " name="closeModal" onclick="closeDialog('#Pg7S9Pt4Pop'), Empty_Temp('#Pg7S9Pt4IterationDiv')" />
                    &nbsp;&nbsp;&nbsp;
                    <br />
                    <br />
                    <input type="button" value=" Print " name="prnModal" onclick="printModal('Pg7S9Pt4Pop')" />
                </center>
            </div>
        </div>
    </div>
    <div id="Pg7S9Pt5Pop" class="modalShow2" style="display: none; width: 850;">
        <br />
        <div class="SubPageDiv">
            <table class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td align="left" class="tdschedTitle">
                        <center>
                            <span style="font-weight: bold; font-size: small;">Schedule 10 - Gross Income/Receipts
                                Exempt from Income Tax</span>
                        </center>
                    </td>
                </tr>
            </table>
            <div id="Pg7S9Pt5IterationDiv">
            </div>
            <div id="Pg7S9Pt5IterationDivSaver" style="display: none;">
            </div>
            <div id="Pg7S9Pt5IterationMenu">
                <br />
                <!--<input type="button" value="Add More" onclick="AddDiv_Pg7S9Pt5PopDiv()" />-->
                <input type="button" value="Add More" onclick="ConditionAddDiv('#Pg7S9Pt5IterationDiv', ') Personal/Real Properties #' ,AddDiv_Pg7S9Pt5PopDiv)" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <center>
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" value=" Save " onclick="Save_Pg7S9Pt5PopDiv()" />
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" value=" Save and Close " onclick="Save_Pg7S9Pt5PopDiv(), closeDialog('#Pg7S9Pt5Pop'), Empty_Temp('#Pg7S9Pt5IterationDiv')" />
                    &nbsp;&nbsp;&nbsp;
                    <!--<input type="button" value=" Cancel " onclick="cancelModal2('#Pg7S9Pt5Pop', '#Pg7S9Pt5IterationDiv')" />-->
                    <input type="button" value=" Cancel " onclick="Load_Pg7S9Pt5PopDiv()" />
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" value=" Close " name="closeModal" onclick="closeDialog('#Pg7S9Pt5Pop'), Empty_Temp('#Pg7S9Pt5IterationDiv')" />
                    &nbsp;&nbsp;&nbsp;
                    <br />
                    <br />
                    <input type="button" value=" Print " name="prnModal" onclick="printModal('Pg7S9Pt5Pop')" />
                </center>
            </div>
        </div>
    </div>
    <div id="Pg7S9Pt6Pop" class="modalShow2" style="display: none; width: 850;">
        <br />
        <div class="SubPageDiv">
            <table class="RowSubTable, tblForm" style="width: 100%">
                <tr>
                    <td align="left" class="tdschedTitle">
                        <center>
                            <span style="font-weight: bold; font-size: small;">Schedule 10 - Gross Income/Receipts
                                Exempt from Income Tax</span>
                        </center>
                    </td>
                </tr>
            </table>
            <div id="Pg7S9Pt6IterationDiv">
            </div>
            <div id="Pg7S9Pt6IterationDivSaver" style="display: none;">
            </div>
            <div id="Pg7S9Pt6IterationMenu">
                <br />
                <!--<input type="button" value="Add More" onclick="AddDiv_Pg7S9Pt6PopDiv()" />-->
                <input type="button" value="Add More" onclick="ConditionAddDiv('#Pg7S9Pt6IterationDiv', ') Other Exempt Income #' ,AddDiv_Pg7S9Pt6PopDiv)" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <center>
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" value=" Save " onclick="Save_Pg7S9Pt6PopDiv()" />
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" value=" Save and Close " onclick="Save_Pg7S9Pt6PopDiv(), closeDialog('#Pg7S9Pt6Pop'), Empty_Temp('#Pg7S9Pt6IterationDiv')" />
                    &nbsp;&nbsp;&nbsp;
                    <!--<input type="button" value=" Cancel " onclick="cancelModal2('#Pg7S9Pt6Pop', '#Pg7S9Pt6IterationDiv')" />-->
                    <input type="button" value=" Cancel " onclick="Load_Pg7S9Pt6PopDiv()" />
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" value=" Close " name="closeModal" onclick="closeDialog('#Pg7S9Pt6Pop'), Empty_Temp('#Pg7S9Pt6IterationDiv')" />
                    &nbsp;&nbsp;&nbsp;
                    <br />
                    <br />
                    <input type="button" value=" Print " name="prnModal" onclick="printModal('Pg7S9Pt6Pop')" />
                </center>
            </div>
        </div>
    </div>
    
   
    <div style="display: none;">
        <input type="text" value="0" id="Pg4S3I3PopLength" name="Pg4S3I3PopLength" />
        <input type="text" id="Pg4S4I4PopLength" name="Pg4S4I4PopLength" />
        <input type="text" id="Pg5S4I39PopLength" name="Pg5S4I39PopLength"  />
        <input type="text" id="Pg5S5I4PopLength" name="Pg5S5I4PopLength" />
        <input type="text" id="Pg5S6I3PopLength" name="Pg5S6I3PopLength" />
        <input type="text" id="Pg5S6I6PopLength" name="Pg5S6I6PopLength" />
        <input type="text" id="Pg5S6I8PopLength" name="Pg5S6I8PopLength" />
        <input type="text" id="Pg7S9Pt1PopLength" name="Pg7S9Pt1PopLength" />
        <input type="text" id="Pg7S9Pt2PopLength" name="Pg7S9Pt2PopLength" />
        <input type="text" id="Pg7S9Pt3PopLength" name="Pg7S9Pt3PopLength" />
        <input type="text" id="Pg7S9Pt4PopLength" name="Pg7S9Pt4PopLength" />
        <input type="text" id="Pg7S9Pt5PopLength" name="Pg7S9Pt5PopLength" />
        <input type="text" id="Pg7S9Pt6PopLength" name="Pg7S9Pt6PopLength" />
    </div>
    </form>
    <textarea id='responsetext' style="display: none;"></textarea>
    <!-- XML retrieval -->
    <div style="display: none;">
        <xmp id='xmlFormat'>  
            </xmp>
        <!--format the doc -->
        <span id='xmlClose'>All Rights Reserved BIR 2014.</span>
    </div>
    <div id="responseBG" style="display: none;">
        <!--loaded files render here-->
    </div>
    <div id="response" style="display: none;">
        <!--loaded files render here-->
    </div>
    <div id="responseRdo" style="display: none;">
        <!--loaded files render here-->
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/forms/1702EX.js') }}" ></script>
<script type="text/javascript">

    function openDialog3(element) {
        $('#' + element).show("fade");
        centerMe2('#' + element);

        $('#containerPage').hide();
        $('#wrapper').hide();
        $('#PageFooter').hide();
    }

    function closeDialog3(element) {
        $('#' + element).hide("fade");
        $('#containerPage').show();
        
        $('#wrapper').show();
        $('#PageFooter').show();
    }
    function centerMe2(element) {
        //pass element name to be centered on screen
        var pWidth = $(window).width();
        var pTop = $(window).scrollTop()
        var eWidth = $(element).width()
        var height = $(element).height()
        $(element).css('top', '130px')
        $(element).css('left', parseInt((pWidth / 2) - (eWidth / 2)) + 'px')
    }


    function openDialog(element) {
        $('#container').hide();
        $(element).show('clip');
    }

    function closeDialog(element) {
        $('#container').show();
        $(element).hide('clip');

    }

    function openDialog2(element) {
        $('#overlay2').css('height', $(document.body).height() + 'px')
        $('#overlay2').show()
        $('#dialog2').html($(element).html())
        centerMe('#dialog2')
        $('#dialog2').slideDown();
    }

    function closeDialog2() {
        $('#overlay2').hide();
        $('#dialog2').slideUp().html('');
    }
    function Load_Schedule(schedule) {
        var $dialog2 = $('#dialog2').html($('#dialog2').html() + '<br /> &nbsp;&nbsp;&nbsp; <input type="button" value=" Save " onclick="Save_Schedule(dialog2,' + "'" + schedule + "'" + ')"/>'
                        + '&nbsp;&nbsp;&nbsp; <input type="button" value=" Save and Close " onclick="Save_Schedule(dialog2,' + "'" + schedule + "'" + '), closeDialog2()" /> '
                        + '&nbsp;&nbsp;&nbsp; <input type="button" value=" Cancel " onclick="closeDialog2()" /> ');

        Get_Schedule(schedule);
    }

    function Get_Schedule(schedule) {
        var $schedTable = $($('#dialog2').find("div[id*='" + schedule + "']")[0]);
        var origTableID = "#containerPage #" + $schedTable.attr("id");
        var $origSchedTable = $(origTableID);

        $schedTable.find("input").each(function (idx, elem) {
            var $elem = $(elem);
            $elem.val($(origTableID + " input[id='" + $elem.attr("id") + "']").val());
        });
        $schedTable = null;
        $origSchedTable = null;
    }
    function Save_Schedule(dialog, schedule) {
        var $schedTable = $($(dialog).find("div[id*='" + schedule + "']")[0]);
        var origTableID = "#containerPage #" + $schedTable.attr("id");
        var $origSchedTable = $(origTableID);

        $inputs = $schedTable.find("input").each(function (idx, elem) {
            var $elem = $(elem);
            $(origTableID + " input[id='" + $elem.attr("id") + "']").val($elem.val());
        });

        $inputs.blur(function () {
            var $this = $(this);

        });

        $inputs.trigger('blur');    //trigger remote blur        
        Get_Schedule(schedule);     //get values from original

    }

    function centerMe(element) {
        //pass element name to be centered on screen
        var pWidth = $(window).width();
        var pTop = $(window).scrollTop();
        var eWidth = $(element).width();
        var height = $(element).height();
        $(element).css('top', '130px');
        //$(element).css('top',pTop+100+'px')
        $(element).css('left', parseInt((pWidth / 2) - (eWidth / 2)) + 'px');
    }

    function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    function cancelModal(modal, loadFunction) {
        var answer = confirm("Don't save changes?");
        if (answer == true) {
            closeDialog(modal);
            loadFunction();
        }
        else {
            return;
        }
    }

  
    function onFocusIterate(elem) {
        $(elem).css({ 'background': '#ffffcc' });
    }
    function onBlurIterate(elem) {
        $(elem).css({ 'background': '#ffffff' });
    }

    function CheckEmptyDesc(table, number, method) {
        numRows = document.getElementById(table).rows.length;
        table = document.getElementById(table);

        for (x = 0; x < numRows; x++) {
            cellslength = table.rows[x].cells.length;
            str = table.rows[x].cells[0].children[1].value;

            if ($.trim(str) == "") {
                alert('Cannot ' + method + '. You have an empty description on item ' + number + (x + 1));
                return false;
            }

            if (cellslength == 3) {
                val = table.rows[x].cells[1].children[0].value * 1;
                if ($.trim(str) != "" && val == 0) {
                    alert('Cannot ' + method + '.  Amount should not be zero on item ' + number + (x + 1));
                    return false;
                }
            }
            else if (cellslength == 4) {
                str2 = table.rows[x].cells[1].children[0].value;

                if ($.trim(str2) == "") {
                    alert('Cannot ' + method + '. Your legal basis is empty on item ' + number + (x + 1));
                    return false;
                }

                val = table.rows[x].cells[2].children[0].value * 1;
                if (($.trim(str) != "" || $.trim(str2) != "") && val == 0) {
                    alert('Cannot ' + method + '.  Amount should not be zero on item ' + number + (x + 1));
                    return false;
                }
            }

            else if (cellslength == 5) {
                taxA = table.rows[x].cells[1].children[0].value;
                taxB = table.rows[x].cells[2].children[0].value;
                taxC = table.rows[x].cells[3].children[0].value;

                if (taxA * 1 != 0 && taxB * 1 == 0 && taxC * 1 != 0) {
                    alert('Cannot ' + method + '. If there is an amount for A) Exempt, there should be no amount for C) Final Tax Withheld/Paid on item ' + number + (x + 1));
                    return false;
                }

                else if (taxB * 1 != 0 && taxC * 1 == 0) {
                    alert('Cannot ' + method + '. If there is an amount for  B) Actual Amount/ Fair Market Value/ Capital Gains, there should be an amount for C) Final Tax Withheld/Paid on item ' + number + (x + 1));
                    return false;
                }

                else if (taxB * 1 == 0 && taxC * 1 != 0) {
                    alert('Cannot ' + method + '. If there is an amount for C) Final Tax Withheld/Paid, there should be an amount for B) Actual Amount/ Fair Market Value/ Capital Gains on item ' + number + (x + 1));
                    return false;
                }



                else if (taxA * 1 == 0 && taxB * 1 == 0 && taxC * 1 == 0) {
                    alert('Cannot ' + method + '. Please enter an amount on item ' + number + (x + 1));
                    return false;
                }

            }
        }
        return true;
    }

    function SaveAndClose(saveFunction, popTable) {
        if (saveFunction()) {
            closeDialog(popTable);
        }
    }

    function ConditionAddRow(table, number, method, addFunction) {
        if (CheckEmptyDesc(table, number, method)) {
            addFunction();
        }
    }

    function ConditionPrint(table) {
        if (document.getElementById("frm1702EX:btnValidate").disabled) {
            $(table + " input[type='text']").attr("disabled", true);
            $(table + " input[type='button']").attr("disabled", true);
            $(table + " input[name='prnModal']").attr("disabled", false);
            $(table + " input[name='closeModal']").attr("disabled", false);
        }
        else {
            $(table + " input[type='text']").attr("disabled", false);
            $(table + " input[type='button']").attr("disabled", false);
            $(table + " input[name='prnModal']").attr("disabled", true);
        }
    }

    var Pg4S3I3_Col1 = new Array();
    var Pg4S3I3_Col2 = new Array();

    function Check_Pg4S3I3() {
        //  var isNotEmpty = true;
        if ($.trim(document.getElementById("frm1702EX:txtPg4S3I1Col1").value) == "" || document.getElementById("frm1702EX:txtPg4S3I1Col2").value * 1 == 0 ||
            $.trim(document.getElementById("frm1702EX:txtPg4S3I2Col1").value) == "" || document.getElementById("frm1702EX:txtPg4S3I2Col2").value * 1 == 0 ||
            $.trim(document.getElementById("frm1702EX:txtPg4S3I3Col1").value) == "" || document.getElementById("frm1702EX:txtPg4S3I3Col2").value * 1 == 0) {
            $('#btnPg4S3I3More').prop('disabled', true);
            if (!$('#dialog2').is(':empty')) {
                $('#dialog2 #btnPg4S3I3More').prop('disabled', true);
            }
            //      isNotEmpty = false;
        }
        else {
            $('#btnPg4S3I3More').prop('disabled', false);
            if (!$('#dialog2').is(':empty')) {
                $('#dialog2 #btnPg4S3I3More').prop('disabled', false);
            }
            //      isNotEmpty = true;
        }
        //  return isNotEmpty;
    }

    function Set_Pg4S3I3() {
        if (Pg4S3I3_Col1.length == 0) {
            Pg4S3I3_Col1[0] = document.getElementById("frm1702EX:txtPg4S3I3Col1").value;
            Pg4S3I3_Col2[0] = document.getElementById("frm1702EX:txtPg4S3I3Col2").value;

       }
    }


    function Save_Pg4S3I3PopTable() {


        numRows = document.getElementById("Pg4S3I3PopTable").rows.length;
        table = document.getElementById("Pg4S3I3PopTable");

        if (CheckEmptyDesc("Pg4S3I3PopTable", "3.", "save")) {
            Pg4S3I3_Col1 = new Array();
            Pg4S3I3_Col2 = new Array();

            for (x = 0; x < numRows; x++) {
                str = table.rows[x].cells[0].children[1].value;
                if ($.trim(str) != "") {
                    Pg4S3I3_Col1.push(table.rows[x].cells[0].children[1].value);
                    Pg4S3I3_Col2.push(table.rows[x].cells[1].children[0].value);
                }
            }

            Load_Pg4S3I3PopTable();

            if (Pg4S3I3_Col1.length == 0) {
                document.getElementById("frm1702EX:txtPg4S3I3Col1").value = "";
                $(document.getElementById("frm1702EX:txtPg4S3I3Col1")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg4S3I3Col2")).prop('disabled', false);
                $('#btnPg4S3I3More').prop('disabled', true);
            }
            if (Pg4S3I3_Col1.length == 1) {
                document.getElementById("frm1702EX:txtPg4S3I3Col1").value = Pg4S3I3_Col1[0];
                document.getElementById("frm1702EX:txtPg4S3I3Col2").value = Pg4S3I3_Col2[0];
                $(document.getElementById("frm1702EX:txtPg4S3I3Col1")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg4S3I3Col2")).prop('disabled', false);
                $('#btnPg4S3I3More').prop('disabled', false);
            }

            if (Pg4S3I3_Col1.length > 1) {
                document.getElementById("frm1702EX:txtPg4S3I3Col1").value = "OTHERS";
                $(document.getElementById("frm1702EX:txtPg4S3I3Col1")).prop('disabled', true);
                $(document.getElementById("frm1702EX:txtPg4S3I3Col2")).prop('disabled', true);
            }

            document.getElementById("frm1702EX:txtPg4S3I3Col2").value = document.getElementById("Pg4S3I3SubTotal").value;
            Compute_txtPg4S3I4TotalTaxIncome();

            if (!$('#dialog2').is(':empty')) {
                Get_Schedule('sched3');
            }
            document.getElementById("Pg4S3I3PopLength").value = Pg4S3I3_Col1.length;
            alert('The items have been saved');

            return true;
        }
        else
            return false;
    }

    function Load_Pg4S3I3PopTable() {
        $("#Pg4S3I3PopTable tr").remove();
        var i = Pg4S3I3_Col1.length;
        if (Pg4S3I3_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_Pg4S3I3PopTable();
                document.getElementById("frm1702EX:txtPg4S3I3_" + (x + 1) + "Col1").value = Pg4S3I3_Col1[x];
                document.getElementById("frm1702EX:txtPg4S3I3_" + (x + 1) + "Col2").value = FormatValue(Pg4S3I3_Col2[x]);
            }
        }
        ConditionPrint("#Pg4S3I3Pop");
        Sum_Pg4S3I3();
    }

    function FixNumber_Pg4S3I3PopTable() {
        var i = document.getElementById("Pg4S3I3PopTable").rows.length;
        var table = document.getElementById("Pg4S3I3PopTable");
        for (x = 0; x < i; x++) {
            numbering = table.rows[x].cells[0].children[0];
            $(numbering).html("3." + (x + 1));
        }
    }

    function AddRow_Pg4S3I3PopTable() {
        var i = document.getElementById("Pg4S3I3PopTable").rows.length;
        var table = document.getElementById("Pg4S3I3PopTable");

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        cell1.innerHTML = '<tr><td class="tblFormTd" align="center" style="width:60%;"><span style="font-weight: bold; font-size: small;">&nbsp;3.' + (i + 1) + '</span> <input type="text" onfocus="onFocusIterate(this)" onkeypress="return Code(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="30" size="50" id="frm1702EX:txtPg4S3I3_' + (i + 1) + 'Col1" name="frm1702EX:txtPg4S3I3_Col1[]"/></td>';
        cell2.innerHTML = '<td class="tblFormTd" align="center" style="width:30%;"><input type="text" onfocus="onFocusIterate(this)" id="frm1702EX:txtPg4S3I3_' + (i + 1) + 'Col2" name="frm1702EX:txtPg4S3I3_Col2[]" style="text-align: right;" size="20" onblur="onBlurIterate(this),toComma(this), Sum_Pg4S3I3()" onkeypress="return wholenumber(this, event)"  maxlength="12" /></td>';
        cell3.innerHTML = '<td class="tblFormTd" align="center" style="width:10%;"><input type="button" value="Remove" onclick="deleteRow(this), FixNumber_Pg4S3I3PopTable(), Sum_Pg4S3I3()"/></td></tr>';
    }

    //Summation
    function Sum_Pg4S3I3() {
        var total = 0;

        numRows = document.getElementById("Pg4S3I3PopTable").rows.length;
        table = document.getElementById("Pg4S3I3PopTable");

        for (x = 0; x < numRows; x++) {
            total += removeCommaParenthesis(table.rows[x].cells[1].children[0].id) * 1;
        }
        document.getElementById("Pg4S3I3SubTotal").disabled = true;
        document.getElementById("Pg4S3I3SubTotal").value = FormatValue(total);
    }

    var Pg4S4I4_Col1 = new Array();
    var Pg4S4I4_Col2 = new Array();

    function Check_Pg4S4I4() {
        //  var isNotEmpty = true;
        if ($.trim(document.getElementById("frm1702EX:txtPg4S4I2Col1").value) == "" || document.getElementById("frm1702EX:txtPg4S4I2Col2").value * 1 == 0 ||
            $.trim(document.getElementById("frm1702EX:txtPg4S4I3Col1").value) == "" || document.getElementById("frm1702EX:txtPg4S4I3Col2").value * 1 == 0 ||
            $.trim(document.getElementById("frm1702EX:txtPg4S4I4Col1").value) == "" || document.getElementById("frm1702EX:txtPg4S4I4Col2").value * 1 == 0) {
            $('#btnPg4S4I4More').prop('disabled', true);
            if (!$('#dialog2').is(':empty')) {
                $('#dialog2 #btnPg4S4I4More').prop('disabled', true);
            }
            //      isNotEmpty = false;
        }
        else {
            $('#btnPg4S4I4More').prop('disabled', false);
            if (!$('#dialog2').is(':empty')) {
                $('#dialog2 #btnPg4S4I4More').prop('disabled', false);
            }
        }
    }

    function Set_Pg4S4I4() {
        if (Pg4S4I4_Col1.length == 0) {
            Pg4S4I4_Col1[0] = document.getElementById("frm1702EX:txtPg4S4I4Col1").value;
            Pg4S4I4_Col2[0] = document.getElementById("frm1702EX:txtPg4S4I4Col2").value;
        }
    }
    function Save_Pg4S4I4PopTable() {
        numRows = document.getElementById("Pg4S4I4PopTable").rows.length;
        table = document.getElementById("Pg4S4I4PopTable");

        if (CheckEmptyDesc("Pg4S4I4PopTable", "4.", "save")) {
            Pg4S4I4_Col1 = new Array();
            Pg4S4I4_Col2 = new Array();

            for (x = 0; x < numRows; x++) {
                str = table.rows[x].cells[0].children[1].value;
                if ($.trim(str) != "") {
                    Pg4S4I4_Col1.push(table.rows[x].cells[0].children[1].value);
                    Pg4S4I4_Col2.push(table.rows[x].cells[1].children[0].value);
                }
            }

            Load_Pg4S4I4PopTable();

            if (Pg4S4I4_Col1.length == 0) {
                document.getElementById("frm1702EX:txtPg4S4I4Col1").value = "";
                $(document.getElementById("frm1702EX:txtPg4S4I4Col1")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg4S4I4Col2")).prop('disabled', false);
                $('#btnPg4S4I4More').prop('disabled', true);
            }
            if (Pg4S4I4_Col1.length == 1) {
                document.getElementById("frm1702EX:txtPg4S4I4Col1").value = Pg4S4I4_Col1[0];
                document.getElementById("frm1702EX:txtPg4S4I4Col2").value = Pg4S4I4_Col2[0];
                $(document.getElementById("frm1702EX:txtPg4S4I4Col1")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg4S4I4Col2")).prop('disabled', false);
                $('#btnPg4S4I4More').prop('disabled', false);
            }

            if (Pg4S4I4_Col1.length > 1) {
                document.getElementById("frm1702EX:txtPg4S4I4Col1").value = "OTHERS";
                $(document.getElementById("frm1702EX:txtPg4S4I4Col1")).prop('disabled', true);
                $(document.getElementById("frm1702EX:txtPg4S4I4Col2")).prop('disabled', true);
            }

            document.getElementById("frm1702EX:txtPg4S4I4Col2").value = document.getElementById("Pg4S4I4SubTotal").value;
            Compute_txtPg5S4I40TotalAllowableDeduction();

            if (!$('#dialog2').is(':empty')) {
                Get_Schedule('sched4p1');
            }
            document.getElementById("Pg4S4I4PopLength").value = Pg4S4I4_Col1.length;
            alert('The items have been saved');
            return true;
        }
        else
            return false;
    }

    function Load_Pg4S4I4PopTable() {
        $("#Pg4S4I4PopTable tr").remove();
        var i = Pg4S4I4_Col1.length;
        if (Pg4S4I4_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_Pg4S4I4PopTable();
                document.getElementById("frm1702EX:txtPg4S4I4_" + (x + 1) + "Col1").value = Pg4S4I4_Col1[x];
                document.getElementById("frm1702EX:txtPg4S4I4_" + (x + 1) + "Col2").value = FormatValue(Pg4S4I4_Col2[x]);
            }
        }

        ConditionPrint("#Pg4S4I4Pop");
        Sum_Pg4S4I4();
    }

    function FixNumber_Pg4S4I4PopTable() {
        var i = document.getElementById("Pg4S4I4PopTable").rows.length;
        var table = document.getElementById("Pg4S4I4PopTable");
        for (x = 0; x < i; x++) {
            numbering = table.rows[x].cells[0].children[0];
            $(numbering).html("4." + (x + 1));
        }
    }

    function AddRow_Pg4S4I4PopTable() {
        var i = document.getElementById("Pg4S4I4PopTable").rows.length;
        var table = document.getElementById("Pg4S4I4PopTable");

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        cell1.innerHTML = '<tr><td class="tblFormTd" align="center" style="width:60%;"><span style="font-weight: bold; font-size: small;">&nbsp;4.' + (i + 1) + '</span> <input type="text"  onkeypress="return Code(this)" onblur="return capitalize(this), onBlurIterate(this)" onfocus="onFocusIterate(this)"  maxlength="30" size="50" id="frm1702EX:txtPg4S4I4_' + (i + 1) + 'Col1" name="frm1702EX:txtPg4S4I4_Col1[]"/></td>';
        cell2.innerHTML = '<td class="tblFormTd" align="center" style="width:30%;"><input type="text" onfocus="onFocusIterate(this)" id="frm1702EX:txtPg4S4I4_' + (i + 1) + 'Col2" name="frm1702EX:txtPg4S4I4_Col2[]" style="text-align: right;" size="20" onblur="onBlurIterate(this), toComma(this), Sum_Pg4S4I4()" onkeypress="return wholenumber(this, event)"  maxlength="12" /></td>';
        cell3.innerHTML = '<td class="tblFormTd" align="center" style="width:10%;"><input type="button" value="Remove" onclick="deleteRow(this), FixNumber_Pg4S4I4PopTable(), Sum_Pg4S4I4() "/></td></tr>';
    }

    //Summation
    function Sum_Pg4S4I4() {
        var total = 0;

        numRows = document.getElementById("Pg4S4I4PopTable").rows.length;
        table = document.getElementById("Pg4S4I4PopTable");

        for (x = 0; x < numRows; x++) {
            total += removeCommaParenthesis(table.rows[x].cells[1].children[0].id) * 1;
        }
        document.getElementById("Pg4S4I4SubTotal").disabled = true;
        document.getElementById("Pg4S4I4SubTotal").value = FormatValue(total);

    }

    var Pg5S4I39_Col1 = new Array();
    var Pg5S4I39_Col2 = new Array();

    function Check_Pg5S4I39() {
        //  var isNotEmpty = true;
        if ($.trim(document.getElementById("frm1702EX:txtPg5S4I39Col1").value) == "" || document.getElementById("frm1702EX:txtPg5S4I39Col2").value * 1 == 0 ||
            $.trim(document.getElementById("frm1702EX:txtPg5S4I38Col1").value) == "" || document.getElementById("frm1702EX:txtPg5S4I38Col2").value * 1 == 0 ||
            $.trim(document.getElementById("frm1702EX:txtPg5S4I37Col1").value) == "" || document.getElementById("frm1702EX:txtPg5S4I37Col2").value * 1 == 0 ||
            $.trim(document.getElementById("frm1702EX:txtPg5S4I36Col1").value) == "" || document.getElementById("frm1702EX:txtPg5S4I36Col2").value * 1 == 0) {
            $('#btnPg5S4I39More').prop('disabled', true);
            if (!$('#dialog2').is(':empty')) {
                $('#dialog2 #btnPg5S4I39More').prop('disabled', true);
            }
            //      isNotEmpty = false;
        }
        else {
            $('#btnPg5S4I39More').prop('disabled', false);
            if (!$('#dialog2').is(':empty')) {
                $('#dialog2 #btnPg5S4I39More').prop('disabled', false);
            }
            //      isNotEmpty = true;
        }
        //  return isNotEmpty;
    }

    function Set_Pg5S4I39() {

        if (Pg5S4I39_Col1.length == 0) {
            Pg5S4I39_Col1[0] = document.getElementById("frm1702EX:txtPg5S4I39Col1").value;
            Pg5S4I39_Col2[0] = document.getElementById("frm1702EX:txtPg5S4I39Col2").value;
        }
    }

    function Save_Pg5S4I39PopTable() {
        numRows = document.getElementById("Pg5S4I39PopTable").rows.length;
        table = document.getElementById("Pg5S4I39PopTable");

        if (CheckEmptyDesc("Pg5S4I39PopTable", "39.", "save")) {
            Pg5S4I39_Col1 = new Array();
            Pg5S4I39_Col2 = new Array();

            for (x = 0; x < numRows; x++) {
                str = table.rows[x].cells[0].children[1].value;
                if ($.trim(str) != "") {
                    Pg5S4I39_Col1.push(table.rows[x].cells[0].children[1].value);
                    Pg5S4I39_Col2.push(table.rows[x].cells[1].children[0].value);
                }
            }

            Load_Pg5S4I39PopTable();

            if (Pg5S4I39_Col1.length == 0) {
                document.getElementById("frm1702EX:txtPg5S4I39Col1").value = "";
                $(document.getElementById("frm1702EX:txtPg5S4I39Col1")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg5S4I39Col2")).prop('disabled', false);
                $('#btnPg5S4I39More').prop('disabled', true);
            }
            if (Pg5S4I39_Col1.length == 1) {
                document.getElementById("frm1702EX:txtPg5S4I39Col1").value = Pg5S4I39_Col1[0];
                document.getElementById("frm1702EX:txtPg5S4I39Col2").value = Pg5S4I39_Col2[0];
                $(document.getElementById("frm1702EX:txtPg5S4I39Col1")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg5S4I39Col2")).prop('disabled', false);
                $('#btnPg5S4I39More').prop('disabled', false);
            }

            if (Pg5S4I39_Col1.length > 1) {
                document.getElementById("frm1702EX:txtPg5S4I39Col1").value = "OTHERS";
                $(document.getElementById("frm1702EX:txtPg5S4I39Col1")).prop('disabled', true);
                $(document.getElementById("frm1702EX:txtPg5S4I39Col2")).prop('disabled', true);
            }

            document.getElementById("frm1702EX:txtPg5S4I39Col2").value = document.getElementById("Pg5S4I39SubTotal").value;
            Compute_txtPg5S4I40TotalAllowableDeduction();

            if (!$('#dialog2').is(':empty')) {
                Get_Schedule('sched4p2');
            }

            document.getElementById("Pg5S4I39PopLength").value = Pg5S4I39_Col1.length;
            alert('The items have been saved');
            return true;
        }
        else
            return false;
    }

    function Load_Pg5S4I39PopTable() {
        $("#Pg5S4I39PopTable tr").remove();
        var i = Pg5S4I39_Col1.length;
        if (Pg5S4I39_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_Pg5S4I39PopTable();
                document.getElementById("frm1702EX:txtPg5S4I39_" + (x + 1) + "Col1").value = Pg5S4I39_Col1[x];
                document.getElementById("frm1702EX:txtPg5S4I39_" + (x + 1) + "Col2").value = FormatValue(Pg5S4I39_Col2[x]);
            }
        }
        ConditionPrint("#Pg5S4I39Pop");
        Sum_Pg5S4I39();
    }

    function FixNumber_Pg5S4I39PopTable() {
        var i = document.getElementById("Pg5S4I39PopTable").rows.length;
        var table = document.getElementById("Pg5S4I39PopTable");
        for (x = 0; x < i; x++) {
            numbering = table.rows[x].cells[0].children[0];
            $(numbering).html("39." + (x + 1));
        }
    }

    function AddRow_Pg5S4I39PopTable() {
        var i = document.getElementById("Pg5S4I39PopTable").rows.length;
        var table = document.getElementById("Pg5S4I39PopTable");

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        cell1.innerHTML = '<tr><td class="tblFormTd" align="center" style="width:60%;"><span style="font-weight: bold; font-size: small;">&nbsp;39.' + (i + 1) + '</span> <input type="text"  onkeypress="return Code(this)" onblur="return capitalize(this), onBlurIterate(this)" onfocus="onFocusIterate(this)"  maxlength="30" size="50" id="frm1702EX:txtPg5S4I39_' + (i + 1) + 'Col1" name="frm1702EX:txtPg5S4I39_Col1[]"/></td>';
        cell2.innerHTML = '<td class="tblFormTd" align="center" style="width:30%;"><input type="text" onfocus="onFocusIterate(this)" id="frm1702EX:txtPg5S4I39_' + (i + 1) + 'Col2" name="frm1702EX:txtPg5S4I39_Col2[]" style="text-align: right;" size="20" onblur="onBlurIterate(this), toComma(this), Sum_Pg5S4I39()" onkeypress="return wholenumber(this, event)"  maxlength="12" /></td>';
        cell3.innerHTML = '<td class="tblFormTd" align="center" style="width:10%;"><input type="button" value="Remove" onclick="deleteRow(this),FixNumber_Pg5S4I39PopTable(), Sum_Pg5S4I39()"/></td></tr>';
    }

    //Summation
    function Sum_Pg5S4I39() {
        var total = 0;

        numRows = document.getElementById("Pg5S4I39PopTable").rows.length;
        table = document.getElementById("Pg5S4I39PopTable");

        for (x = 0; x < numRows; x++) {
            total += removeCommaParenthesis(table.rows[x].cells[1].children[0].id) * 1;
        }
        document.getElementById("Pg5S4I39SubTotal").disabled = true;
        document.getElementById("Pg5S4I39SubTotal").value = FormatValue(total);

    }

    var Pg5S5I4_Col1 = new Array();
    var Pg5S5I4_Col2 = new Array();
    var Pg5S5I4_Col3 = new Array();

    function Check_Pg5S5I4() {
        //  var isNotEmpty = true;

        if ($.trim(document.getElementById("frm1702EX:txtPg5S5I4Col1").value) == "" || $.trim(document.getElementById("frm1702EX:txtPg5S5I4Col2").value) == "" || document.getElementById("frm1702EX:txtPg5S5I4Col3").value * 1 == 0 ||
            $.trim(document.getElementById("frm1702EX:txtPg5S5I3Col1").value) == "" || $.trim(document.getElementById("frm1702EX:txtPg5S5I3Col2").value) == "" || document.getElementById("frm1702EX:txtPg5S5I3Col3").value * 1 == 0 ||
            $.trim(document.getElementById("frm1702EX:txtPg5S5I2Col1").value) == "" || $.trim(document.getElementById("frm1702EX:txtPg5S5I2Col2").value) == "" || document.getElementById("frm1702EX:txtPg5S5I2Col3").value * 1 == 0 ||
            $.trim(document.getElementById("frm1702EX:txtPg5S5I1Col1").value) == "" || $.trim(document.getElementById("frm1702EX:txtPg5S5I1Col2").value) == "" || document.getElementById("frm1702EX:txtPg5S5I1Col3").value * 1 == 0) {
            $('#btnPg5S5I4More').prop('disabled', true);
            if (!$('#dialog2').is(':empty')) {
                $('#dialog2 #btnPg5S5I4More').prop('disabled', true);
            }
        }
        else {
            $('#btnPg5S5I4More').prop('disabled', false);
            if (!$('#dialog2').is(':empty')) {
                $('#dialog2 #btnPg5S5I4More').prop('disabled', false);
            }
        }
    }

    function Set_Pg5S5I4() {
        if (Pg5S5I4_Col1.length == 0) {
            Pg5S5I4_Col1[0] = document.getElementById("frm1702EX:txtPg5S5I4Col1").value;
            Pg5S5I4_Col2[0] = document.getElementById("frm1702EX:txtPg5S5I4Col2").value;
            Pg5S5I4_Col3[0] = document.getElementById("frm1702EX:txtPg5S5I4Col3").value;

        }
    }

    function Save_Pg5S5I4PopTable() {
        numRows = document.getElementById("Pg5S5I4PopTable").rows.length;
        table = document.getElementById("Pg5S5I4PopTable");

         if (CheckEmptyDesc("Pg5S5I4PopTable", "4.", "save")) {
            Pg5S5I4_Col1 = new Array();
            Pg5S5I4_Col2 = new Array();
            Pg5S5I4_Col3 = new Array();

            for (x = 0; x < numRows; x++) {
                str = table.rows[x].cells[0].children[1].value;
                if ($.trim(str) != "") {
                    Pg5S5I4_Col1.push(table.rows[x].cells[0].children[1].value);
                    Pg5S5I4_Col2.push(table.rows[x].cells[1].children[0].value);
                    Pg5S5I4_Col3.push(table.rows[x].cells[2].children[0].value);
                }
            }

            Load_Pg5S5I4PopTable();

            if (Pg5S5I4_Col1.length == 0) {
                document.getElementById("frm1702EX:txtPg5S5I4Col1").value = "";
                document.getElementById("frm1702EX:txtPg5S5I4Col2").value = "";
                $(document.getElementById("frm1702EX:txtPg5S5I4Col1")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg5S5I4Col2")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg5S5I4Col3")).prop('disabled', false);
                $('#btnPg5S5I4More').prop('disabled', true);
            }
            if (Pg5S5I4_Col1.length == 1) {
                document.getElementById("frm1702EX:txtPg5S5I4Col1").value = Pg5S5I4_Col1[0];
                document.getElementById("frm1702EX:txtPg5S5I4Col2").value = Pg5S5I4_Col2[0];
                document.getElementById("frm1702EX:txtPg5S5I4Col3").value = Pg5S5I4_Col3[0];
                $(document.getElementById("frm1702EX:txtPg5S5I4Col1")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg5S5I4Col2")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg5S5I4Col3")).prop('disabled', false);
                $('#btnPg5S5I4More').prop('disabled', false);
            }

            if (Pg5S5I4_Col1.length > 1) {
                document.getElementById("frm1702EX:txtPg5S5I4Col1").value = "OTHERS";
                $(document.getElementById("frm1702EX:txtPg5S5I4Col1")).prop('disabled', true);
                $(document.getElementById("frm1702EX:txtPg5S5I4Col2")).prop('disabled', true);
                $(document.getElementById("frm1702EX:txtPg5S5I4Col3")).prop('disabled', true);
            }

            document.getElementById("frm1702EX:txtPg5S5I4Col3").value = document.getElementById("Pg5S5I4SubTotal").value;
            Compute_txtPg5S5I5TotalAllowable();

            if (!$('#dialog2').is(':empty')) {
                Get_Schedule('sched5');
            }

            document.getElementById("Pg5S5I4PopLength").value = Pg5S5I4_Col1.length;

            alert('The items have been saved');
            return true;
        }
        else
            return false;
    }

    function Load_Pg5S5I4PopTable() {
        $("#Pg5S5I4PopTable tr").remove();
        var i = Pg5S5I4_Col1.length;
        if (Pg5S5I4_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_Pg5S5I4PopTable();
                document.getElementById("frm1702EX:txtPg5S5I4_" + (x + 1) + "Col1").value = Pg5S5I4_Col1[x];
                document.getElementById("frm1702EX:txtPg5S5I4_" + (x + 1) + "Col2").value = Pg5S5I4_Col2[x];
                document.getElementById("frm1702EX:txtPg5S5I4_" + (x + 1) + "Col3").value = FormatValue(Pg5S5I4_Col3[x]);
            }
        }

        ConditionPrint("#Pg5S5I4Pop");
        Sum_Pg5S5I4();
    }

    function FixNumber_Pg5S5I4PopTable() {
        var i = document.getElementById("Pg5S5I4PopTable").rows.length;
        var table = document.getElementById("Pg5S5I4PopTable");
        for (x = 0; x < i; x++) {
            numbering = table.rows[x].cells[0].children[0];
            $(numbering).html("4." + (x + 1));
        }
    }

    function AddRow_Pg5S5I4PopTable() {
        var i = document.getElementById("Pg5S5I4PopTable").rows.length;
        var table = document.getElementById("Pg5S5I4PopTable");

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);

        cell1.innerHTML = '<tr><td class="tblFormTd" align="center" style="width:30%;"><span style="font-weight: bold; font-size: small;">&nbsp;4.' + (i + 1) + '</span> <input type="text" onfocus="onFocusIterate(this)"  onkeypress="return Code(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="22" size="35" id="frm1702EX:txtPg5S5I4_' + (i + 1) + 'Col1" name="frm1702EX:txtPg5S5I4_Col1[]"/></td>';
        cell2.innerHTML = '<td class="tblFormTd" align="center" style="width:30%;"><input type="text" onfocus="onFocusIterate(this)"  onkeypress="return Code(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="17" size="25" id="frm1702EX:txtPg5S5I4_' + (i + 1) + 'Col2" name="frm1702EX:txtPg5S5I4_Col2[]"/></td>';
        cell3.innerHTML = '<td class="tblFormTd" align="center" style="width:20%;"><input type="text" onfocus="onFocusIterate(this)" id="frm1702EX:txtPg5S5I4_' + (i + 1) + 'Col3" name="frm1702EX:txtPg5S5I4_Col3[]" style="text-align: right;" size="20" onblur="onBlurIterate(this), toComma(this), Sum_Pg5S5I4()" onkeypress="return wholenumber(this, event)"  maxlength="12" /></td>';
        cell4.innerHTML = '<td class="tblFormTd" align="center" style="width:10%;"><input type="button" value="Remove" onclick="deleteRow(this),FixNumber_Pg5S5I4PopTable(), Sum_Pg5S5I4()"/></td></tr>';
    }

    //Summation
    function Sum_Pg5S5I4() {
        var total = 0;

        numRows = document.getElementById("Pg5S5I4PopTable").rows.length;
        table = document.getElementById("Pg5S5I4PopTable");

        for (x = 0; x < numRows; x++) {
            total += removeCommaParenthesis(table.rows[x].cells[2].children[0].id) * 1;
        }
        document.getElementById("Pg5S5I4SubTotal").disabled = true;
        document.getElementById("Pg5S5I4SubTotal").value = FormatValue(total);
    }

    var Pg5S6I3_Col1 = new Array();
    var Pg5S6I3_Col2 = new Array();

    function Check_Pg5S6I3() {
        if ($.trim(document.getElementById("frm1702EX:txtPg5S6I3Col1").value) == "" || document.getElementById("frm1702EX:txtPg5S6I3Col2").value * 1 == 0 ||
            $.trim(document.getElementById("frm1702EX:txtPg5S6I2Col1").value) == "" || document.getElementById("frm1702EX:txtPg5S6I2Col2").value * 1 == 0) {
            $('#btnPg5S6I3More').prop('disabled', true);
        }
        else {
            $('#btnPg5S6I3More').prop('disabled', false);
        }
    }

    function Set_Pg5S6I3() {
        if (Pg5S6I3_Col1.length == 0) {
            Pg5S6I3_Col1[0] = document.getElementById("frm1702EX:txtPg5S6I3Col1").value;
            Pg5S6I3_Col2[0] = document.getElementById("frm1702EX:txtPg5S6I3Col2").value;

        }
    }

    

    function FormatValue(number) {
        var positveSign = true;

        noLeadingZerosString = number.toString().replace(/^0+/, '');

        num = noLeadingZerosString.toString().replace(/\$|\,/g, '');
        if (num.indexOf('-') >= 0) {
            num = Math.abs(num).toString();
            positveSign = false;
        }
        if (num.indexOf('.') > 0 && num > 0) {
            var parts = num.toString().split('.');
            num = parts[0];
        }
        if (isNaN(num))
            num = "0";
        //alert(num);
        if ((num != "0") && (num != "0.00")) {
            for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
                num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
        }
        else {
            num = "0";
        }

        if (num == "" || num == "0")
            return "0";
        else

            return (((positveSign) ? '' : '(') + num + ((positveSign) ? '' : ')'));
    }


    function wholenumberNeg(e, decimal) {
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
        else if ((("0123456789-").indexOf(keychar) > -1)) {
            return true;
        }
        else
            return false;
    }

    function toComma(elem) {
        //console.log(elem);
        var myValue;
        myValue = FormatValue((elem).value);
        if (myValue.indexOf(')') > 0)
            myValue = "0";
        (elem).value = myValue;
    }

   
    function initSoap() {
        taxpayer = {};
        totalTaxPayable = {};
        // Page 2
        ComputationOfTaxBean = {};
        taxReliefAvailment = {};
        externalAuditorAccreditedTaxAgentBean = {};
        // Page 3
        salesRevenueBean = {};
        costOfSaleBean = {};
        // Page 4 Schedule 3
        schedule3 = {};
        OtherTaxableIncomeNotSubjectToFinalTax = {};
        OtherTaxableIncomeNotSubjectToFinalTaxList = [];
        // Page 4 Schedule 4
        schedule4 = {};
        amortization = {};
        amortizationList = [];
        others = {};
        otherList = [];
        // Page 5 Schedule 5
        schedule5 = {};
        specialAllowableItemizedDeductions = {};
        specialAllowableItemizedDeductionsList = [];
        // Page 5 Schedule 6
        schedule6 = {};
        schedule6Iterating = {};
        nonDeductibleExpensesItemList = [];
        nonTaxableAndSpDeductionsItemList = [];
        specialDeductionsItemList = [];
        // Page 6 Schedule 7
        balanceSheetBean = {};
        // Page 6 Schedule 8
        schedule8 = {};
        stockholders = {};
        stockholdersList = [];
        // Page 7 Schedule 9I
        schedule9I = {};
        grossIncomeSubjectToFinalWithholding = {};
        grossIncomeSubjectToFinalWithholdingList = [];
        // Page 7 Schedule 9II
        realPropertySale = {};
        realPropertySaleList = [];
        // Page 7 Schedule 9III
        stockShareSale = {};
        stockShareSaleList = [];
        // Page 7 Schedule 9IV
        otherIncome = {};
        otherIncomeList = [];
        // Page 7 Schedule 10
        premium = {};
        // Page 7 Schedule 10I
        personalPropertyReceived = {};
        personalPropertyReceivedList = [];
        // Page 7 Schedule 10II
        otherExemptIncome = {};
        otherExemptIncomeList = [];
    }

    var isAmendedReturn = false; //new
    var isNewEntry = false; //new

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

    var p3BasicTax = "";
    var p3TotalPenalties = "";
    var p3TotalAmountPayable = "";
    var p3GrossSales = "";

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

    var currentPage = 1;
    var MaxPage = 7;

    /*----------------------------------*/
    var d = document, XMLBGFile = '', data = '', XMLFile = '', XMLATCFile = '', msg = d.getElementById('msg');
    var loader = d.getElementById('loader');
    /*----------------------------------*/

    setTimeout("sleeptime()", 200);

    function redirectToSchedule() {
        if (confirm("Schedules need to be filled up before Part II, IV and V can have values. Do you want to fill up the Schedules first? (Clicking on 'OK' will redirect you to Schedule 1)") === true) {
            document.getElementById("frm1702EX:txtCurrentPage").value = 3;
            goToPage();
        }
    }
    var globalEmail = "";
    function sleeptime() {
        //var delay = 0;

        init();

        var xmlFileName = document.getElementById('file_name').value;        
        fileName = xmlFileName;
        if (fileName != null && fileName.indexOf('.xml') > -1) {
            loadXML(fileName);
            existingXMLFileName = fileName;
            
            if (gIsReadOnly) {
                window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false; d.getElementById('btnPrint').disabled = false; document.getElementById('frm1702EX:btnPrevPage').disabled = false;"
            + " document.getElementById('frm1702EX:btnNextPage').disabled = false;", 1000);
            }


        } else {
            window.setTimeout("$('#loader').hide('blind');", 200);

            isNewEntry = true;

        }
        if ($('#printMenu').css('display') != 'none') {
            $('#printMenu').hide('blind');
        }

        enableEmptyMandatory();
        getDisabledText();
        loadToArray();
        loadToDiv();
        checkMoreButtons();

        $('input[maxlength="12"]').each(function () {
            var currentId = $(this).attr('id');
            myvalue = FormatValue(document.getElementById(currentId).value);

            if (myvalue == "")
                myvalue = "0";

            document.getElementById(currentId).value = myvalue;

        });

        $('#sched7 input[maxlength="15"]').each(function () {
            var currentId = $(this).attr('id');
            myvalue = FormatValue(document.getElementById(currentId).value);

            if (myvalue == "")
                myvalue = "0";

            document.getElementById(currentId).value = myvalue;

        });

        //set pager to 1
        document.getElementById("frm1702EX:txtCurrentPage").value = "1";
        document.getElementById("frm1702EX:txtPg1Pt1I10RegisteredAddress").value = document.getElementById("frm1702EX:txtPg1Pt1I10RegisteredAddress").value.toUpperCase();
        document.getElementById("frm1702EX:txtPg1Pt1I13MainLine").value = document.getElementById("frm1702EX:txtPg1Pt1I13MainLine").value.toUpperCase();

        var myNameValue = document.getElementById("frm1702EX:txtPg1Pt1I9RegisteredName").value;
        $("input[name='frm1702EX\:RegName']").val(myNameValue);
        // $("input[name='frm1702EX\:TIN4']").val("0000");
        if (document.getElementById("frm1702EX:rdoPg1I1Calendar").checked == true) {

            var currentDate = new Date();

            document.getElementById("frm1702EX:ddlPg1I2Date").disabled = true;
            document.getElementById("frm1702EX:txtPg1I2YearEnd").disabled = false;
            if (document.getElementById("frm1702EX:txtPg1I2YearEnd").value == "") {
                document.getElementById("frm1702EX:txtPg1I2YearEnd").value = (currentDate.getFullYear() - 2000) - 1;
            }
        }

        Select_CTCorReg();
        
    }

    function init() {
        @if($action != 'view')
        document.getElementById("frm1702EX:btnEdit").disabled = true;
        document.getElementById("btnUpload").disabled = true;
        document.getElementById("frm1702EX:btnFinalCopy").disabled = true;
        @endif
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

    function goToSched(page) {
        document.getElementById("frm1702EX:txtCurrentPage").value = page;
        goToPage();
    }

    function goToPage() {
        var newVal = document.getElementById("frm1702EX:txtCurrentPage").value;



        if (isPrint) {
            $('#Print' + currentPage + 'Content').hide('blind');

            printPage();
        }
        else {

            $('#Page' + currentPage + 'Content').hide('blind');

            $('#Page' + newVal + 'Content').show('blind');
        }

        currentPage = document.getElementById("frm1702EX:txtCurrentPage").value;
    }
    function processPrev() {
        if (currentPage == 1)
            currentPage = 1;
        else {
            currentPage--;
            $('#Page' + currentPage + 'Content').show('blind');
            $('#Page' + (currentPage + 1) + 'Content').hide('blind');
            document.getElementById('frm1702EX:txtCurrentPage').value = currentPage;

        }
    }
    function processNext() {


        if (currentPage == MaxPage) {

        }
        else {
            currentPage++;
            $('#Page' + currentPage + 'Content').show('blind');
            $('#Page' + (currentPage - 1) + 'Content').hide('blind');
            document.getElementById('frm1702EX:txtCurrentPage').value = currentPage;
        }
    }



    function getDisabledText() {
        $("input, select").removeClass("disabledInputs");
        $("input:disabled, select:disabled").addClass("disabledInputs");

    }
    var disableElem = true;
    var enableElem = false;
    function disableAllControl() {
        $("input:text, select", $("#containerPage")).attr("disabled", true);
        $("input:button, input:checkbox, input:radio").attr("disabled", true);
        checkMoreButtons();
        disableElem;
        enableElem;
    }
    function enableAllControl() {

        $("input:text, select", $("#containerPage")).attr("disabled", false);
        $("input:button, input:checkbox, input:radio").attr("disabled", false);
      
        $(".disabledInputs").attr("disabled", true);
        $('input[type="text"]:not(:disabled)').css('background-color', 'white');

        document.getElementById("frm1702EX:btnValidate").disabled = false;

        checkMoreButtons();
        disableElem;
        enableElem;
    }
    function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                console.log(form.serializeArray());
                var data = form.serialize();
                save('1702EX',data);
                
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
        saveAndExit('1702EX',data);
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

        submitAndSave('1702EX', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1702EX';
    } 
</script>
@endsection