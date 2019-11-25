@extends('layouts.app')
@section('title', '| BIR Form No. 1701A')

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
        <button type="button" class="btn btn-danger btn-exit" id="1707A" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="1707A" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1707A' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 846px; ">
                <table  width="846px" align="center" border="0" cellpadding="0" cellspacing="0" style="background-repeat: repeat-x;">
                    <tr>
                        <td>
                            <div id="formPaper">
                                <div id="containerPage">
                                    <div id="Page1Content" style="margin: 0; display: block; position: relative; width: 100%; width: 846px;" class="noCellSpace">
                                        <table border="0" cellspacing="0" cellpadding="0" margin="0" style="height: 0px;">
                                            <tr>
                                                <td>
                                                    <span width="40" align="left"> (To be filled up by the BIR)</span>
                                                    <span style="font-weight: bold;"><br />DLN:</span>
                                                </td>
                                            </tr>
                                        </table>
                                        <div style="border: 3px solid black;" cellspacing="0" cellpadding="0" margin="0">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td>
                                                                    <table cellpadding="0" style="border: none;">
                                                                        <tr>
                                                                            <td style="width: 20%;">
                                                                                <img src="{{ asset('images/birflog.gif') }}" alt="birlogo" height="50px" />
                                                                            </td>
                                                                            <td align="left">
                                                                                <label>  Republika ng Pilipinas
                                                                                <br/>Kagawaran ng Pananalapi
                                                                                <br/>Kawanihan ng Rentas Internas </label>
                                                                            </td>
                                                                        </tr>

                                                                    </table>
                                                                </td>
                                                                <td width="0" align="center" valign="top">
                                                                    <label style="font-weight: bold; font-size: 28px; ">Annual Capital Gains <br />Tax Return</label>
                                                                </td>
                                                                <td width="145" valign="center">
                                                                    BIR Form No.
                                                                    <br />
                                                                    <label style="font-weight: bold; font-size: 25px;"><b>1707-A </b><br /></label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <label>
                                                                      For Onerous Transfer of Shares of Stock<br /> Not Traded Through the Local Stock Exchange
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td>
                                                                    June, 2001 (ENCS)
                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tdschedTitle">
                                                        <span align="left" style="font-size: 12px;">Fill in all applicable spaces. Mark all appropriate boxes with an "X".</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tblForm">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td>
                                                                                <b>1 </b>   
                                                                                <label>For the year ended</label>
                                                                                <input type="radio" id="frm1707A:rdoI1Calendar" name="frm1707A:rdoYearEnded" value="C" checked="checked" onclick="checkCalendarFiscal();"/><label> Calendar</label>
                                                                                <input type="radio" id="frm1707A:rdoI1Fiscal" name="frm1707A:rdoYearEnded" value="F" onclick="checkCalendarFiscal();"/><label> Fiscal</label>
                                                                             </td>
                                                                         </tr>
                                                                         <tr>
                                                                            <td>
                                                                                <label>(MM/DD/YYYY) </label>                                                                            
                                                                                <font color="black" face="Arial" size="2">
                                                                                <select id="frm1707A:txtI1YearEndMonth" name="frm1707A:txtI1YearEndMonth" size="1" style="width: 40px">
                                                                                        <option value="01">01 - January</option>
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
                                                                                        <option value="12" selected>12 - December</option>
                                                                                    </select>
                                                                                </font>
                                                                                <input id="frm1707A:txtI1YearEndDay" maxlength="2" name="frm1707A:txtI1YearEndDay" size="1" style="" type="text" value="31" onkeypress="return wholenumber(this, event)"/>
                                                                                <input id="frm1707A:txtI1YearEndYear" maxlength="4" name="frm1707A:txtI1YearEndYear" size="3" style="" type="text" value="" onkeypress="return wholenumber(this, event)" />
                                                                            </td>
                                                                        </tr>
                                                                     </table>
                                                                </td>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td>
                                                                                <b>2 </b>
                                                                                <label>Amended Return?</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="radio" id="frm1707A:rdoI2AmemdedYes" name="frm1707A:rdoAmended" onclick="checkAmendedForItem16A()"/> <label>Yes</label>
                                                                                <input type="radio" id="frm1707A:rdoI2AmemdedNo" name="frm1707A:rdoAmended" onclick="checkAmendedForItem16A()" checked="checked" /> <label>No</label>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td>
                                                                                <b>3 </b>
                                                                                <label>No. of sheets attached</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center">
                                                                                <input type="text" id="frm1707A:txtI3Sheets" name="frm1707A:txtI3Sheets" style="width: 30px;" maxlength="2" onkeypress="return wholenumber(this, event)" />
                                                                            </td>
                                                                        </tr>
                                                                    </table>                                                                    
                                                                </td>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td> 
                                                                                <b>4 </b>                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <label>ATC</label>
                                                                            </td>
                                                                            <td>
                                                                                <input type="radio" id="frm1707A:rdoI4ATCII030" name="frm1707A:ATC" onclick="atcClick()" />
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="frm1707A:txtI4TCII030" name="frm1707A:txtI4TCII030" value="II030" style="width: 50px;" disabled="disabled"/>
                                                                            </td>
                                                                            <td>
                                                                                <label>Individual</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                            </td>
                                                                            <td>
                                                                                <label>Code</label>
                                                                            </td>
                                                                            <td>
                                                                                <input type="radio" id="frm1707A:rdoI4ATCIC110" name="frm1707A:ATC" onclick="atcClick()" />
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="frm1707A:txtI4ATCIC110" name="frm1707A:txtI4ATCIC110" value="IC110" style="width: 50px;" disabled="disabled"/>
                                                                            </td>
                                                                            <td>
                                                                                <label>Corporation</label>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>                                                                                                                    
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tdschedTitle tblForm">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <span style="margin-right: 70px;"><b>Part I</b></span>
                                                                </td>
                                                                <td>
                                                                    <b>Background Information</b>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tblForm">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <b>5 </b>
                                                                    <label>TIN Seller </label>
                                                                    <input type="text" id="frm1707A:txtI5TIN1" value="{{$company->tin1}}" name="frm1707A:TIN1" maxlength="3" style="width: 40px;" disabled="disabled" />
                                                                    <input type="text" id="frm1707A:txtI5TIN2" value="{{$company->tin2}}"  name="frm1707A:TIN2" maxlength="3" style="width: 40px;" disabled="disabled" />
                                                                    <input type="text" id="frm1707A:txtI5TIN3" value="{{$company->tin3}}"  name="frm1707A:TIN3" maxlength="3" style="width: 40px;" disabled="disabled" />
                                                                    <input type="text" id="frm1707A:txtI5BranchMask"  value="{{$company->tin4}}"  style="width: 40px;" value="000" disabled="disabled"/>
                                                                    <input type="text" id="frm1707A:hdnI5TIN4" name="frm1707A:TIN4" value="{{$company->tin4}}" style="display: none;" />
                                                                </td>
                                                                <td>
                                                                    <b>6 </b>
                                                                    <label>RDO Code </label> <input type="text" id="frm1707A:hdnRDO" name="frm1707A:hdnRDO" value="{{$company->rdo_code}}" style="display: none;" />
                                                                    <div id="rdoContainer" style="display: inline;">
                                                                        <select id='frm1707A:rdoI6RDO' name='frm1707A:rdoI6RDO' size='1'>
                                                                            <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <b>7 </b>
                                                                    <label>Telephone No. </label> <input type="text" id="frm1707A:txtI7TelNo" name="frm1707A:txtI7TelNo" value="{{$company->tel_number}}" maxlength="25" onblur="checkIfValidValues(this)" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
                                                                </td>
                                                            </tr>
                                                        </table>                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td  class="tblForm">
                                                        <b>8 </b> 
                                                        <label>Seller's Name (Last Name, Middle Name for Individual)/(Registered Name for Non-Individuals)</label>
                                                        <br />
                                                        <input type="text" id="frm1707A:txtI8RegisteredName" name="frm1707A:txtI8RegisteredName" value="{{$company->registered_name != '' ? $company->registered_name : $company->lastname.','. $company->firstname.' '.$company->middlename }}"  style="width: 810px;" maxlength="90" onblur="return capitalize(this), checkIfValidValues(this), atcClick()" disabled="disabled"/>
                                                        <!-- No mainline of business-->
                                                        <input type="text" id="frm1707A:txtLineOfBusiness" value="{{$company->line_business}}" name="frm1707A:txtLineOfBusiness" style="display: none;" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td  class="tblForm">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <b>9 </b>
                                                                    <label>Registered Address</label>
                                                                </td>
                                                                <td>
                                                                    <b>10 </b>
                                                                    <label>Zip Code</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" id="frm1707A:txtI9RegisteredAddress" value="{{$company->address}}" name="frm1707A:txtI9RegisteredAddress" maxlength="60"  style="width: 600px;" onblur="return capitalize(this), checkIfValidValues(this)" disabled="disabled"/>
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="frm1707A:txtI10ZipCode" value="{{$company->zip_code}}" name="frm1707A:txtI10ZipCode" maxlength="4" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tblForm">
                                                        <table>
                                                            <tr>                                                                
                                                                <td width="64%">
                                                                    <b>11 </b>
                                                                    <label>Are you availing of tax relief under an international Tax Treaty or Special Law?</label>
                                                                    <input type="radio" id="frm1707A:rdoI11TaxTreatyYes" name="frm1707A:rdoI11TaxTreaty" onclick="checkTreaty()"/> <label>Yes</label>
                                                                    <input type="radio" id="frm1707A:rdoI11TaxTreatyNo" name="frm1707A:rdoI11TaxTreaty" onclick="checkTreaty()" checked="checked"//> <label>No</label>
                                                                </td>                                                            
                                                                <td>
                                                                    <b>11A </b>
                                                                    <label>If Yes, specify &nbsp;</label>
                                                                    <input type="text" id="frm1707A:txtI11ASpecify" name="frm1707A:txtI11ASpecify" maxlength="20" onkeypress="return Code(this);" onblur="return capitalize(this)" style="width:190px;"/>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tdschedTitle tblForm">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <span style="padding-right: 50px;"><b>Part II</b></span>
                                                                </td>
                                                                <td>
                                                                    <b>Computation of Tax</b>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tblForm">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <b>12 </b> <label>Total Capital Gains</label> <span class="xsmall">(Schedule 1, Item 20, col. E)</span>
                                                                </td>
                                                                <td class="tdAmount" style="width: 30%;">
                                                                    <b>12 </b> <input type="text" id="frm1707A:txtI12TotalCapitalGains" name="frm1707A:txtI12TotalCapitalGains" class="txtAmount" readonly="readonly" onclick="item12Click(this)"/>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <b>13 </b> <label>Less: Total Capital Loss</label> <span class="xsmall">(Schedule 2, Item 21, col. E)</span>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <b>13 </b> <input type="text" id="frm1707A:txtI13TotalCapitalLoss" name="frm1707A:txtI13TotalCapitalLoss" class="txtAmount" readonly="readonly" onclick="item13Click(this)"/>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <b>14 </b> <label>Net Capital Gain (Loss)</label>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <b>14 </b> <input type="text" id="frm1707A:txtI14NetCapitalGainLoss" name="frm1707A:txtI14NetCapitalGainLoss" class="txtAmount" readonly="readonly" onclick="item14and15Click(this)"/>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <b>15 </b> <label>Tax Due (5% on the first 100,000: 10% on any amount in excess of 100,000)</label>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <b>15 </b> <input type="text" id="frm1707A:txtI15TaxDue" name="frm1707A:txtI15TaxDue" class="txtAmount"  readonly="readonly" onclick="item14and15Click(this)"/>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td>
                                                                                <b>16 </b>
                                                                                <label>Less: Total Tax Paid (Schedule1, Item 20, col. F)</label>
                                                                                <label>Tax Paid in Return Previously Filed,</label>
                                                                                <label>If this is an Amended Return</label>
                                                                            </td>
                                                                            <td class="tdAmount" style="width: 40%;">
                                                                                <b>16A </b> <input type="text" id="frm1707A:txtI16ATotalTaxPaid" name="frm1707A:txtI16ATotalTaxPaid" class="txtAmount" disabled="disabled" /> <br />
                                                                                <b>16B </b> <input type="text" id="frm1707A:txtI16BTotalTaxPaid" name="frm1707A:txtI16BTotalTaxPaid" class="txtAmount" disabled="disabled" onblur="computePart2Item16CTaxPaid();"/>
                                                                            </td>

                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <b>16C </b> <input type="text" id="frm1707A:txtI16CTotalTaxPaid" name="frm1707A:txtI16CTotalTaxPaid" class="txtAmount" disabled="disabled" />
                                                                 </td>                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <b>17 </b>
                                                                    <label>Tax Still Payable/(Overpayment)</label>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <b>17 </b> <input type="text" id="frm1707A:txtI17TaxStillPayable" name="frm1707A:txtI17TaxStillPayable" class="txtAmount" disabled="disabled" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td>
                                                                                <b>18 </b>
                                                                                <label>Add Penalties</label>
                                                                            </td>
                                                                            <td align="center">
                                                                                <label>Surcharge</label>
                                                                            </td>
                                                                            <td align="center">
                                                                                <label>Interest</label>
                                                                            </td>
                                                                            <td align="center">
                                                                                <label>Compromise</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                            </td>
                                                                            <td class="tdAmount">
                                                                                <b>18A </b> <input type="text" id="frm1707A:txtI18ASurcharge" name="frm1707A:txtI18ASurcharge" class="txtAmount" style="width:100px;"/>
                                                                            </td>
                                                                            <td class="tdAmount">
                                                                                <b>18B </b> <input type="text" id="frm1707A:txtI18BInterest" name="frm1707A:txtI18BInterest" class="txtAmount" style="width:100px;"/>                                                                                
                                                                            </td>                                                                            
                                                                            <td class="tdAmount">
                                                                                <b>18C </b> <input type="text" id="frm1707A:txtI18CCompromise" name="frm1707A:txtI18CCompromise" class="txtAmount" style="width:100px;"/>                                                                                
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td class="tdAmount" valign="bottom">
                                                                    <b>18D </b> <input type="text" id="frm1707A:txtI18DPenalties" name="frm1707A:txtI18DPenalties" class="txtAmount"  disabled="disabled" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <b>19 </b>
                                                                    <label>Total Amount Payable/(Overpayment) (Sum of Items 17 &amp; 18D)</label>
                                                                </td>
                                                                <td class="tdAmount" >
                                                                    <b>19 </b>
                                                                    <input type="text" id="frm1707A:txtI19TotalAmountPayable" name="frm1707A:txtI19TotalAmountPayable" class="txtAmount"  disabled="disabled" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <table>
                                                                        <tr>
                                                                            <td>
                                                                                <span style="margin-left: 20px;"><label>In case of overpayment, mark one box only:</label></span>
                                                                            </td>
                                                                            <td>
                                                                                <input type="radio" id="frm1707A:rdoI19Refund" name="frm1707A:rdoI19Overpayment"/> <label>To be refunded</label>
                                                                            </td>
                                                                            <td>
                                                                                <input type="radio" id="frm1707A:rdoI19TaxCreditCertificate" name="frm1707A:rdoI19Overpayment"/> <label>To be Issued a Tax Credit Certificate</label>
                                                                            </td>
                                                                        </tr>
                                                                    </table>

                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tdschedTitle tblForm">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <span style="padding-right: 50px;"><b>Schedule 1</b></span>
                                                                </td>
                                                                <td>
                                                                    <b>List of Transactions Resulting to Gain (attach additional sheets, if necessary)</b>
                                                                </td>
                                                                <td>
                                                                    <input type="button" id="btnOpenSched1CSV" value="Read CSV File"/>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table class="tblForm"  style="text-align: center;" id="TblSchedule1">
                                                            <tr class="tblForm" >
                                                                <td class="tdBorderRight" style="width: 14%;">
                                                                    <span align="left"  style="text-align: left;" class="xsmall" >
                                                                        <label>Date of Transaction                                                                    
                                                                        <br />
                                                                        (MM/DD/YYYY)</label>                                                            
                                                                    </span>
                                                                    <br />
                                                                    <span style="text-align: center;"><b>(a)</b></span>
                                                                </td>
                                                                <td class="tdBorderRight"  style="width: 20%;">
                                                                    <label><b>Name of Corporate Stock
                                                                        <br />
                                                                        <br />
                                                                        (b)
                                                                    </b></label>
                                                                </td>
                                                                <td class="tdBorderRight"  style="width: 18%;">
                                                                    <label><b>Selling Price/
                                                                        <br />
                                                                        Fair Market Value
                                                                        <br />
                                                                        (c)
                                                                    </b></label>
                                                                </td>
                                                                <td class="tdBorderRight"  style="width: 18%; ">
                                                                    <label><b>Cost
                                                                        <br />
                                                                        <br />
                                                                        (d)
                                                                    </b></label>
                                                                </td>
                                                                <td class="tdBorderRight"  style="width: 15%;">
                                                                    <label><b>Capital Gains
                                                                        <br />
                                                                        <br />
                                                                        (e)
                                                                    </b></label>
                                                                </td>
                                                                <td style="width: 15%;">
                                                                    <label><b>Tax Paid
                                                                        <br />
                                                                        <br />
                                                                        (f)
                                                                    </b></label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS1C1DateOfTransactionI1" name="frm1707A:txtS1C1DateOfTransactionI1" class="txtDate" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this)" onblur="return validateDateSchedElem(this)" maxlength="10"/>
                                                                </td>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS1C2NameOfCorporateStockI1" name="frm1707A:txtS1C2NameOfCorporateStockI1" class="txtCorporate"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C3SellingPriceI1" name="frm1707A:txtS1C3SellingPriceI1" class="schedAmount" onblur="sellingPrice(this,1);"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C4CostI1" name="frm1707A:txtS1C4CostI1" class="schedAmount" onblur="sched1Cost(this,1)" />
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C5CapitalGainsI1" name="frm1707A:txtS1C5CapitalGainsI1" class="schedAmount" disabled/>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C6TaxPaidI1" name="frm1707A:txtS1C6TaxPaidI1" class="schedAmount" onblur="sched1TaxPaid(this,1)"/>
                                                                </td>                                                                
                                                            </tr>
                                                            <tr>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS1C1DateOfTransactionI2" name="frm1707A:txtS1C1DateOfTransactionI2" class="txtDate" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this)" onblur="return validateDateSchedElem(this)" maxlength="10"/>
                                                                </td>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS1C2NameOfCorporateStockI2" name="frm1707A:txtS1C2NameOfCorporateStockI2" class="txtCorporate"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C3SellingPriceI2" name="frm1707A:txtS1C3SellingPriceI2" class="schedAmount" onblur="sellingPrice(this,2);"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C4CostI2" name="frm1707A:txtS1C4CostI2" class="schedAmount" onblur="sched1Cost(this,2)"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C5CapitalGainsI2" name="frm1707A:txtS1C5CapitalGainsI2" class="schedAmount" disabled/>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C6TaxPaidI2" name="frm1707A:txtS1C6TaxPaidI2" class="schedAmount" onblur="sched1TaxPaid(this,2)"/>
                                                                </td>                                                                
                                                            </tr>
                                                            <tr>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS1C1DateOfTransactionI3" name="frm1707A:txtS1C1DateOfTransactionI3" class="txtDate" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this)" onblur="return validateDateSchedElem(this)" maxlength="10"/>
                                                                </td>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS1C2NameOfCorporateStockI3" name="frm1707A:txtS1C2NameOfCorporateStockI3" class="txtCorporate"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C3SellingPriceI3" name="frm1707A:txtS1C3SellingPriceI3" class="schedAmount" onblur="sellingPrice(this,3);"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C4CostI3" name="frm1707A:txtS1C4CostI3" class="schedAmount" onblur="sched1Cost(this,3)"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C5CapitalGainsI3" name="frm1707A:txtS1C5CapitalGainsI3" class="schedAmount" disabled/>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C6TaxPaidI3" name="frm1707A:txtS1C6TaxPaidI3" class="schedAmount" onblur="sched1TaxPaid(this,3)"/>
                                                                </td>                                                                
                                                            </tr>
                                                            <tr>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS1C1DateOfTransactionI4" name="frm1707A:txtS1C1DateOfTransactionI4" class="txtDate" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this)" onblur="return validateDateSchedElem(this)" maxlength="10"/>
                                                                </td>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS1C2NameOfCorporateStockI4" name="frm1707A:txtS1C2NameOfCorporateStockI4" class="txtCorporate"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C3SellingPriceI4" name="frm1707A:txtS1C3SellingPriceI4" class="schedAmount" onblur="computeSched1SellingPrice();sellingPrice(this,4);"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C4CostI4" name="frm1707A:txtS1C4CostI4" class="schedAmount" onblur="sched1Cost(this,4)"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C5CapitalGainsI4" name="frm1707A:txtS1C5CapitalGainsI4" class="schedAmount" disabled/>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C6TaxPaidI4" name="frm1707A:txtS1C6TaxPaidI4" class="schedAmount" onblur="sched1TaxPaid(this,4)"/>
                                                                </td>                                                                
                                                            </tr>
                                                            <tr>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS1C1DateOfTransactionI5" name="frm1707A:txtS1C1DateOfTransactionI5" class="txtDate" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this)" onblur="return validateDateSchedElem(this)" maxlength="10"/>
                                                                </td>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS1C2NameOfCorporateStockI5" name="frm1707A:txtS1C2NameOfCorporateStockI5" class="txtCorporate"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C3SellingPriceI5" name="frm1707A:txtS1C3SellingPriceI5" class="schedAmount" onblur="sellingPrice(this,5);" />
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C4CostI5" name="frm1707A:txtS1C4CostI5" class="schedAmount" onblur="sched1Cost(this,5)"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C5CapitalGainsI5" name="frm1707A:txtS1C5CapitalGainsI5" class="schedAmount" disabled/>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C6TaxPaidI5" name="frm1707A:txtS1C6TaxPaidI5" class="schedAmount" onblur="sched1TaxPaid(this,5)"/>
                                                                </td>                                                                
                                                            </tr>
                                                            <tr>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS1C1DateOfTransactionI6" name="frm1707A:txtS1C1DateOfTransactionI6" class="txtDate" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this)" onblur="return validateDateSchedElem(this)" maxlength="10"/>
                                                                </td>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS1C2NameOfCorporateStockI6" name="frm1707A:txtS1C2NameOfCorporateStockI6" class="txtCorporate"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C3SellingPriceI6" name="frm1707A:txtS1C3SellingPriceI6" class="schedAmount" onblur="sellingPrice(this,6);"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C4CostI6" name="frm1707A:txtS1C4CostI6" class="schedAmount" onblur="sched1Cost(this,6)"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C5CapitalGainsI6" name="frm1707A:txtS1C5CapitalGainsI6" class="schedAmount" disabled/>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C6TaxPaidI6" name="frm1707A:txtS1C6TaxPaidI6" class="schedAmount" onblur="sched1TaxPaid(this,6)"/>
                                                                </td>                                                                
                                                            </tr>
                                                            <tr>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS1C1DateOfTransactionI7" name="frm1707A:txtS1C1DateOfTransactionI7" class="txtDate" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this)" onblur="return validateDateSchedElem(this)" maxlength="10"/>
                                                                </td>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS1C2NameOfCorporateStockI7" name="frm1707A:txtS1C2NameOfCorporateStockI7" class="txtCorporate"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C3SellingPriceI7" name="frm1707A:txtS1C3SellingPriceI7" class="schedAmount" onblur="sellingPrice(this,7);"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C4CostI7" name="frm1707A:txtS1C4CostI7" class="schedAmount" onblur="sched1Cost(this,7)"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C5CapitalGainsI7" name="frm1707A:txtS1C5CapitalGainsI7" class="schedAmount" disabled/>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1C6TaxPaidI7" name="frm1707A:txtS1C6TaxPaidI7" class="schedAmount" onblur="sched1TaxPaid(this,7)"/>
                                                                </td>                                                                
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                    <input type="button" id="btnSched1More" value="(more...)" onclick="sched1More();" disabled="disabled"/>
                                                                </td>
                                                                <td align="left">
                                                                    <b>20 Total</b>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1I20TotalSellingPrice" name="frm1707A:txtS1I20TotalSellingPrice" class="schedAmount"  disabled="disabled" />
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1I20TotalCost" name="frm1707A:txtS1I20TotalCost" class="schedAmount" disabled="disabled" />
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1I20TotalCapitalGains" name="frm1707A:txtS1I20TotalCapitalGains" class="schedAmount" disabled="disabled" />
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <input type="text" id="frm1707A:txtS1I20TotalTaxPaid" name="frm1707A:txtS1I20TotalTaxPaid" class="schedAmount" disabled="disabled" />
                                                                </td>  
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tdschedTitle tblForm">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <span style="padding-right: 50px;"><b>Schedule 2</b></span>
                                                                </td>
                                                                <td>
                                                                    <b>List of Transactions Resulting to Loss (attach additional sheets, if necessary)</b>
                                                                </td>
                                                                <td>
                                                                    <input type="button" id="btnOpenSched2CSV" value="Read CSV File" />
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table class="tblForm"  style="text-align: center;" id="TblSchedule2">
                                                            <tr class="tblForm" >
                                                                <td class="tdBorderRight" style="width: 14%;">
                                                                    <span style="text-align: left;" class="xsmall" >Date of Transaction
                                                                    <br />
                                                                    (MM/DD/YYYY)                                                            
                                                                    <br />
                                                                    </span>
                                                                    <span style="text-align: center;"><b>(a)</b></span>
                                                                </td>
                                                                <td class="tdBorderRight"  style="width: 20%;">
                                                                    <label><b>Name of Corporate Stock
                                                                        <br />
                                                                        <br />
                                                                        (b)
                                                                    </b></label>
                                                                </td>
                                                                <td class="tdBorderRight"  style="width: 23%;">
                                                                    <label><b>Selling Price/
                                                                        <br />
                                                                        Fair Market Value
                                                                        <br />
                                                                        (c)
                                                                    </b></label>
                                                                </td>
                                                                <td class="tdBorderRight"  style="width: 23%; ">
                                                                    <label><b>Cost
                                                                        <br />
                                                                        <br />
                                                                        (d)
                                                                    </b></label>
                                                                </td>                                                                
                                                                <td style="width: 20%;">
                                                                    <label><b>Capital Loss
                                                                        <br />
                                                                        <br />
                                                                        (e)
                                                                    </b></label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS2C1DateOfTransactionI1" name="frm1707A:txtS2C1DateOfTransactionI1" class="txtDate" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this)" onblur="return validateDateSchedElem(this)" maxlength="10"/>
                                                                </td>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS2C2NameOfCorporateStockI1" name="frm1707A:txtS2C2NameOfCorporateStockI1" class="txtCorporate"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS2C3SellingPriceI1" name="frm1707A:txtS2C3SellingPriceI1" class="schedAmount" onblur="Sched2SellingPrice(this,1);"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS2C4CostI1" name="frm1707A:txtS2C4CostI1" class="schedAmount" onblur="Sched2Cost(this,1);"/>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <input type="text" id="frm1707A:txtS2C5CapitalLossI1" name="frm1707A:txtS2C5CapitalLossI1" class="schedAmount" disabled/>
                                                                </td>                                                                
                                                            </tr>
                                                            <tr>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS2C1DateOfTransactionI2" name="frm1707A:txtS2C1DateOfTransactionI2" class="txtDate" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this)" onblur="return validateDateSchedElem(this)" maxlength="10"/>
                                                                </td>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS2C2NameOfCorporateStockI2" name="frm1707A:txtS2C2NameOfCorporateStockI2" class="txtCorporate"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS2C3SellingPriceI2" name="frm1707A:txtS2C3SellingPriceI2" class="schedAmount" onblur="Sched2SellingPrice(this,2);"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS2C4CostI2" name="frm1707A:txtS2C4CostI2" class="schedAmount" onblur="Sched2Cost(this,2);"/>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <input type="text" id="frm1707A:txtS2C5CapitalLossI2" name="frm1707A:txtS2C5CapitalLossI2" class="schedAmount" disabled/>
                                                                </td>                                                                
                                                            </tr>
                                                            <tr>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS2C1DateOfTransactionI3" name="frm1707A:txtS2C1DateOfTransactionI3" class="txtDate" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this)" onblur="return validateDateSchedElem(this)" maxlength="10"/>
                                                                </td>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS2C2NameOfCorporateStockI3" name="frm1707A:txtS2C2NameOfCorporateStockI3" class="txtCorporate"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS2C3SellingPriceI3" name="frm1707A:txtS2C3SellingPriceI3" class="schedAmount" onblur="Sched2SellingPrice(this,3);"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS2C4CostI3" name="frm1707A:txtS2C4CostI3" class="schedAmount" onblur="Sched2Cost(this,3);"/>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <input type="text" id="frm1707A:txtS2C5CapitalLossI3" name="frm1707A:txtS2C5CapitalLossI3" class="schedAmount" disabled/>
                                                                </td>                                                                
                                                            </tr>
                                                            <tr>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS2C1DateOfTransactionI4" name="frm1707A:txtS2C1DateOfTransactionI4" class="txtDate" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this)" onblur="return validateDateSchedElem(this)" maxlength="10"/>
                                                                </td>
                                                                <td class="tdBorderRight">
                                                                    <input type="text" id="frm1707A:txtS2C2NameOfCorporateStockI4" name="frm1707A:txtS2C2NameOfCorporateStockI4" class="txtCorporate"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS2C3SellingPriceI4" name="frm1707A:txtS2C3SellingPriceI4" class="schedAmount" onblur="Sched2SellingPrice(this,4);"/>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS2C4CostI4" name="frm1707A:txtS2C4CostI4" class="schedAmount" onblur="Sched2Cost(this,4);"/>
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <input type="text" id="frm1707A:txtS2C5CapitalLossI4" name="frm1707A:txtS2C5CapitalLossI4" class="schedAmount" disabled/>
                                                                </td>                                                                
                                                            </tr>                                                            
                                                            <tr>
                                                                <td align="left">
                                                                    <input type="button" id="btnSched2More" value="(more...)" onclick="sched2More();" disabled="disabled"/>
                                                                </td>
                                                                <td align="left">
                                                                    <b>21 Total</b>
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS2I21TotalSellingPrice" name="frm1707A:txtS2I21TotalSellingPrice" class="schedAmount" disabled="disabled" />
                                                                </td>
                                                                <td class="tdBorderRight tdAmount">
                                                                    <input type="text" id="frm1707A:txtS2I21TotalCost" name="frm1707A:txtS2I21TotalCost" class="schedAmount" disabled="disabled" />
                                                                </td>
                                                                <td class="tdAmount">
                                                                    <input type="text" id="frm1707A:txtS2I21TotalCapitalLoss" name="frm1707A:txtS2I21TotalCapitalLoss" class="schedAmount" disabled="disabled" />
                                                                </td>  
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="Print1Content" style="display: none; width: 850px; height: 1300px; font-family: Arial;">
                                        <img src="{{ asset('images/Print/BIR Form 1707A_1.png') }}" style="position: absolute; background-color: white; width: 850px; height: 1300px;" />
                                        <div style="float: left; position: relative;" class="divPrint">
                                            <div style="float: left; position: absolute; left: 173px; top: 162px; height: 20px; width: 16px;">
                                                <span class='mediumBold' id="Print_rdoI1Calendar">X</span>
                                            </div> 
                                            <div style="float: left; position: absolute; left: 250px; top: 162px; height: 20px; width: 16px;">
                                                <span class='mediumBold' id="Print_rdoI1Fiscal">X</span>
                                            </div> 
                                            <div style="float: left; position: absolute; left: 150px; top: 182px; height: 20px; width: 22px;">
                                                <span class='mediumBold' id="Print_txtI1YearEndMonth">XX</span>
                                            </div> 
                                            <div style="float: left; position: absolute; left: 186px; top: 182px; height: 20px; width: 22px;">
                                                <span class='mediumBold' id="Print_txtI1YearEndDay">XX</span>
                                            </div> 
                                            <div style="float: left; position: absolute; left: 225px; top: 182px; height: 20px; width: 44px;">
                                                <span class='mediumBold' id="Print_txtI1YearEndYear">XXXX</span>
                                            </div> 
                                            <div style="float: left; position: absolute; left: 322px; top: 182px; height: 20px; width: 16px;">
                                                <span class='mediumBold' id="Print_rdoI2AmemdedYes">X</span>
                                            </div> 
                                            <div style="float: left; position: absolute; left: 377px; top: 182px; height: 20px; width: 16px;">
                                                <span class='mediumBold' id="Print_rdoI2AmemdedNo">X</span>
                                            </div> 
                                            <div style="float: left; position: absolute; left: 485px; top: 182px; height: 20px; width: 32px;">
                                                <span class='mediumBold' id="Print_txtI3Sheets">XX</span>
                                            </div> 
                                            <div style="float: left; position: absolute; left: 635px; top: 165px; height: 20px; width: 16px;">
                                                <span class='mediumBold' id="Print_rdoI4ATCII030">X</span>
                                            </div> 
                                            <div style="float: left; position: absolute; left: 635px; top: 185px; height: 20px; width: 16px;">
                                                <span class='mediumBold' id="Print_rdoI4ATCIC110">X</span>
                                            </div> 
                                            <!--tin-->
                                            <div style="float: left; position: absolute; left: 110px; top: 228px; height: 20px; width: 32px;">
                                                <span class='mediumBold' id="Print_txtI5TIN1">XXX</span>
                                            </div> 
                                            <div style="float: left; position: absolute; left: 165px; top: 228px; height: 20px; width: 32px;">
                                                <span class='mediumBold' id="Print_txtI5TIN2">XXX</span>
                                            </div> 
                                            <div style="float: left; position: absolute; left: 220px; top: 228px; height: 20px; width: 32px;">
                                                <span class='mediumBold' id="Print_txtI5TIN3">XXX</span>
                                            </div> 
                                            <div style="float: left; position: absolute; left: 268px; top: 228px; height: 20px; width: 32px;">
                                                <span class='mediumBold' id="Print_BranchMask" style="letter-spacing: 3pt;">000</span>
                                            </div> 
                                            <div style="float: left; position: absolute; left: 480px; top: 228px; height: 20px; width: 40px;">
                                                <span class='mediumBold' id="Print_hdnRDO">XXX</span>
                                            </div> 
                                            <div style="float: left; position: absolute; left: 670px; top: 228px; height: 20px; width: 120px;">
                                                <span class='mediumBold' id="Print_txtI7TelNo">XXXXXXXXXXXX</span>
                                            </div> 
                                            <!-- 8+ -->
                                            <div style="float: left; position: absolute; left: 55px; top: 265px; height: 20px; width: 750px;">
                                                <span class='mediumBold' id="Print_txtI8RegisteredName">XXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 55px; top: 303px; height: 20px; width: 650px; overflow:hidden;">
                                                <span class='mediumBold' id="Print_txtI9RegisteredAddress">XXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 745px; top: 303px; height: 20px; width: 50px;">
                                                <span class='mediumBold' id="Print_txtI10ZipCode">XXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 225px; top: 338px; height: 20px; width: 16px;">
                                                <span class='mediumBold' id="Print_rdoI11TaxTreatyYes">X</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 282px; top: 338px; height: 20px; width: 16px;">
                                                <span class='mediumBold' id="Print_rdoI11TaxTreatyNo">X</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 585px; top: 336px; height: 20px; width: 220px; overflow:hidden;">
                                                <span class='mediumBold' id="Print_txtI11ASpecify">X</span>
                                            </div>

                                            <!--Part II-->
                                            <div style="float: left; position: absolute; left: 600px; top: 380px; height: 20px; width: 205px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtI12TotalCapitalGains">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 600px; top: 401px; height: 20px; width: 205px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtI13TotalCapitalLoss">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 600px; top: 422px; height: 20px; width: 205px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtI14NetCapitalGainLoss">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 600px; top: 444px; height: 20px; width: 205px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtI15TaxDue">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 360px; top: 465px; height: 20px; width: 205px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtI16ATotalTaxPaid">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 360px; top: 487px; height: 20px; width: 205px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtI16BTotalTaxPaid">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 600px; top: 487px; height: 20px; width: 205px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtI16CTotalTaxPaid">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 600px; top: 510px; height: 20px; width: 205px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtI17TaxStillPayable">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 127px; top: 543px; height: 20px; width: 130px; text-align: right; ">
                                                <span class='mediumBold' id="Print_txtI18ASurcharge" style="font-size: 8.5pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 282px; top: 543px; height: 20px; width: 130px; text-align: right; ">
                                                <span class='mediumBold' id="Print_txtI18BInterest" style="font-size: 8.5pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 440px; top: 543px; height: 20px; width: 130px; text-align: right; ">
                                                <span class='mediumBold' id="Print_txtI18CCompromise" style="font-size: 8.5pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 600px; top: 542px; height: 20px; width: 205px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtI18DPenalties">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 600px; top: 562px; height: 20px; width: 205px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtI19TotalAmountPayable">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 317px; top: 577px; height: 20px; width: 16px; text-align: right;">
                                                <span class='mediumBold' id="Print_rdoI19Refund">X</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 478px; top: 577px; height: 20px; width: 16px; text-align: right;">
                                                <span class='mediumBold' id="Print_rdoI19TaxCreditCertificate">X</span>
                                            </div>
                                            <!--Schedule 1-->
                                            <div style="float: left; position: absolute; left: 42px; top: 650px; height: 20px; width: 75px;">
                                                <span class='mediumBold' id="Print_txtS1C1DateOfTransactionI1" style="font-size: 9pt;">XX/XX/XXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 122px; top: 650px; height: 20px; width: 155px; overflow:hidden;">
                                                <span class='mediumBold' id="Print_txtS1C2NameOfCorporateStockI1" style="font-size: 9pt;">XXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 285px; top: 650px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C3SellingPriceI1" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 436px; top: 650px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C4CostI1" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 557px; top: 650px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C5CapitalGainsI1" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 670px; top: 650px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C6TaxPaidI1" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>

                                            <div style="float: left; position: absolute; left: 42px; top: 671px; height: 20px; width: 75px;">
                                                <span class='mediumBold' id="Print_txtS1C1DateOfTransactionI2" style="font-size: 9pt;">XX/XX/XXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 122px; top: 671px; height: 20px; width: 155px; overflow:hidden;">
                                                <span class='mediumBold' id="Print_txtS1C2NameOfCorporateStockI2" style="font-size: 9pt;">XXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 285px; top: 671px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C3SellingPriceI2" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 436px; top: 671px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C4CostI2" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 557px; top: 671px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C5CapitalGainsI2" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 670px; top: 671px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C6TaxPaidI2" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>

                                            <div style="float: left; position: absolute; left: 42px; top: 692px; height: 20px; width: 75px;">
                                                <span class='mediumBold' id="Print_txtS1C1DateOfTransactionI3" style="font-size: 9pt;">XX/XX/XXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 122px; top: 692px; height: 20px; width: 155px; overflow:hidden;">
                                                <span class='mediumBold' id="Print_txtS1C2NameOfCorporateStockI3" style="font-size: 9pt;">XXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 285px; top: 692px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C3SellingPriceI3" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 436px; top: 692px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C4CostI3" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 557px; top: 692px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C5CapitalGainsI3" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 670px; top: 692px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C6TaxPaidI3" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>

                                            <div style="float: left; position: absolute; left: 42px; top: 713px; height: 20px; width: 75px;">
                                                <span class='mediumBold' id="Print_txtS1C1DateOfTransactionI4" style="font-size: 9pt;">XX/XX/XXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 122px; top: 713px; height: 20px; width: 155px; overflow:hidden;">
                                                <span class='mediumBold' id="Print_txtS1C2NameOfCorporateStockI4" style="font-size: 9pt;">XXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 285px; top: 713px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C3SellingPriceI4" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 436px; top: 713px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C4CostI4" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 557px; top: 713px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C5CapitalGainsI4" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 670px; top: 713px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C6TaxPaidI4" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>

                                            <div style="float: left; position: absolute; left: 42px; top: 734px; height: 20px; width: 75px;">
                                                <span class='mediumBold' id="Print_txtS1C1DateOfTransactionI5" style="font-size: 9pt;">XX/XX/XXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 122px; top: 734px; height: 20px; width: 155px; overflow:hidden;">
                                                <span class='mediumBold' id="Print_txtS1C2NameOfCorporateStockI5" style="font-size: 9pt;">XXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 285px; top: 734px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C3SellingPriceI5" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 436px; top: 734px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C4CostI5" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 557px; top: 734px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C5CapitalGainsI5" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 670px; top: 734px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C6TaxPaidI5" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>

                                            <div style="float: left; position: absolute; left: 42px; top: 755px; height: 20px; width: 75px;">
                                                <span class='mediumBold' id="Print_txtS1C1DateOfTransactionI6" style="font-size: 9pt;">XX/XX/XXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 122px; top: 755px; height: 20px; width: 155px; overflow:hidden;">
                                                <span class='mediumBold' id="Print_txtS1C2NameOfCorporateStockI6" style="font-size: 9pt;">XXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 285px; top: 755px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C3SellingPriceI6" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 436px; top: 755px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C4CostI6" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 557px; top: 755px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C5CapitalGainsI6" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 670px; top: 755px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C6TaxPaidI6" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>

                                            <div style="float: left; position: absolute; left: 42px; top: 776px; height: 20px; width: 75px;">
                                                <span class='mediumBold' id="Print_txtS1C1DateOfTransactionI7" style="font-size: 9pt;">XX/XX/XXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 122px; top: 776px; height: 20px; width: 155px; overflow:hidden;">
                                                <span class='mediumBold' id="Print_txtS1C2NameOfCorporateStockI7" style="font-size: 9pt;">XXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 285px; top: 776px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C3SellingPriceI7" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 436px; top: 776px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C4CostI7" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 557px; top: 776px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C5CapitalGainsI7" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 670px; top: 776px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1C6TaxPaidI7" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>

                                            <div style="float: left; position: absolute; left: 285px; top: 797px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1I20TotalSellingPrice" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 436px; top: 797px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1I20TotalCost" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 557px; top: 797px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1I20TotalCapitalGains" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 670px; top: 797px; height: 20px; width: 145px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS1I20TotalTaxPaid" style="font-size: 8pt;">XXX,XXX,XXX,XXX.XX</span>
                                            </div>

                                            <!--Schedule 2-->
                                            <div style="float: left; position: absolute; left: 42px; top: 868px; height: 20px; width: 75px;">
                                                <span class='mediumBold' id="Print_txtS2C1DateOfTransactionI1" style="font-size: 9pt;">XX/XX/XXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 122px; top: 868px; height: 20px; width: 155px; overflow:hidden;">
                                                <span class='mediumBold' id="Print_txtS2C2NameOfCorporateStockI1" style="font-size: 9pt;">XXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 866px; height: 20px; width: 165px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS2C3SellingPriceI1" style="font-size: 10pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 505px; top: 866px; height: 20px; width: 165px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS2C4CostI1" style="font-size: 10pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 650px; top: 866px; height: 20px; width: 165px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS2C5CapitalLossI1" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>

                                            <div style="float: left; position: absolute; left: 42px; top: 889px; height: 20px; width: 75px;">
                                                <span class='mediumBold' id="Print_txtS2C1DateOfTransactionI2" style="font-size: 9pt;">XX/XX/XXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 122px; top: 889px; height: 20px; width: 155px; overflow:hidden;">
                                                <span class='mediumBold' id="Print_txtS2C2NameOfCorporateStockI2" style="font-size: 9pt;">XXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 887px; height: 20px; width: 165px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS2C3SellingPriceI2" style="font-size: 10pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 505px; top: 887px; height: 20px; width: 165px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS2C4CostI2" style="font-size: 10pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 650px; top: 887px; height: 20px; width: 165px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS2C5CapitalLossI2" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>

                                            <div style="float: left; position: absolute; left: 42px; top: 910px; height: 20px; width: 75px;">
                                                <span class='mediumBold' id="Print_txtS2C1DateOfTransactionI3" style="font-size: 9pt;">XX/XX/XXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 122px; top: 910px; height: 20px; width: 155px; overflow:hidden;">
                                                <span class='mediumBold' id="Print_txtS2C2NameOfCorporateStockI3" style="font-size: 9pt;">XXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 908px; height: 20px; width: 165px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS2C3SellingPriceI3" style="font-size: 10pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 505px; top: 908px; height: 20px; width: 165px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS2C4CostI3" style="font-size: 10pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 650px; top: 908px; height: 20px; width: 165px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS2C5CapitalLossI3" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>

                                            <div style="float: left; position: absolute; left: 42px; top: 931px; height: 20px; width: 75px;">
                                                <span class='mediumBold' id="Print_txtS2C1DateOfTransactionI4" style="font-size: 9pt;">XX/XX/XXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 122px; top: 931px; height: 20px; width: 155px; overflow:hidden;">
                                                <span class='mediumBold' id="Print_txtS2C2NameOfCorporateStockI4" style="font-size: 9pt;">XXXXXXXXXXXXXXX</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 312px; top: 929px; height: 20px; width: 165px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS2C3SellingPriceI4" style="font-size: 10pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 505px; top: 929px; height: 20px; width: 165px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS2C4CostI4" style="font-size: 10pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 650px; top: 929px; height: 20px; width: 165px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS2C5CapitalLossI4" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>

                                            <div style="float: left; position: absolute; left: 312px; top: 950px; height: 20px; width: 165px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS2I21TotalSellingPrice" style="font-size: 10pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 505px; top: 950px; height: 20px; width: 165px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS2I21TotalCost" style="font-size: 10pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                            <div style="float: left; position: absolute; left: 650px; top: 950px; height: 20px; width: 165px; text-align: right;">
                                                <span class='mediumBold' id="Print_txtS2I21TotalCapitalLoss" style="font-size: 9pt;">(XXX,XXX,XXX,XXX.XX)</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div id="PageFooter">
                                    <table width="850px" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="850px" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>                                                    
                                                        <tr valign="middle">
                                                            <td width="40">
                                                            </td>
                                                            <td width="616">
                                                                <div>
                                                                    <div align="center">
                                                                        @if($action != 'view')
                                                                        <input class="printButtonClass" type="button" value="Validate" style="width: 100px;"
                                                                            name="frm1707A:btnValidate" id="frm1707A:btnValidate" onclick="validate()" />
                                                                        <input class="printButtonClass" type="button" value="Edit" style="width: 100px;"
                                                                            name="frm1707A:btnEdit" id="frm1707A:btnEdit" onclick="enableAllControl()" />
                                                                        <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;"
                                                                            name="btnUpload" id="btnUpload" />
                                                                        <input class="printButtonClass" type="button" value="Save" style="width: 100px;"
                                                                            name="btnSave" id="btnSave" onclick="saveData();" />
                                                                        <input class="printButtonClass" type="button" value="Print" style="width: 100px;"
                                                                            name="btnPrint" id="btnPrint" disabled onclick="printme();" />
                                                                        <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;"
                                                                            name="frm1707A:btnFinalCopy" id="frm1707A:btnFinalCopy" onclick="submitForm();" />
                                                                        <div id="msg" class="printButtonClass" style="display: none;">
                                                                        </div>
                                                                        @else
                                                                          <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                          <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                        @endif
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
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!--Modal counter-->
        <div id="modalRowCounter" style="display:none;">    
            <input type="text" id="ModalSched1Length"  value="0" />
            <input type="text" id="ModalSched2Length" value="0" />            
        </div>
           
        <div id="divModalSched1" class="modalShow" style="display: none; text-align:center;">
            <div class="modalInner">
                <br />
                <div class="SubPageDiv">                                
                    <table id="tblModalSched1Header" class="RowSubTable tblForm" style="width:900px; text-align:center; font-size: 12px;">
                        <tr>
                            <td class="tdschedTitle tblForm" colspan="7">
                                <table>
                                    <tr>
                                        <td>
                                            <span style="padding-right: 100px;"><b>Schedule 1</b></span>
                                        </td>
                                        <td>
                                            <b>List of Transactions Resulting to Gain</b>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr class="tblForm" >
                            <td class="tdBorderRight" style="width: 15%;">
                                <span align="left"  style="text-align: left;" class="xsmall" >
                                    Date of Transaction                                                                    
                                    <br />
                                    (MM/DD/YYYY)                                                            
                                </span>
                                <br />
                                <span style="text-align: center;"><b>(a)</b></span>
                            </td>
                            <td class="tdBorderRight"  style="width: 16%;">
                                <b>Name of Corporate Stock
                                    <br />
                                    <br />
                                    (b)
                                </b>
                            </td>
                            <td class="tdBorderRight"  style="width: 16%;">
                                <b>Selling Price/
                                    <br />
                                    Fair Market Value
                                    <br />
                                    (c)
                                </b>
                            </td>
                            <td class="tdBorderRight"  style="width: 14%;">
                                <b>Cost
                                    <br />
                                    <br />
                                    (d)
                                </b>
                            </td>
                            <td class="tdBorderRight"  style="width: 14%;">
                                <b>Capital Gains
                                    <br />
                                    <br />
                                    (e)
                                </b>
                            </td>
                            <td class="tdBorderRight" style="width: 14%;">
                                <b>Tax Paid
                                    <br />
                                    <br />
                                    (f)
                                </b>
                            </td>
                            <td>
                                
                            </td>
                        </tr>                        
                    </table>
                    <table id="tblModalSched1Iteration" class="tblForm" style="width:900px; text-align:center; font-size: 12px;">
                    <!-- content here-->
                    </table>
                    <table id="tblModalSched1IterationSaver" style="display: none;" >
                    <!-- content here-->
                    </table> 
                    <table id="tblModalSched1TotalTable" class="RowSubTable tblForm tblCalcHeader" style="width:900px; text-align:center; font-size: 12px;">
                        <tr>
                            <td colspan="7" align="right">
                                <br />
                                                           
                                <input type="button" value=" Add More " onclick="btnSched1Add();" />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <br /> 
                            </td>
                        </tr>
                        <tr class="modalSubtotal">
                            <td  style="width: 15%;">
                                
                            </td>
                            <td align="left" style="width: 16%;">
                                <b>Subotal</b>
                            </td>
                            <td class="tdBorderRight tdAmount" style="width: 16%;">
                                <input type="text" id="frm1707A:txtS1ModalTotalSellingPrice" name="frm1707A:txtS1ModalTotalSellingPrice" class="schedAmount"  disabled="disabled"    />
                            </td>
                            <td class="tdBorderRight tdAmount" style="width: 14%;">
                                <input type="text" id="frm1707A:txtS1ModalTotalCost" name="frm1707A:txtS1ModalTotalCost" class="schedAmount" disabled="disabled" />
                            </td>
                            <td class="tdBorderRight tdAmount" style="width: 14%;">
                                <input type="text" id="frm1707A:txtS1ModalTotalCapitalGains" name="frm1707A:txtS1ModalTotalCapitalGains" class="schedAmount" disabled=" disabled"    />
                            </td>
                            <td class="tdAmount" style="width: 14%;">
                                <input type="text" id="frm1707A:txtS1ModalTotalTaxPaid" name="frm1707A:txtS1ModalTotalTaxPaid" class="schedAmount" disabled="disabled" />
                            </td>  
                            <td >                                
                            </td>
                        </tr>    
                    </table>               
                </div>
                <div>
                    <br />                
                    <center>
                        &nbsp;&nbsp;&nbsp;
                        <input type="button" value=" Save " onclick="btnSched1Save()" />
                        &nbsp;&nbsp;&nbsp;
                        <input type="button" value=" Save and Close " onclick="btnSched1SaveAndClose()" />
                        &nbsp;&nbsp;&nbsp;                    
                        <input type="button" value=" Cancel " onclick="btnSched1Cancel()" />
                        &nbsp;&nbsp;&nbsp;
                        <input type="button" value=" Close " name="closeModal" onclick="btnSched1Close()" />
                        &nbsp;&nbsp;&nbsp;
                        <br />
                        <br />
                        <input type="button" value=" Print " name="prnModal" onclick="printModal('divModalSched1')" />
                    </center>
                    <br />
                   
                </div>   
            </div>     
        </div>
        <!--Modal Sched2 -->     
        <div id="divModalSched2" class="modalShow" style="display: none; text-align:center;">
            <div class="modalInner">
                <br />
                <div class="SubPageDiv">                                
                    <table id="tblModalSched2Header" class="RowSubTable tblForm tblCalcHeader" style="width: 99%; text-align:center; font-size: 12px;">
                        <tr>
                            <td class="tdschedTitle tblForm" colspan="6">
                                <table>
                                    <tr>
                                        <td>
                                            <span style="padding-right: 100px;"><b>Schedule 2</b></span>
                                        </td>
                                        <td>
                                            <b>List of Transactions Resulting to Loss</b>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr class="RowSubTable, tblForm" >                            
                            <td class="tdBorderRight" style="width: 15%;">
                                <span style="text-align: left;" class="xsmall" >Date of Transaction
                                <br />
                                (MM/DD/YYYY)                                                            
                                <br />
                                </span>
                                <span style="text-align: center;"><b>(a)</b></span>
                            </td>
                            <td class="tdBorderRight" style="width: 16%;">
                                <b>Name of Corporate Stock
                                    <br />
                                    <br />
                                    (b)
                                </b>
                            </td>
                            <td class="tdBorderRight" style="width: 22%;">
                                <b>Selling Price/
                                    <br />
                                    Fair Market Value
                                    <br />
                                    (c)
                                </b>
                            </td>
                            <td class="tdBorderRight" style="width: 20%;">
                                <b>Cost
                                    <br />
                                    <br />
                                    (d)
                                </b>
                            </td>                                                                
                            <td class="tdBorderRight" style="width: 19%;">
                                <b>Capital Loss
                                    <br />
                                    <br />
                                    (e)
                                </b>
                            </td>                                                        
                            <td >
                                
                            </td>
                        </tr>                        
                    </table>
                    <table id="tblModalSched2Iteration" class="tblForm" style="width:99%; text-align:center; font-size: 12px;">
                    <!-- content here-->
                    </table>
                    <table id="tblModalSched2IterationSaver" style="display: none;" >
                    <!-- content here-->
                    </table>
                    <table id="tblModalSched2TotalTable" class="RowSubTable, tblForm" style="width:99%; text-align:center; font-size: 12px;">
                        <tr>
                            <td colspan="6" align="right">
                                <br />
                                <input type="button" value=" Add More " onclick="btnSched2Add();" />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <br /><br />
                            </td>
                        </tr>
                        <tr class="modalSubtotal">  
                            <td style="width: 15%;">
                            </td>                      
                            <td align="left" style="width: 16%;">
                                <b>Subtotal</b>
                            </td>
                            <td class="tdBorderRight tdAmount" style="width: 22%;">
                                <input type="text" id="frm1707A:txtS2ModalTotalSellingPrice" name="frm1707A:txtS2ModalTotalSellingPrice" class="schedAmount" disabled=" disabled"    />
                            </td>
                            <td class="tdBorderRight tdAmount" style="width: 20%;">
                                <input type="text" id="frm1707A:txtS2ModalTotalCost" name="frm1707A:txtS2ModalTotalCost" class="schedAmount" disabled="disabled" />
                            </td>
                            <td class="tdAmount" style="width: 19%;">
                                <input type="text" id="frm1707A:txtS2ModalTotalCapitalLoss" name="frm1707A:txtS2ModalTotalCapitalLoss" class="schedAmount" disabled="disabled" />
                            </td>  
                            <td >
                            </td>
                        </tr>
                    </table>
                </div>
                <div>
                    <br />                            
                    <center>
                        &nbsp;&nbsp;&nbsp;
                        <input type="button" value=" Save " onclick="btnSched2Save()" />
                        &nbsp;&nbsp;&nbsp;
                        <input type="button" value=" Save and Close " onclick="btnSched2SaveAndClose()" />
                        &nbsp;&nbsp;&nbsp;                    
                        <input type="button" value=" Cancel " onclick="btnSched2Cancel()" />
                        &nbsp;&nbsp;&nbsp;
                        <input type="button" value=" Close " name="closeModal" onclick="btnSched2Close()" />
                        &nbsp;&nbsp;&nbsp;
                        <br />
                        <br />
                        <input type="button" value=" Print " name="prnModal" onclick="printModal('divModalSched2')" />
                    </center>
                    <br />
                   
                </div>  
            </div>      
        </div>
        <!--CSV Reader-->
        <div id="divCSVReaderSched1" style="display: none;">
            <table>
                <tr>
                    <td  colspan="2">
                        Please choose a delimited text file to read:
                        <br />
                        <input type="file" id="sched1files">
                        <br />
                        <br />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" id="btnSched1CSVReader" value="Read"/>
                    </td>
                    <td>
                        <input type="button" id="btnSched1CSVClose" value="Close" />
                    </td>
                </tr>
            </table>            
        </div>
        <div id="divCSVReaderSched2" style="display: none;">            
            <table>
                <tr>
                    <td  colspan="2">
                        Please choose a delimited text file to read:
                        <br />
                        <input type="file" id="sched2files">
                        <br />
                        <br />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" id="btnSched2CSVReader" value="Read"/>
                    </td>
                    <td>
                        <input type="button" id="btnSched2CSVClose" value="Close" />
                    </td>
                </tr>
            </table>   
        </div>

        <!-- Send Email -->
        <div id="hiddenEnroll" style="display:none;"  > <input id="txtFinalFlag" class="FinalFlag" name="txtFinalFlag" type="text" onblur="" onkeypress="" value="0" maxlength="60"   />
            <input id="txtEnroll" name="txtEnroll" type="text" onblur="" onkeypress="" value="N" maxlength="60"   />
        </div>
        <div id="ebirConfirmOnline" style="display: none;">
            <input type="text" id="ebirOnlineConfirmUsername" maxlength="50" />
            <input type="password" id="ebirOnlineConfirmPassword" maxlength="50" />
            <input type="button" id="ebirOnlineConfirmSubmit" value="Submit" onclick="sendEmail(this);" />
            <input type="button" id="ebirOnlineConfirmCancel" value="Cancel" onclick="SetFinalFlagTo0(); HideContainer('ebirConfirmOnline'); ShowContainer('container'); " />
            <input type="text" id="ebirOnlineUsername" maxlength="50" />
            <input type="password" id="ebirOnlinePassword" maxlength="50" />
            <input type="text" id="ebirOnlineSecret" maxlength="50" style="display: none;" />
            <input type="button" id="ebirOnlineSubmit" value="Submit" onclick="ValidateUserPass();" />
            <input type="button" id="ebirOnlineCancel" value="Cancel" onclick="SetFinalFlagTo0(); HideContainer('ebirOnline'); ShowContainer('container'); " />
            
        </div>
        <div id="hiddenEmail" style="display:none;"  > 
            <input id="txtEmail" class="emailClass" name="txtEmail" value="{{$company->email_address}}" type="text" onblur="" onkeypress="" maxlength="60"   />
        </div>
        <div style="display:none;">
            <select class="driveSelect" id="driveSelectTPExport" name="driveSelectTPExport" size="1" class="modalContent">
                <option value="0"></option>
            </select>
        </div>

    </form>

        <textarea id='responsetext' style="display: none;"></textarea>
        <!-- XML retrieval -->
        <div style="display: none;">
            <xmp id='xmlFormat'>    
                \n</xmp>
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
<script type="text/javascript">
  function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    function colorOnFocus(elem) {
        $(elem).css({ 'background': '#ffffcc' });
        $(elem).select();

    }
    function colorOnBlur(elem) {
        $(elem).css({ 'background': '#ffffff' });
    }

    //START: modalSched1
    function sched1More() {

        $('#container').hide('blind');
        $('#divModalSched1').show('fade');

        modalConditionPrint('#divModalSched1');

        if (document.getElementById("frm1707A:btnValidate").disabled == false) {
            if ($("#tblModalSched1Iteration tr").length == 0) {
                modalSched1Add();
                document.getElementById("frm1707A:txtS1C1DateOfTransaction_1").value = document.getElementById("frm1707A:txtS1C1DateOfTransactionI7").value;
                document.getElementById("frm1707A:txtS1C2NameOfCorporateStock_1").value = document.getElementById("frm1707A:txtS1C2NameOfCorporateStockI7").value;
                document.getElementById("frm1707A:txtS1C3SellingPrice_1").value = document.getElementById("frm1707A:txtS1C3SellingPriceI7").value;
                document.getElementById("frm1707A:txtS1C4Cost_1").value = document.getElementById("frm1707A:txtS1C4CostI7").value;
                document.getElementById("frm1707A:txtS1C5CapitalGains_1").value = document.getElementById("frm1707A:txtS1C5CapitalGainsI7").value;
                document.getElementById("frm1707A:txtS1C6TaxPaid_1").value = document.getElementById("frm1707A:txtS1C6TaxPaidI7").value;

                modalSched1Subtotal();
            }

            $('#tblModalSched1IterationSaver').html($('#tblModalSched1Iteration').html());            
        }

        // 9/22/2015
        $('.schedCap').each(function () { this.disabled = true; });
    }

    function modalSched1Close() {
        $('#container').show('fade');
        $('#divModalSched1').hide('blind');

        if (document.getElementById("frm1707A:btnValidate").disabled == false) {
            $('#tblModalSched1IterationSaver').html('');
            $('#ModalSched1Length').val($("#tblModalSched1Iteration tr").length);

            if ($('#ModalSched1Length').val() < 1) {
                document.getElementById("frm1707A:txtS1C1DateOfTransactionI7").value = '';
                document.getElementById("frm1707A:txtS1C2NameOfCorporateStockI7").value = '';
                document.getElementById("frm1707A:txtS1C3SellingPriceI7").value = '0.00';
                document.getElementById("frm1707A:txtS1C4CostI7").value = '0.00';
                document.getElementById("frm1707A:txtS1C5CapitalGainsI7").value = '0.00';
                document.getElementById("frm1707A:txtS1C6TaxPaidI7").value = '0.00';

                document.getElementById("frm1707A:txtS1C1DateOfTransactionI7").disabled = false;
                document.getElementById("frm1707A:txtS1C2NameOfCorporateStockI7").disabled = false;
                document.getElementById("frm1707A:txtS1C3SellingPriceI7").disabled = false;
                document.getElementById("frm1707A:txtS1C4CostI7").disabled = false;
                document.getElementById("frm1707A:txtS1C6TaxPaidI7").disabled = false;

                document.getElementById("btnSched1More").disabled = true;
            }
            else if ($('#ModalSched1Length').val() == 1) {
                document.getElementById("frm1707A:txtS1C1DateOfTransactionI7").value = document.getElementById("frm1707A:txtS1C1DateOfTransaction_1").value;
                document.getElementById("frm1707A:txtS1C2NameOfCorporateStockI7").value = document.getElementById("frm1707A:txtS1C2NameOfCorporateStock_1").value;
                document.getElementById("frm1707A:txtS1C3SellingPriceI7").value = document.getElementById("frm1707A:txtS1C3SellingPrice_1").value;
                document.getElementById("frm1707A:txtS1C4CostI7").value = document.getElementById("frm1707A:txtS1C4Cost_1").value;
                document.getElementById("frm1707A:txtS1C5CapitalGainsI7").value = document.getElementById("frm1707A:txtS1C5CapitalGains_1").value;
                document.getElementById("frm1707A:txtS1C6TaxPaidI7").value = document.getElementById("frm1707A:txtS1C6TaxPaid_1").value;

                document.getElementById("frm1707A:txtS1C1DateOfTransactionI7").disabled = false;
                document.getElementById("frm1707A:txtS1C2NameOfCorporateStockI7").disabled = false;
                document.getElementById("frm1707A:txtS1C3SellingPriceI7").disabled = false;
                document.getElementById("frm1707A:txtS1C4CostI7").disabled = false;
             
                document.getElementById("frm1707A:txtS1C6TaxPaidI7").disabled = false;

                deleteRow(document.getElementById("frm1707A:txtS1C6TaxPaid_1"));
            }
            else {

                document.getElementById("frm1707A:txtS1C1DateOfTransactionI7").value = '';
                document.getElementById("frm1707A:txtS1C2NameOfCorporateStockI7").value = 'OTHERS';
                document.getElementById("frm1707A:txtS1C3SellingPriceI7").value = document.getElementById("frm1707A:txtS1ModalTotalSellingPrice").value;
                document.getElementById("frm1707A:txtS1C4CostI7").value = document.getElementById("frm1707A:txtS1ModalTotalCost").value;
                document.getElementById("frm1707A:txtS1C5CapitalGainsI7").value = document.getElementById("frm1707A:txtS1ModalTotalCapitalGains").value;
                document.getElementById("frm1707A:txtS1C6TaxPaidI7").value = document.getElementById("frm1707A:txtS1ModalTotalTaxPaid").value;

                document.getElementById("frm1707A:txtS1C1DateOfTransactionI7").disabled = true;
                document.getElementById("frm1707A:txtS1C2NameOfCorporateStockI7").disabled = true;
                document.getElementById("frm1707A:txtS1C3SellingPriceI7").disabled = true;
                document.getElementById("frm1707A:txtS1C4CostI7").disabled = true;
                document.getElementById("frm1707A:txtS1C6TaxPaidI7").disabled = true;
            }

            modalSched1Subtotal();
            computeSched1SellingPrice();
            computeSched1Cost();
            computeSched1CapitalGains();
            computeSched1TaxPaid();
        }

    }

    function modalSched1FixId() {


        var trLength = $("#tblModalSched1Iteration tr").length;
        var alltr = $("#tblModalSched1Iteration tr");

        for (i = 0; i < trLength; i++) {

            trSpan = alltr.eq(i).find('span');
            trSpan.html('<b>' + (i + 1) + '.</b>');

            trInput = alltr.eq(i).find('input');
            trInput[0].setAttribute("id", "frm1707A:txtS1C1DateOfTransaction_" + (i + 1));
            trInput[1].setAttribute("id", "frm1707A:txtS1C2NameOfCorporateStock_" + (i + 1));
            trInput[2].setAttribute("id", "frm1707A:txtS1C3SellingPrice_" + (i + 1));
            trInput[3].setAttribute("id", "frm1707A:txtS1C4Cost_" + (i + 1));
            trInput[4].setAttribute("id", "frm1707A:txtS1C5CapitalGains_" + (i + 1));
            trInput[5].setAttribute("id", "frm1707A:txtS1C6TaxPaid_" + (i + 1));

            trInput[0].setAttribute("name", "frm1707A:txtS1C1DateOfTransaction_" + (i + 1));
            trInput[1].setAttribute("name", "frm1707A:txtS1C2NameOfCorporateStock_" + (i + 1));
            trInput[2].setAttribute("name", "frm1707A:txtS1C3SellingPrice_" + (i + 1));
            trInput[3].setAttribute("name", "frm1707A:txtS1C4Cost_" + (i + 1));
            trInput[4].setAttribute("name", "frm1707A:txtS1C5CapitalGains_" + (i + 1));
            trInput[5].setAttribute("name", "frm1707A:txtS1C6TaxPaid_" + (i + 1));


        }
    }

    function btnSched1Add() {

        if (validateSchedules(' Schedule 1 Additional Items', 'tblModalSched1Iteration', 'txtS1C1DateOfTransaction_', 'txtS1C2NameOfCorporateStock_', 'txtS1C3SellingPrice_', 'txtS1C4Cost_', 'txtS1C5CapitalGains_', true, true)) {

            modalSched1Add();

        }
    }

    function btnSched1Save() {

        if (validateSchedules(' Schedule 1 Additional Items', 'tblModalSched1Iteration', 'txtS1C1DateOfTransaction_', 'txtS1C2NameOfCorporateStock_', 'txtS1C3SellingPrice_', 'txtS1C4Cost_', 'txtS1C5CapitalGains_', true, true)) {
            $('#tblModalSched1IterationSaver').html($('#tblModalSched1Iteration').html());
            alert('Items have been saved successfully');
        }
    }

    function btnSched1SaveAndClose() {

        if (validateSchedules(' Schedule 1 Additional Items', 'tblModalSched1Iteration', 'txtS1C1DateOfTransaction_', 'txtS1C2NameOfCorporateStock_', 'txtS1C3SellingPrice_', 'txtS1C4Cost_', 'txtS1C5CapitalGains_', true, true)) {
           
            alert('Items have been saved successfully');
            modalSched1Close();

        }
    }

    function btnSched1Cancel() {

        var answer = confirm("Cancel changes?");
        if (answer == true) {
            $('#tblModalSched1Iteration').html($('#tblModalSched1IterationSaver').html());
            modalSched1Subtotal();
        }
        else {
            return;
        }
    }

    function btnSched1Close() {

        if (document.getElementById("frm1707A:btnValidate").disabled == false) {
            var answer = confirm("Your changes won't be saved. Would you like to continue?");
            if (answer == true) {
                $('#tblModalSched1Iteration').html($('#tblModalSched1IterationSaver').html());
                modalSched1Subtotal();
                modalSched1Close();
            }
            else {
                return;
            }
        }
        else {
            modalSched1Close();
        }
    }


    function modalSched1Add() {
        var i = $("#tblModalSched1Iteration tr").length + 1;

        $('#tblModalSched1Iteration').append(
                '<tr>' +
                '    <td class="tdBorderRight"  style="width: 15%;">' + '<span><b>' + i + '. </b></span>' +
                '        <input type="text" id="frm1707A:txtS1C1DateOfTransaction_' + i + '" name="frm1707A:txtS1C1DateOfTransaction_' + i + '" class="txtDate" maxlength="10" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this, event)" onfocus="colorOnFocus(this)" onblur="colorOnBlur(this)"/>' +
                '    </td>' +
                '    <td class="tdBorderRight" style="width: 16%;">' +
                '        <input type="text" id="frm1707A:txtS1C2NameOfCorporateStock_' + i + '" name="frm1707A:txtS1C2NameOfCorporateStock_' + i + '" class="txtCorporate" onfocus="colorOnFocus(this)" maxLength="15" onblur="checkIfValidValues(this), capitalize(this), colorOnBlur(this)" onkeypress="checkIfValidValues(this);"/>' +
                '    </td>' +
                '    <td class="tdBorderRight tdAmount" style="width: 16%;">' +
                '        <input type="text" id="frm1707A:txtS1C3SellingPrice_' + i + '" name="frm1707A:txtS1C3SellingPrice_' + i + '" class="schedAmount"  value="0.00" maxlength="15" onkeypress="return numbersonly(this, event)" onfocus="colorOnFocus(this)" onblur="colorOnBlur(this), roundElement(this), modalAmountNeg(this),elemModalSched1Compute(this,' + "'txtS1C3SellingPrice', 'txtS1ModalTotalSellingPrice', 'Selling Price')" + '"/>' +
                '    </td>' +
                '    <td class="tdBorderRight tdAmount" style="width: 14%;">' +
                '        <input type="text" id="frm1707A:txtS1C4Cost_' + i + '" name="frm1707A:txtS1C4Cost_' + i + '" class="schedAmount"  value="0.00" maxlength="15" onkeypress="return numbersonly(this, event)" onfocus="colorOnFocus(this)" onblur="colorOnBlur(this), roundElement(this), modalAmountNeg(this), elemModalSched1Compute(this,' + "'txtS1C4Cost', 'txtS1ModalTotalCost', 'Cost')" + '"/>' +
                '    </td>' +
                '    <td class="tdBorderRight tdAmount" style="width: 14%;">' +
                '        <input type="text" id="frm1707A:txtS1C5CapitalGains_' + i + '" name="frm1707A:txtS1C5CapitalGains_' + i + '" class="schedAmount schedCap"  value="0.00" maxlength="15" onkeypress="return numbersonly(this, event)" onfocus="colorOnFocus(this)" onblur="colorOnBlur(this), roundElement(this), modalAmountNeg(this), elemModalSched1Compute(this,' + "'txtS1C5CapitalGains', 'txtS1ModalTotalCapitalGains', 'Capital Gains')" + '" disabled="disabled"/>' +
                '    </td>' +
                '    <td class="tdBorderRight tdAmount" style="width: 14%;">' +
                '        <input type="text" id="frm1707A:txtS1C6TaxPaid_' + i + '" name="frm1707A:txtS1C6TaxPaid_' + i + '" class="schedAmount"  value="0.00" maxlength="15" onkeypress="return numbersonly(this, event)" onfocus="colorOnFocus(this)" onblur="colorOnBlur(this), roundElement(this), modalAmountNeg(this), elemModalSched1Compute(this,' + "'txtS1C6TaxPaid', 'txtS1ModalTotalTaxPaid', 'Tax Paid')" + '"/>' +
                '    </td>' +
                '    <td>' +
                '        <input type="button" value="Remove" onclick="deleteRow(this); modalSched1FixId(); modalSched1Subtotal();"/> ' +
                '    </td>' +
                '</tr>'
            );

        
    }

    function elemModalSched1Compute(elem, itemType, modalTotal, msgItem) {
        var elemValue = valForCompute($(elem).val());
        var modalSched1ItemsLength = $('#tblModalSched1Iteration tr').length;

        var subtotalValue = 0.00;
        var mainValue = 0.00;

        for (var i = 1; i < 7; i++) {
            mainValue += valForCompute(document.getElementById('frm1707A:' + itemType + 'I' + i).value);
            mainValue = preciseCompute(mainValue);
        }


        for (var i = 0; i < modalSched1ItemsLength; i++) {
            subtotalValue += valForCompute($('#tblModalSched1Iteration input[id="frm1707A:' + itemType + '_' + (i + 1) + '"]').val());
            subtotalValue = preciseCompute(subtotalValue);
            //add computation for capital gains 9/22/2015
            var modS1SellingPrice = valForCompute($('#tblModalSched1Iteration input[id="frm1707A:txtS1C3SellingPrice_' + (i + 1) + '"]').val());
            var modS2Cost = valForCompute($('#tblModalSched1Iteration input[id="frm1707A:txtS1C4Cost_' + (i + 1) + '"]').val());
            var modS3Gains = preciseCompute(modS1SellingPrice - modS2Cost);

            $('#tblModalSched1Iteration input[id="frm1707A:txtS1C5CapitalGains_' + (i + 1) + '"]').val(roundAmount(modS3Gains.toString()));
            //end computation

        }

        var possibleValue = roundAmount((mainValue + subtotalValue).toString());


        if (elemValue > 0 && possibleValue == '0.00') {
            alert("Total " + msgItem + " should not exceed billion");
            $(elem).val('');
            $(elem).focus();
        } else {
            
            modalSched1Subtotal();
        }

    }



    function modalSched1Subtotal() {
        var modalSched1ItemsLength = $('#tblModalSched1Iteration tr').length;

        var subtotalSellingPrice = 0.00;
        var subtotalCost = 0.00;
        var subtotalCapitalGains = 0.00;
        var subtotalTaxPaid = 0.00;

        for (var i = 0; i < modalSched1ItemsLength; i++) {
            subtotalSellingPrice += valForCompute($('#tblModalSched1Iteration input[id="frm1707A:txtS1C3SellingPrice_' + (i + 1) + '"]').val());
            subtotalCost += valForCompute($('#tblModalSched1Iteration input[id="frm1707A:txtS1C4Cost_' + (i + 1) + '"]').val());
            subtotalCapitalGains += valForCompute($('#tblModalSched1Iteration input[id="frm1707A:txtS1C5CapitalGains_' + (i + 1) + '"]').val());
            subtotalTaxPaid += valForCompute($('#tblModalSched1Iteration input[id="frm1707A:txtS1C6TaxPaid_' + (i + 1) + '"]').val());

            subtotalSellingPrice = preciseCompute(subtotalSellingPrice);
            subtotalCost = preciseCompute(subtotalCost);
            subtotalCapitalGains = preciseCompute(subtotalCapitalGains);
            subtotalTaxPaid = preciseCompute(subtotalTaxPaid);

        }

        document.getElementById("frm1707A:txtS1ModalTotalSellingPrice").value = roundAmount(subtotalSellingPrice.toString());
        document.getElementById("frm1707A:txtS1ModalTotalCost").value = roundAmount(subtotalCost.toString());
        document.getElementById("frm1707A:txtS1ModalTotalCapitalGains").value = roundAmount(subtotalCapitalGains.toString());
        document.getElementById("frm1707A:txtS1ModalTotalTaxPaid").value = roundAmount(subtotalTaxPaid.toString());
    }

    function sched2More() {

        $('#container').hide('blind');
        $('#divModalSched2').show('fade');

        modalConditionPrint('#divModalSched2');

        if (document.getElementById("frm1707A:btnValidate").disabled == false) {
            if ($("#tblModalSched2Iteration tr").length == 0) {
                modalSched2Add();

                document.getElementById("frm1707A:txtS2C1DateOfTransaction_1").value = document.getElementById("frm1707A:txtS2C1DateOfTransactionI4").value;
                document.getElementById("frm1707A:txtS2C2NameOfCorporateStock_1").value = document.getElementById("frm1707A:txtS2C2NameOfCorporateStockI4").value;
                document.getElementById("frm1707A:txtS2C3SellingPrice_1").value = document.getElementById("frm1707A:txtS2C3SellingPriceI4").value;
                document.getElementById("frm1707A:txtS2C4Cost_1").value = document.getElementById("frm1707A:txtS2C4CostI4").value;
                document.getElementById("frm1707A:txtS2C5CapitalLoss_1").value = document.getElementById("frm1707A:txtS2C5CapitalLossI4").value;

                modalSched2Subtotal();
            }

            $('#tblModalSched2IterationSaver').html($('#tblModalSched2Iteration').html());
        }

        $('.schedCap').each(function () { this.disabled = true; });
    }

    function modalSched2Close() {
        $('#container').show('fade');
        $('#divModalSched2').hide('blind');

        if (document.getElementById("frm1707A:btnValidate").disabled == false) {
            $('#tblModalSched2IterationSaver').html('');
            $('#ModalSched2Length').val($("#tblModalSched2Iteration tr").length);

            if ($('#ModalSched2Length').val() < 1) {
                document.getElementById("frm1707A:txtS2C1DateOfTransactionI4").value = '';
                document.getElementById("frm1707A:txtS2C2NameOfCorporateStockI4").value = '';
                document.getElementById("frm1707A:txtS2C3SellingPriceI4").value = '0.00';
                document.getElementById("frm1707A:txtS2C4CostI4").value = '0.00';
                document.getElementById("frm1707A:txtS2C5CapitalLossI4").value = '0.00';

                document.getElementById("frm1707A:txtS2C1DateOfTransactionI4").disabled = false;
                document.getElementById("frm1707A:txtS2C2NameOfCorporateStockI4").disabled = false;
                document.getElementById("frm1707A:txtS2C3SellingPriceI4").disabled = false;
                document.getElementById("frm1707A:txtS2C4CostI4").disabled = false;
              
                document.getElementById("btnSched1More").disabled = true;

            }
            else if ($('#ModalSched2Length').val() == 1) {

                document.getElementById("frm1707A:txtS2C1DateOfTransactionI4").value = document.getElementById("frm1707A:txtS2C1DateOfTransaction_1").value;
                document.getElementById("frm1707A:txtS2C2NameOfCorporateStockI4").value = document.getElementById("frm1707A:txtS2C2NameOfCorporateStock_1").value;
                document.getElementById("frm1707A:txtS2C3SellingPriceI4").value = document.getElementById("frm1707A:txtS2C3SellingPrice_1").value;
                document.getElementById("frm1707A:txtS2C4CostI4").value = document.getElementById("frm1707A:txtS2C4Cost_1").value;
                document.getElementById("frm1707A:txtS2C5CapitalLossI4").value = document.getElementById("frm1707A:txtS2C5CapitalLoss_1").value;

                document.getElementById("frm1707A:txtS2C1DateOfTransactionI4").disabled = false;
                document.getElementById("frm1707A:txtS2C2NameOfCorporateStockI4").disabled = false;
                document.getElementById("frm1707A:txtS2C3SellingPriceI4").disabled = false;
                document.getElementById("frm1707A:txtS2C4CostI4").disabled = false;
               
                deleteRow(document.getElementById("frm1707A:txtS2C1DateOfTransaction_1"));
            }
            else {

                document.getElementById("frm1707A:txtS2C1DateOfTransactionI4").value = '';
                document.getElementById("frm1707A:txtS2C2NameOfCorporateStockI4").value = 'OTHERS';
                document.getElementById("frm1707A:txtS2C3SellingPriceI4").value = document.getElementById("frm1707A:txtS2ModalTotalSellingPrice").value;
                document.getElementById("frm1707A:txtS2C4CostI4").value = document.getElementById("frm1707A:txtS2ModalTotalCost").value;
                document.getElementById("frm1707A:txtS2C5CapitalLossI4").value = document.getElementById("frm1707A:txtS2ModalTotalCapitalLoss").value;

                document.getElementById("frm1707A:txtS2C1DateOfTransactionI4").disabled = true;
                document.getElementById("frm1707A:txtS2C2NameOfCorporateStockI4").disabled = true;
                document.getElementById("frm1707A:txtS2C3SellingPriceI4").disabled = true;
                document.getElementById("frm1707A:txtS2C4CostI4").disabled = true;
             
            }

            modalSched1Subtotal();
            computeSched2SellingPrice();
            computeSched2Cost();
            computeSched2CapitalLoss();
        }

    }

    function modalSched2FixId() {

        var trLength = $("#tblModalSched2Iteration tr").length;
        var alltr = $("#tblModalSched2Iteration tr");

        for (i = 0; i < trLength; i++) {

            trSpan = alltr.eq(i).find('span');
            trSpan.html('<b>' + (i + 1) + '.</b>');

            trInput = alltr.eq(i).find('input');
            trInput[0].setAttribute("id", "frm1707A:txtS2C1DateOfTransaction_" + (i + 1));
            trInput[1].setAttribute("id", "frm1707A:txtS2C2NameOfCorporateStock_" + (i + 1));
            trInput[2].setAttribute("id", "frm1707A:txtS2C3SellingPrice_" + (i + 1));
            trInput[3].setAttribute("id", "frm1707A:txtS2C4Cost_" + (i + 1));
            trInput[4].setAttribute("id", "frm1707A:txtS2C5CapitalLoss_" + (i + 1));


            trInput[0].setAttribute("name", "frm1707A:txtS2C1DateOfTransaction_" + (i + 1));
            trInput[1].setAttribute("name", "frm1707A:txtS2C2NameOfCorporateStock_" + (i + 1));
            trInput[2].setAttribute("name", "frm1707A:txtS2C3SellingPrice_" + (i + 1));
            trInput[3].setAttribute("name", "frm1707A:txtS2C4Cost_" + (i + 1));
            trInput[4].setAttribute("name", "frm1707A:txtS2C5CapitalLoss_" + (i + 1));
        }
    }

    function btnSched2Add() {

        if (validateSchedules(' Schedule 2 Additional Items', 'tblModalSched2Iteration', 'txtS2C1DateOfTransaction_', 'txtS2C2NameOfCorporateStock_', 'txtS2C3SellingPrice_', 'txtS2C4Cost_', 'txtS2C5CapitalLoss_', false, true)) {

            modalSched2Add();

        }
    }

    function btnSched2Save() {

        if (validateSchedules(' Schedule 2 Additional Items', 'tblModalSched2Iteration', 'txtS2C1DateOfTransaction_', 'txtS2C2NameOfCorporateStock_', 'txtS2C3SellingPrice_', 'txtS2C4Cost_', 'txtS2C5CapitalLoss_', false, true)) {
            $('#tblModalSched2IterationSaver').html($('#tblModalSched2Iteration').html());
            alert('Items have been saved successfully');
        }
    }

    function btnSched2SaveAndClose() {

        if (validateSchedules(' Schedule 2 Additional Items', 'tblModalSched2Iteration', 'txtS2C1DateOfTransaction_', 'txtS2C2NameOfCorporateStock_', 'txtS2C3SellingPrice_', 'txtS2C4Cost_', 'txtS2C5CapitalLoss_', false, true)) {
            
            alert('Items have been saved successfully');
            modalSched2Close();

        }
    }

    function btnSched2Cancel() {

        var answer = confirm("Cancel changes?");
        if (answer == true) {
            $('#tblModalSched2Iteration').html($('#tblModalSched2IterationSaver').html());

        }
        else {
            return;
        }
    }

    function btnSched2Close() {
        if (document.getElementById("frm1707A:btnValidate").disabled == false) {
            var answer = confirm("Your changes won't be saved. Would you like to continue?");
            if (answer == true) {
                $('#tblModalSched2Iteration').html($('#tblModalSched2IterationSaver').html());

                modalSched2Close();
            }
            else {
                return;
            }
        }
        else {
            modalSched2Close();
        }
    }


    function modalSched2Add() {
        var i = $("#tblModalSched2Iteration tr").length + 1;

        $('#tblModalSched2Iteration').append(
                '<tr>' +
                '    <td class="tdBorderRight"  style="width: 15%;">' + '<span><b>' + i + '. </b></span>' +
                '        <input type="text" id="frm1707A:txtS2C1DateOfTransaction_' + i + '" name="frm1707A:txtS2C1DateOfTransaction_' + i + '" class="txtDate" maxlength="10" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this, event)" onfocus="colorOnFocus(this)" onblur="colorOnBlur(this)" />' +
                '    </td>' +
                '    <td class="tdBorderRight" style="width: 16%;">' +
                '        <input type="text" id="frm1707A:txtS2C2NameOfCorporateStock_' + i + '" name="frm1707A:txtS2C2NameOfCorporateStock_' + i + '" class="txtCorporate" onfocus="colorOnFocus(this)" maxLength="15" onblur="checkIfValidValues(this), capitalize(this), colorOnBlur(this), modalSched2Subtotal()"/>' +
                '    </td>' +
                '    <td class="tdBorderRight tdAmount" style="width: 22%;">' +
                '        <input type="text" id="frm1707A:txtS2C3SellingPrice_' + i + '" name="frm1707A:txtS2C3SellingPrice_' + i + '" class="schedAmount" value="0.00" maxlength="15" onkeypress="return numbersonly(this, event)" onfocus="colorOnFocus(this)" onblur="colorOnBlur(this), roundElement(this), modalAmountNeg(this),elemModalSched2Compute(this,' + "'txtS2C3SellingPrice', 'txtS2ModalTotalSellingPrice', 'Selling Price')" + '"/>' +
                '    </td>' +
                '    <td class="tdBorderRight tdAmount" style="width: 20%;">' +
                '        <input type="text" id="frm1707A:txtS2C4Cost_' + i + '" name="frm1707A:txtS2C4Cost_' + i + '" class="schedAmount" value="0.00" maxlength="15" onkeypress="return numbersonly(this, event)" onfocus="colorOnFocus(this)" onblur="colorOnBlur(this), roundElement(this), modalAmountNeg(this), elemModalSched2Compute(this,' + "'txtS2C4Cost', 'txtS2ModalTotalCost', 'Cost')" + '"/>' +
                '    </td>' +
                '    <td class="tdBorderRight tdAmount" style="width: 19%;">' +
                '        <input type="text" id="frm1707A:txtS2C5CapitalLoss_' + i + '" name="frm1707A:txtS2C5CapitalLoss_' + i + '" class="schedAmount schedCap" value="0.00" maxlength="15" onkeypress="return numbersonly(this, event)" onfocus="colorOnFocus(this)" onblur="colorOnBlur(this), roundElement(this), modalAmountNeg(this),elemModalSched2Compute(this,' + "'txtS2C5CapitalLoss', 'txtS2ModalTotalCapitalLoss', 'Capital Loss')" + '" disabled="disabled"/>' +
                '    </td>' +
                '    <td>' +
                '        <input type="button" value="Remove" onclick="deleteRow(this), modalSched2FixId(), modalSched2Subtotal()"/> ' +
                '    </td>' +
                '</tr>'
            );
    }

    function elemModalSched2Compute(elem, itemType, modalTotal, msgItem) {
        var elemValue = valForCompute($(elem).val());
        var modalSched1ItemsLength = $('#tblModalSched2Iteration tr').length;

        var subtotalValue = 0.00;
        var mainValue = 0.00;

        for (var i = 1; i < 5; i++) {

            mainValue += valForCompute(document.getElementById('frm1707A:' + itemType + 'I' + i).value);
            mainValue = preciseCompute(mainValue);

        }


        for (var i = 0; i < modalSched1ItemsLength; i++) {
            subtotalValue += valForCompute($('#tblModalSched2Iteration input[id="frm1707A:' + itemType + '_' + (i + 1) + '"]').val());
            subtotalValue = preciseCompute(subtotalValue);

            //add computation for capital gains 9/22/2015
            var modS2SellingPrice = valForCompute($('#tblModalSched2Iteration input[id="frm1707A:txtS2C3SellingPrice_' + (i + 1) + '"]').val());
            var modS2Cost = valForCompute($('#tblModalSched2Iteration input[id="frm1707A:txtS2C4Cost_' + (i + 1) + '"]').val());
            var modS3Loss = preciseCompute(modS2Cost - modS2SellingPrice);

            $('#tblModalSched2Iteration input[id="frm1707A:txtS2C5CapitalLoss_' + (i + 1) + '"]').val(roundAmount(modS3Loss.toString()));
      
        }

        var possibleValue = roundAmount((mainValue + subtotalValue).toString());


        if (elemValue > 0 && possibleValue == '0.00') {
            alert("Total " + msgItem + " should not exceed billion");
            $(elem).val('');
            $(elem).focus();
        } else {
           
            modalSched2Subtotal();
        }

    }


    function modalSched2Subtotal() {
        var modalSched2ItemsLength = $('#tblModalSched2Iteration tr').length;

        var subtotalSellingPrice = 0.00;
        var subtotalCost = 0.00;
        var subtotalCapitalLoss = 0.00;


        for (var i = 0; i < modalSched2ItemsLength; i++) {
            subtotalSellingPrice += valForCompute($('#tblModalSched2Iteration input[id="frm1707A:txtS2C3SellingPrice_' + (i + 1) + '"]').val());
            subtotalCost += valForCompute($('#tblModalSched2Iteration input[id="frm1707A:txtS2C4Cost_' + (i + 1) + '"]').val());
            subtotalCapitalLoss += valForCompute($('#tblModalSched2Iteration input[id="frm1707A:txtS2C5CapitalLoss_' + (i + 1) + '"]').val());

            subtotalSellingPrice = preciseCompute(subtotalSellingPrice);
            subtotalCost = preciseCompute(subtotalCost);
            subtotalCapitalLoss = preciseCompute(subtotalCapitalLoss);
        }

        document.getElementById("frm1707A:txtS2ModalTotalSellingPrice").value = roundAmount(subtotalSellingPrice.toString());
        document.getElementById("frm1707A:txtS2ModalTotalCost").value = roundAmount(subtotalCost.toString());
        document.getElementById("frm1707A:txtS2ModalTotalCapitalLoss").value = roundAmount(subtotalCapitalLoss.toString());
    }
    function checkCalendarFiscal() {
        if (document.getElementById('frm1707A:rdoI1Calendar').checked) {
            document.getElementById('frm1707A:txtI1YearEndMonth').value = "12";
            document.getElementById('frm1707A:txtI1YearEndDay').value = "31";

            document.getElementById('frm1707A:txtI1YearEndMonth').disabled = true;
            document.getElementById('frm1707A:txtI1YearEndDay').disabled = true;
        } else {
            document.getElementById('frm1707A:txtI1YearEndMonth').value = "01";
            document.getElementById('frm1707A:txtI1YearEndMonth').disabled = false;
            document.getElementById('frm1707A:txtI1YearEndDay').disabled = false;

        }
    }

    function checkCalendarFiscalOnLoad() {

        if (document.getElementById('frm1707A:rdoI1Calendar').checked) {
            document.getElementById('frm1707A:txtI1YearEndMonth').disabled = true;
            document.getElementById('frm1707A:txtI1YearEndDay').disabled = true;
        } else {
            document.getElementById('frm1707A:txtI1YearEndMonth').disabled = false;
            document.getElementById('frm1707A:txtI1YearEndDay').disabled = false;
        }

        // 09/22/2015
        if (document.getElementById('frm1707A:rdoI4ATCII030').checked) {
            document.getElementById("frm1707A:rdoI1Fiscal").disabled = true;
        }
    }

    function checkTreaty() {
        if (document.getElementById('frm1707A:rdoI11TaxTreatyYes').checked) {
            document.getElementById('frm1707A:txtI11ASpecify').disabled = false;

        } else {
            document.getElementById('frm1707A:txtI11ASpecify').disabled = true;
            document.getElementById('frm1707A:txtI11ASpecify').value = "";
        }
    }

    function checkAmendedForItem16A() {
        if (document.getElementById("frm1707A:rdoI2AmemdedYes").checked == true) {
            document.getElementById("frm1707A:txtI16BTotalTaxPaid").disabled = false;
        }
        else {
            document.getElementById("frm1707A:txtI16BTotalTaxPaid").disabled = true;
            document.getElementById("frm1707A:txtI16BTotalTaxPaid").value = '0.00';
            computePart2Item16CTaxPaid();
        }
    }

    function checkMoreAndOthers() {
        enableDisableMoreButton(1, 8);
        enableDisableMoreButton(2, 5);
        disableOTHERSrow(1, 7);
        disableOTHERSrow(2, 4);

        function disableOTHERSrow(sched, itemNumber) {

            var schedLength = $("#tblModalSched" + sched + "Iteration tr").length;
            if (schedLength > 0) {

                document.getElementById("frm1707A:txtS" + sched + "C1DateOfTransactionI" + itemNumber).disabled = true;
                document.getElementById("frm1707A:txtS" + sched + "C2NameOfCorporateStockI" + itemNumber).disabled = true;
                document.getElementById("frm1707A:txtS" + sched + "C3SellingPriceI" + itemNumber).disabled = true;
                document.getElementById("frm1707A:txtS" + sched + "C4CostI" + itemNumber).disabled = true;

                var gainOrLoss = (sched == 1 ? "Gains" : "Loss");
                document.getElementById("frm1707A:txtS" + sched + "C5Capital" + gainOrLoss + "I" + itemNumber).disabled = true;
                if (sched == 1) {
                    document.getElementById("frm1707A:txtS1C6TaxPaidI7").disabled = true;
                }

            }
        }
    }

    function enableEmptyFromMain() {
        enable('frm1707A:txtI8RegisteredName');
        enable('frm1707A:txtI7TelNo');
        enable('frm1707A:txtI9RegisteredAddress');
        enable('frm1707A:txtI10ZipCode');

        function enable(elem) {
            if (($.trim(document.getElementById(elem).value) === "")) {
                document.getElementById(elem).disabled = false;
            }
        }
    }

    function checkOverPaymentRadio() {
        var taxPayable = document.getElementById('frm1707A:txtI17TaxStillPayable').value;

        if (taxPayable.toString().indexOf(')') > -1) {
            document.getElementById('frm1707A:rdoI19Refund').disabled = false;
            document.getElementById('frm1707A:rdoI19TaxCreditCertificate').disabled = false;
        }
        else {
            document.getElementById('frm1707A:rdoI19Refund').disabled = true;
            document.getElementById('frm1707A:rdoI19TaxCreditCertificate').disabled = true;
            document.getElementById('frm1707A:rdoI19Refund').checked = false;
            document.getElementById('frm1707A:rdoI19TaxCreditCertificate').checked = false;
        }
    }

    function validateYearEnd() {
        // var strmmddyyyy = document.getElementById('frm1707A:txtI1YearEndMonth').value + document.getElementById('frm1707A:txtI1YearEndDay').value + document.getElementById('frm1707A:txtI1YearEndYear').value;
        var strmmddyyyy = document.getElementById('frm1707A:txtI1YearEndMonth').value + "/" + document.getElementById('frm1707A:txtI1YearEndDay').value + "/" + document.getElementById('frm1707A:txtI1YearEndYear').value;

        if (!validateDate(strmmddyyyy)) {
            alert('Please provide a valid date (MM/DD/YYYY format) on Item 1');
            return false;
        }

        var isFiscal = document.getElementById("frm1707A:rdoI1Fiscal").checked;
        var yearEndMonth = (document.getElementById('frm1707A:txtI1YearEndMonth').value * 1) - 1;
        var yearEndDate = new Date(strmmddyyyy);
        var effectivityDate = new Date(2001, 06, 01);
        //Valid input for the Month and Year is June 2001 onwards.
        if (yearEndDate < effectivityDate) {
            alert('Valid input for the Month and Year is June 2001 onwards on Item 1.');
            return false;
        }
        else if (yearEndDate > new Date()) {
            alert('Year Ended should not be a future date on Item 1.');
            return false;
        }
        else if (isFiscal && yearEndMonth == 11) {
            alert('Month cannot be equal to December on Item 1.');
            return false;
        }

        return true;
    }

    function validateDateSchedElem(element) {
        var strmmddyyyy = element.value;
        if (!validateDate(strmmddyyyy)) {
            alert('Please provide a valid date. (MM/DD/YYYY format)');
            element.value = '';
            element.focus();
        } else {

            var dateTrans = new Date(strmmddyyyy);
            var dateTransSplit = dateTrans.toString().split('/');
            var dateTransYear = dateTransSplit[2];
            var yearEnd = new Date(document.getElementById('frm1707A:txtI1YearEndMonth').value + '/' + document.getElementById('frm1707A:txtI1YearEndDay').value + '/' + document.getElementById('frm1707A:txtI1YearEndYear').value);
            var yearFrom = new Date(document.getElementById('frm1707A:txtI1YearEndMonth').value + '/' + document.getElementById('frm1707A:txtI1YearEndDay').value + '/' + (document.getElementById('frm1707A:txtI1YearEndYear').value - 1));

            if (dateTransYear < 2001) {
                alert('The year should not be less than 2001.');
                element.value = '';
                element.focus();
            }
            else if (dateTrans > yearEnd) {
                alert('The Date of Transaction should not be greater than the Taxable Period.');
                element.value = '';
                element.focus();
            }
            else if (dateTrans < yearFrom) {
                alert('The Date of Transaction should be in the range of up to one year until the Taxable Period.');
                element.value = '';
                element.focus();
            }
        }
    }



    function atcClick() {
        if (document.getElementById('frm1707A:rdoI4ATCII030').checked) {
            $('#frm1707A\\:txtI8RegisteredName').attr('maxlength', '90');

            
            $('#frm1707A\\:rdoI1Calendar').attr('checked', 'true');
            checkCalendarFiscal();
            $('#frm1707A\\:rdoI1Fiscal').attr('disabled', 'true');
            $('#frm1707A\\:txtI1YearEndYear').focus();
        }
        else if (document.getElementById('frm1707A:rdoI4ATCIC110').checked) {
            $('#frm1707A\\:txtI8RegisteredName').attr('maxlength', '50');


            $('#frm1707A\\:rdoI1Fiscal').removeAttr('disabled');
            checkCalendarFiscalOnLoad();
            $('#frm1707A\\:txtI1YearEndYear').focus();

        }
    }

    function item12Click(elem) {
        alert('This item is non-editable. To fill this in, please provide values in Schedule 1 Column E.');
        document.getElementById('frm1707A:txtS1C5CapitalGainsI1').focus();
        $(elem).css({ 'background-color': '#efefef' });
    }

    function item13Click(elem) {
        alert('This item is non-editable. To fill this in, please provide values in Schedule 2 Column E.');
        document.getElementById('frm1707A:txtS2C5CapitalLossI1').focus();
        $(elem).css({ 'background-color': '#efefef' });
    }

    function item14and15Click(elem) {
        alert('This item is non-editable. To fill this in, please provide values in Column E of Schedule 1 or 2.');
        document.getElementById('frm1707A:txtS1C5CapitalGainsI1').focus();
        $(elem).css({ 'background-color': '#efefef' });
    }

    $('#frm1707A\\:txtI1YearEndMonth').blur(function () {
        if (!validateYearEnd()) {

            $(this).focus();
            $(this).val('01');
        }
    });

    $('#frm1707A\\:txtI1YearEndDay').blur(function () {
        if (!validateYearEnd()) {
            $(this).focus();
            $(this).val('01');
        }
    });

    $('#frm1707A\\:txtI1YearEndYear').blur(function () {
        if (!validateYearEnd()) {
            $(this).focus();
            $(this).val(new Date().getFullYear() - 1);
        }
    });

    $('.txtDate').keypress(function () {
        return wholenumber(this);
    });

    $('.txtDate').keydown(function () {
        return dateMasking(this);
    });

    $('.txtDate').blur(function () {
        return validateDateSchedElem(this);
    });


    $('.txtCorporate').blur(function () {
        if (!isNaN(this.value) && (this.value != '')) {
            alert('Name of Corporate Stock should not be all numbers');
            $(this).val('');
        }
        else {
            checkIfValidValues(this);
            capitalize(this);
        }
    });

    $('.txtCorporate').attr('maxlength', '17');



    $('.txtAmount, .schedAmount').blur(function () {
        roundElement(this);
    });

    $('.schedAmount, #frm1707A\\:txtI18ASurcharge, #frm1707A\\:txtI18BInterest, #frm1707A\\:txtI18CCompromise').blur(function () {
        if ($(this).val().toString().indexOf('(') > -1) {
            alert('This should not be a negative value');
            $(this).val('0.00');
        }
    });


    $('.txtAmount, .schedAmount').keypress(function () {
        return numbersonly(this, event);
    });

    $('.schedAmount').attr('maxlength', '15');


    $('#TblSchedule1  input[type="text"]').blur(function () {

        enableDisableMoreButton(1, 8);

    });

    $('#TblSchedule2 input[type="text"]').blur(function () {

        enableDisableMoreButton(2, 5);

    });

    function modalAmountNeg(elem) {
        if ($(elem).val().toString().indexOf('(') > -1) {
            alert('This should not be a negative value');
            $(elem).val('0.00');
        }
    }

    function enableDisableMoreButton(sched, loop) {

        var isNotEmpty = isNoEmpty();
        if (!isNotEmpty && $("#tblModalSched" + sched + "Iteration tr").length == 0) {

            document.getElementById("btnSched" + sched + "More").disabled = true;
        }
        else {
            document.getElementById("btnSched" + sched + "More").disabled = false;

        }

        function isNoEmpty() {
            for (var i = 1; i < loop; i++) {
                if (document.getElementById("frm1707A:txtS" + sched + "C1DateOfTransactionI" + i).value == '') { return false; }
                if (document.getElementById("frm1707A:txtS" + sched + "C2NameOfCorporateStockI" + i).value == '') { return false; }
                if (document.getElementById("frm1707A:txtS" + sched + "C3SellingPriceI" + i).value == '0.00') { return false; }
                if (document.getElementById("frm1707A:txtS" + sched + "C4CostI" + i).value == '0.00') { return false; }

            }

            return true;
        }
    }

    function modalConditionPrint(table) {
        if (document.getElementById("frm1707A:btnValidate").disabled == true) {
            $(table + " input[type='text']").attr("disabled", true);
            $(table + " input[type='button']").attr("disabled", true);
            $(table + " input[name='prnModal']").attr("disabled", false);
            $(table + " input[name='closeModal']").attr("disabled", false);
            $('.modalSubtotal input[type="text"]').attr("disabled", true);
        }
        else {
            $(table + " input[type='text']").attr("disabled", false);
            $(table + " input[type='button']").attr("disabled", false);
            $(table + " input[name='prnModal']").attr("disabled", true);
            $('.modalSubtotal input[type="text"]').attr("disabled", true);
        }
    }


    function printModal(modalID) {
        globalcancelModalInit = 1;

        globalcurrentDiv = modalID;
        $('#bg').hide();
        $('#' + modalID).removeClass("modalShow");

        $('#' + modalID).addClass("modalPrint");

        $('input[type="button"]').each(function () {
            $(this).addClass('previewButtonClass');
        });

        //$('#' + modalID + ' input[type="text"]').css({'font-size':'8px'});

        $('a').each(function () {
            if (this.id.length > 1) {
                document.getElementById(this.id).disabled = true;
            }
        });



        $('#printMenu').show('blind');
        if ($('#formMenu').css('display') != 'none') {
            $('#formMenu').hide('blind');
        }
        alert("This form must be printed on a Legal Size Paper. Please update your Printer Settings to ensure the correct printout of the form.\n\n" +
              "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166 and all Headers & Footers must be set to empty.");


        window.print();
    }

    var globalcancelModalInit = 0;
    var globalcurrentDiv = "";

    function printme() {
        alert("This form must be printed on a Legal Size Paper. Please update your Printer Settings to ensure the correct printout of the form.\n\n" +
              "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166 and all Headers & Footers must be set to empty.");

        $("#Page1Content").hide();
        $("#Print1Content").show();
        $('#bg').hide();
        $('.imgClass').css({ 'margin': 'auto', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });
    
        $('#Page1Content input[type="radio"],#Page1Content  input[type="text"]').each(function () {
            var splitId = this.id.split(':');
            var print1Id = 'Print_' + splitId[1].toString();

            if (this.type == 'radio') {
                this.checked ? $('#' + print1Id).css({ 'display': 'block' }) : $('#' + print1Id).css({ 'display': 'none' });
            }
            else if (this.type == 'text') {
                $('#' + print1Id).html($(this).val());
            }
        });

        $('#Print_txtI1YearEndMonth').html(document.getElementById('frm1707A:txtI1YearEndMonth').value);

        $('#printMenu').show('blind');
        if ($('#formMenu').css('display') != 'none') {
            $('#formMenu').hide('blind');
        }
        $('#PageFooter').hide();

         window.print();

         $("#Page1Content").show();
         $("#Print1Content").hide();
         $('#PageFooter').show();

    }

    function validateDate(strmmddyyyy) {
       
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
                else if ((result[0].length != 2 || (result[0] > 12 || result[0] < 0))) {
                    // numeric check if greater not than 31 - Month.
                    isValid = false;
                }
                else if (result[1].length != 2 || (result[1] > 31 || result[1] < 1)) {
                    // numeric check if Date.
                    isValid = false;
                }
                else if (result[2].length != 4 || ((result[2] * 1) < 1800)) {
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
                else if (($.inArray(month, month31) != -1) && day > 31) {
                    isValid = false;
                }
                else if (($.inArray(month, month30) != -1) && day > 30) {
                    isValid = false;
                }

                inputDate = new Date(result[2], month - 1, day);
            }
            else {

                isValid = false;
            }
        }

        return isValid;
    }

    function checkMandatory(elem, msg) {
        var myMandatory = document.getElementById(elem).value;
        if ($.trim(myMandatory) == "") {
            alert(msg);
            return false;
        }
        else {
            return true;
        }
    }

    function checkIfValidValues(sender) {
        var value = sender.value;

        if (sender.maxLength == 4 || sender.maxLength == 6 || sender.maxLength == 20) {
            var isNumeric = !isNaN(sender.value);
            value = (!isNumeric) ? "" : value;
        } else {
            value = value.replace(/[^a-zA-Z 0-9.,#@'()_-]/g, "");
        }

        sender.value = value;
    }

    function isValidAmount(amount) {

        if (amount.indexOf('.') > 0) {
            var parts = amount.toString().split('.');
            parts[0].length;
            if (parts[0].length > 12) {
                return false;
            } else {
                return true;
            }
        } else {
            if (amount.length > 12) {
                return false;
            } else {
                return true;
            }
        }
    }


    function roundElement(elem) {
        var amount = elem.value.toString().replace(/\$|\,/g, '');
        var roundedAmount = 0;
        if (isNaN(Number(amount))) {
            elem.value = '0.00';
        }
        else {
            elem.value = roundAmount(amount);
        }
    }

    function roundAmount(amount) {
        var returnAmount = 0;

        if (isValidAmount(amount)) {
            if (amount.indexOf('.') > -1) {
                var parts = amount.toString().split('.');

                if (parts[1].length === 1) {
                    returnAmount = addCommas(Number(parts[0])) + '.' + parts[1] + '0';

                    //number.value = amount;
                } else if (parts[1].length > 1) {
                    returnAmount = addCommas(Number(parts[0])) + '.' + parts[1].substring(0, 2);

                    //number.value = amount;
                } else if (parts[1].length == 0) {
                    returnAmount = addCommas(Number(amount)) + ".00";
                }
            } else {
                returnAmount = addCommas(Number(amount)) + ".00";
            }
        } else {
            returnAmount = "0.00";
        }

        if (returnAmount.indexOf('-') > -1) {
            var splitCap = returnAmount.split('-');
            returnAmount = '(' + splitCap[1] + ')';
        }

        return returnAmount;

    }

    function valForCompute(num) {
        return parseFloat(((num.indexOf(')') > 0 ? "-" : "") + num.replace(/[\(\)\,]/gi, "")) * 1);
    }

    function preciseCompute(numFloat) {
        return Math.round(numFloat * 100) / 100;
    }

    function sellingPrice(item, row){

        var rowNumber = row;
        
        var rowSelling = valForCompute(document.getElementById('frm1707A:txtS1C3SellingPriceI' + rowNumber).value);
        var rowCost = valForCompute(document.getElementById('frm1707A:txtS1C4CostI' + rowNumber).value);
        var rowGain = preciseCompute(rowSelling - rowCost);

        document.getElementById('frm1707A:txtS1C5CapitalGainsI' + rowNumber).value = roundAmount(rowGain.toString());

        computeSched1SellingPrice();
        computeSched1CapitalGains();

        if (document.getElementById(item.id).value != '0.00' && document.getElementById('frm1707A:txtS1I20TotalSellingPrice').value == 0) {
            alert("Total selling price should not exceed billion");
            $(this).val('0.00');
            $(this).focus();
        }

    }

    function sched1Cost(item,rowNumber){
        //added computation 9/22/2015

        var rowSelling = valForCompute(document.getElementById('frm1707A:txtS1C3SellingPriceI' + rowNumber).value);
        var rowCost = valForCompute(document.getElementById('frm1707A:txtS1C4CostI' + rowNumber).value);
        var rowGain = preciseCompute(rowSelling - rowCost);

        document.getElementById('frm1707A:txtS1C5CapitalGainsI' + rowNumber).value = roundAmount(rowGain.toString());

        computeSched1Cost();
        computeSched1CapitalGains();

        if (document.getElementById(item.id).value != '0.00' && document.getElementById('frm1707A:txtS1I20TotalCost').value == 0) {
            alert("Total cost should not exceed billion");
            $(this).val('0.00');
            $(this).focus();
        }
    }


    function sched1TaxPaid(item,rowNumber){
        computeSched1TaxPaid();

        if (document.getElementById(item.id).value != '0.00' && document.getElementById('frm1707A:txtS1I20TotalTaxPaid').value == 0) {
            alert("Total tax paid should not exceed billion");
            $(this).val('0.00');
            $(this).focus();
        }
    }


    function computeSched1SellingPrice() {
        var sum = 0;
        for (var i = 1; i < 8; i++) {
            sum += valForCompute(document.getElementById('frm1707A:txtS1C3SellingPriceI' + i).value);
            sum = preciseCompute(sum);
        }
        
        document.getElementById('frm1707A:txtS1I20TotalSellingPrice').value = roundAmount(sum.toString());
    }

    function computeSched1Cost() {
        var sum = 0;
        for (var i = 1; i < 8; i++) {
            sum += valForCompute(document.getElementById('frm1707A:txtS1C4CostI' + i).value);
            sum = preciseCompute(sum);
        }
        document.getElementById('frm1707A:txtS1I20TotalCost').value = roundAmount(sum.toString());
    }

    function computeSched1CapitalGains() {
        var sum = 0;
        for (var i = 1; i < 8; i++) {
            sum += valForCompute(document.getElementById('frm1707A:txtS1C5CapitalGainsI' + i).value);
            sum = preciseCompute(sum);
        }
        document.getElementById('frm1707A:txtS1I20TotalCapitalGains').value = roundAmount(sum.toString());
        document.getElementById('frm1707A:txtI12TotalCapitalGains').value = document.getElementById('frm1707A:txtS1I20TotalCapitalGains').value;

        computePart2Item14GainLoss();
    }

    function computeSched1TaxPaid() {
        var sum = 0;
        for (var i = 1; i < 8; i++) {
            sum += valForCompute(document.getElementById('frm1707A:txtS1C6TaxPaidI' + i).value);
            sum = preciseCompute(sum);
        }
        document.getElementById('frm1707A:txtS1I20TotalTaxPaid').value = roundAmount(sum.toString());
        document.getElementById('frm1707A:txtI16ATotalTaxPaid').value = document.getElementById('frm1707A:txtS1I20TotalTaxPaid').value;

        computePart2Item16CTaxPaid();
    }



    function Sched2SellingPrice(item,rowNumber){
        //added computation 9/22/2015

        var rowSelling = valForCompute(document.getElementById('frm1707A:txtS2C3SellingPriceI' + rowNumber).value);
        var rowCost = valForCompute(document.getElementById('frm1707A:txtS2C4CostI' + rowNumber).value);
        var rowLoss = preciseCompute(rowCost - rowSelling);

        document.getElementById('frm1707A:txtS2C5CapitalLossI' + rowNumber).value = roundAmount(rowLoss.toString());


        computeSched2SellingPrice();
        computeSched2CapitalLoss();

        if (document.getElementById(item.id).value != '0.00' && document.getElementById('frm1707A:txtS2I21TotalSellingPrice').value == 0) {
            alert("Total selling price should not exceed billion");
            $(this).val('0.00');
            $(this).focus();
        }

    }

    function Sched2Cost(item,rowNumber){
        //added computation 9/22/2015

        var rowSelling = valForCompute(document.getElementById('frm1707A:txtS2C3SellingPriceI' + rowNumber).value);
        var rowCost = valForCompute(document.getElementById('frm1707A:txtS2C4CostI' + rowNumber).value);
        var rowLoss = preciseCompute(rowCost - rowSelling);

        document.getElementById('frm1707A:txtS2C5CapitalLossI' + rowNumber).value = roundAmount(rowLoss.toString());


        computeSched2Cost();
        computeSched2CapitalLoss();

        if (document.getElementById(item.id).value != '0.00' && document.getElementById('frm1707A:txtS2I21TotalCost').value == 0) {
            alert("Total cost should not exceed billion");
            $(this).val('0.00');
            $(this).focus();
        }
    }

    function computeSched2SellingPrice() {
        var sum = 0;
        for (var i = 1; i < 5; i++) {
            sum += valForCompute(document.getElementById('frm1707A:txtS2C3SellingPriceI' + i).value);
            sum = preciseCompute(sum);
        }
        document.getElementById('frm1707A:txtS2I21TotalSellingPrice').value = roundAmount(sum.toString());
    }

    function computeSched2Cost() {
        var sum = 0;
        for (var i = 1; i < 5; i++) {
            sum += valForCompute(document.getElementById('frm1707A:txtS2C4CostI' + i).value);
            sum = preciseCompute(sum);
        }
        document.getElementById('frm1707A:txtS2I21TotalCost').value = roundAmount(sum.toString());
    }

    function computeSched2CapitalLoss() {
        var sum = 0;
        for (var i = 1; i < 5; i++) {
            sum += valForCompute(document.getElementById('frm1707A:txtS2C5CapitalLossI' + i).value);
            sum = preciseCompute(sum);
        }
        document.getElementById('frm1707A:txtS2I21TotalCapitalLoss').value = roundAmount(sum.toString());
        document.getElementById('frm1707A:txtI13TotalCapitalLoss').value = roundAmount(sum.toString());

        computePart2Item14GainLoss();
    }

    function computePart2Item14GainLoss() {
        var capitalGain = valForCompute(document.getElementById('frm1707A:txtI12TotalCapitalGains').value);
        var capitalLoss = valForCompute(document.getElementById('frm1707A:txtI13TotalCapitalLoss').value);
        var netCapital = preciseCompute(capitalGain - capitalLoss);
       
        document.getElementById('frm1707A:txtI14NetCapitalGainLoss').value = roundAmount(netCapital.toString());   //from computeSched2CapitalLoss()

        computePart2Item15TaxDue();
    }


    function computePart2Item15TaxDue() {

        var netCapital = valForCompute(document.getElementById('frm1707A:txtI14NetCapitalGainLoss').value); //from computePart2Item14GainLoss()
        var taxDue = 0;
        if (netCapital <= 100000) {
            taxDue = netCapital * (5 / 100);
            taxDue = preciseCompute(taxDue);
        }
        else {
            taxDue = 5000 + ((netCapital - 100000) * (10 / 100));
            taxDue = preciseCompute(taxDue);
        }

        document.getElementById('frm1707A:txtI15TaxDue').value = taxDue < 0 ? '0.00' : roundAmount(taxDue.toString());

        computePart2Item17TaxPayable();
    }

    function computePart2Item16CTaxPaid() {

        var taxPaidA = valForCompute(document.getElementById('frm1707A:txtI16ATotalTaxPaid').value);
        var taxPaidB = valForCompute(document.getElementById('frm1707A:txtI16BTotalTaxPaid').value);

        var totalTaxPaid = preciseCompute(taxPaidA + taxPaidB);
        document.getElementById('frm1707A:txtI16CTotalTaxPaid').value = roundAmount(totalTaxPaid.toString());

        computePart2Item17TaxPayable();
    }

    function computePart2Item17TaxPayable() {
        var taxDue = valForCompute(document.getElementById('frm1707A:txtI15TaxDue').value);
        var taxPaid = valForCompute(document.getElementById('frm1707A:txtI16CTotalTaxPaid').value);

        var taxPayable = preciseCompute(taxDue - taxPaid);
        
        document.getElementById('frm1707A:txtI17TaxStillPayable').value = roundAmount(taxPayable.toString());

        checkOverPaymentRadio();
        computePart2Item19TotalPayable();
    }


    $('input[id^="frm1707A\\:txtI18"]').blur(function () {
        computePart2Item18DPenalties();
    });

    function computePart2Item18DPenalties() {
        var I18A = valForCompute(document.getElementById('frm1707A:txtI18ASurcharge').value);
        var I18B = valForCompute(document.getElementById('frm1707A:txtI18BInterest').value);
        var I18C = valForCompute(document.getElementById('frm1707A:txtI18CCompromise').value);

        var I18D = preciseCompute(I18A + I18B + I18C);
        document.getElementById('frm1707A:txtI18DPenalties').value = roundAmount(I18D.toString());

        computePart2Item19TotalPayable();
    }


    function computePart2Item19TotalPayable() {
        var I17 = valForCompute(document.getElementById('frm1707A:txtI17TaxStillPayable').value); //From computePart2Item17TaxPayable()
        var I18D = valForCompute(document.getElementById('frm1707A:txtI18DPenalties').value); //From computePart2Item18DPenalties()

        var I19 = preciseCompute(I17 + I18D);


        if (I17 < 0 && I18D > 0) {
            I19 = I18D;
        }

        document.getElementById('frm1707A:txtI19TotalAmountPayable').value = roundAmount(I19.toString());

    }

    function validateSchedule1() {
        var isSched1Valid = validateSchedules(' Schedule 1', 'TblSchedule1', 'txtS1C1DateOfTransactionI', 'txtS1C2NameOfCorporateStockI', 'txtS1C3SellingPriceI', 'txtS1C4CostI', 'txtS1C5CapitalGainsI', true, false);
        if (!isSched1Valid) { return false; }

        var isSched2Valid = validateSchedules(' Schedule 2', 'TblSchedule2', 'txtS2C1DateOfTransactionI', 'txtS2C2NameOfCorporateStockI', 'txtS2C3SellingPriceI', 'txtS2C4CostI', 'txtS2C5CapitalLossI', false, false);
        if (!isSched2Valid) { return false; }

        var isSched1AdditionalValid = validateSchedules(' Schedule 1 Additional Items', 'tblModalSched1Iteration', 'txtS1C1DateOfTransaction_', 'txtS1C2NameOfCorporateStock_', 'txtS1C3SellingPrice_', 'txtS1C4Cost_', 'txtS1C5CapitalGains_', true, true);
        if (!isSched1AdditionalValid) { return false; }

        var isSched2AdditionalValid = validateSchedules(' Schedule 2 Additional Items', 'tblModalSched2Iteration', 'txtS2C1DateOfTransaction_', 'txtS2C2NameOfCorporateStock_', 'txtS2C3SellingPrice_', 'txtS2C4Cost_', 'txtS2C5CapitalLoss_', false, true);
        if (!isSched2AdditionalValid) { return false; }

        return true;

    }

    function recheckSchedDate(strmmddyyyy, yearEnd, rowNumber, scheduleName, yearFrom) {

        if (!validateDate(strmmddyyyy)) {
            alert('Please provide a valid date. (MM/DD/YYYY format) in Date of Transaction on row ' + rowNumber + scheduleName);
            return false;
        } else {

            var dateTrans = new Date(strmmddyyyy);
            var dateTransSplit = strmmddyyyy.toString().split('/');
            var dateTransYear = dateTransSplit[2];


            if (dateTransYear < 2001) {
                alert('The year should not be less than 2001 in Date of Transaction on row ' + rowNumber + scheduleName);
                return false;
            }
            else if (dateTrans > yearEnd) {
                alert('The Date of Transaction should not be greater than the Taxable Period on row ' + rowNumber + scheduleName);
                return false;
            }
            else if (dateTrans < yearFrom) {
                alert('The Date of Transaction should be in the range of up to one year until the Taxable Period on row ' + rowNumber + scheduleName);
                return false;
            }
            
        }

        return true;
    }

    function validateSchedules(scheduleName, tblId, dateFiled, corporateStock, sellingPrice, cost, gainOrLoss, isSched1, isForModal) {
        var dateFiledId = 'frm1707A:' + dateFiled;
        var corporateStockId = 'frm1707A:' + corporateStock;
        var sellingPriceId = 'frm1707A:' + sellingPrice;
        var costId = 'frm1707A:' + cost;
        var gainOrLossId = 'frm1707A:' + gainOrLoss;


        var scheduleRows = $('#' + tblId + ' input[id^="' + dateFiledId + '"]').length;

        var yearEnd = new Date(document.getElementById('frm1707A:txtI1YearEndMonth').value + '/' + document.getElementById('frm1707A:txtI1YearEndDay').value + '/' + document.getElementById('frm1707A:txtI1YearEndYear').value);
        var yearFrom = new Date(document.getElementById('frm1707A:txtI1YearEndMonth').value + '/' + document.getElementById('frm1707A:txtI1YearEndDay').value + '/' + (document.getElementById('frm1707A:txtI1YearEndYear').value - 1));

        for (var i = 1; i < (scheduleRows + 1) ; i++) {
            var numberOfEmptyInRow = 0;

            if ($('#' + tblId + ' input[id="' + dateFiledId + i + '"]').val() == '') {
                numberOfEmptyInRow++;
            }
            else {
                if (!recheckSchedDate($('#' + tblId + ' input[id="' + dateFiledId + i + '"]').val(), yearEnd, i, scheduleName, yearFrom)) {
                    return false;
                }
            }

            if ($('#' + tblId + ' input[id="' + corporateStockId + i + '"]').val() == '') {
                numberOfEmptyInRow++;
            }
            else {
                if (!isNaN($('#' + tblId + ' input[id="' + corporateStockId + i + '"]').val())) {
                    alert('Name of Corporate Stock should not be all numeric in row ' + i + scheduleName);
                    return false;
                }
            }

            if ($('#' + tblId + ' input[id="' + sellingPriceId + i + '"]').val() == '0.00') { numberOfEmptyInRow++; }
            if ($('#' + tblId + ' input[id="' + costId + i + '"]').val() == '0.00') { numberOfEmptyInRow++; }

            // 9/22/2015
            if ($('#' + tblId + ' input[id="' + sellingPriceId + i + '"]').val().indexOf('(') > -1 ||
                $('#' + tblId + ' input[id="' + costId + i + '"]').val().indexOf('(') > -1 ) {

                alert('There should be no negative value in row ' + i + scheduleName);
                return false;
            }


            if (i == 7 && isSched1 && !isForModal) {
                if (document.getElementById("frm1707A:txtS1C1DateOfTransactionI7").value == '' && $("#tblModalSched1Iteration tr").length > 0) {
                    numberOfEmptyInRow--;
                }
            }

            if (i == 4 && !isSched1 && !isForModal) {
                if (document.getElementById("frm1707A:txtS2C1DateOfTransactionI4").value == '' && $("#tblModalSched2Iteration tr").length > 0) {
                    numberOfEmptyInRow--;
                }
            }

            if (numberOfEmptyInRow != 0 && numberOfEmptyInRow != 4) {
                alert('There is an empty item on ' + scheduleName + '. Please fill in all items in row ' + i);
                return false;
            }

            if (isSched1 && !isForModal) {
                if ($('#' + tblId + ' input[id="frm1707A:txtS1C6TaxPaidI' + i + '"]').val() !== '0.00' && numberOfEmptyInRow > 0) {
                    alert('There is an empty item on ' + scheduleName + '. Please fill in all items in row ' + i);
                    return false;
                }

                if ($('#' + tblId + ' input[id="' + gainOrLossId + i + '"]').val().indexOf('(') > -1){
        alert('Your Capital Gains is negative in row ' + i + scheduleName + "\n Please move and encode this in Schedule 2");                    
                    return false;
    }

            }
      else if(!isSched1 && !isForModal){
               if ($('#' + tblId + ' input[id="' + gainOrLossId + i + '"]').val().indexOf('(') > -1){
        alert('Your Capital Loss is negative in row ' + i + scheduleName + "\n Please move and encode this in Schedule 1");
                    return false;
    }
            }

            if (isForModal) {
                if (isSched1) {
                    if ($('#' + tblId + ' input[id="frm1707A:txtS1C6TaxPaid_' + i + '"]').val() !== '0.00' && numberOfEmptyInRow > 0) {
                        alert(' Please fill in all items in row ' + i + scheduleName);
                        return false;
                    }

       if ($('#' + tblId + ' input[id="' + gainOrLossId + i + '"]').val().indexOf('(') > -1){
            alert('Your Capital Gains is negative in row ' + i + scheduleName + "\n Please move and encode this in Schedule 2");
                        return false;
       }
                }
    else if(!isSched1){
                   if ($('#' + tblId + ' input[id="' + gainOrLossId + i + '"]').val().indexOf('(') > -1){
            alert('Your Capital Loss is negative in row ' + i + scheduleName + "\n Please move and encode this in Schedule 1");
                       return false;
       }
                }
    

                if (numberOfEmptyInRow != 0) {
                    alert('Row ' + i + ' is empty. Please remove row or fill in all items first in' + scheduleName);
                    return false;
                }
            }

        }

        return true;

    }


    function validateSched1and2() {

        if (document.getElementById('frm1707A:txtS1I20TotalSellingPrice').value == '0.00' &&
            document.getElementById('frm1707A:txtS1I20TotalCost').value == '0.00' &&
            
            document.getElementById('frm1707A:txtS2I21TotalSellingPrice').value == '0.00' &&
            document.getElementById('frm1707A:txtS2I21TotalCost').value == '0.00' //&&
            ) {

            return false;
        }
        else {
            return true;
        }
    }



    function validateAll() {

        if (!validateYearEnd()) return false;

        if (document.getElementById('frm1707A:rdoI4ATCII030').checked == false && document.getElementById('frm1707A:rdoI4ATCIC110').checked == false) {
            alert('Please select an ATC Code on Item 4.');
            return false;
        }

        if (document.getElementById('frm1707A:rdoI4ATCII030').checked == true && document.getElementById('frm1707A:rdoI1Fiscal').checked == true) {
            alert("If you are filing as Individual, please select Calendar on item 1.");
            return false;
        }

        if (document.getElementById('frm1707A:rdoI6RDO').value == "000") { alert('Please provide a valid RDO Code on Item 6.'); return false; }

        if (!checkMandatory('frm1707A:txtI8RegisteredName', 'Please provide a valid Line of Business/Occupation on Item 8.')) return false;

        if (!checkMandatory('frm1707A:txtI9RegisteredAddress', 'Please provide a valid Registered Address on Item 9.')) return false;

        if (document.getElementById('frm1707A:txtI10ZipCode').value == '') {
            alert('Zip Code is required, please validate your registration information and update accordingly using BIR Form 1905, if necessary.');
        }

        if (document.getElementById('frm1707A:rdoI11TaxTreatyYes').checked == false && document.getElementById('frm1707A:rdoI11TaxTreatyNo').checked == false) {
            alert("Please choose at least one from item 11.");
            return false;
        }

        if (document.getElementById('frm1707A:rdoI11TaxTreatyYes').checked == true && $.trim(document.getElementById('frm1707A:txtI11ASpecify').value) == '') {
            alert("Please specify the tax relief on item 11A.");
            return false;
        }        

        if (!validateSched1and2()) {
            alert('You need to have at least one value on either Schedule 1 or Schedule 2.');
            return false;
        }

        if (!validateSchedule1()) {
            return false;
        }

  if ((document.getElementById('frm1707A:txtI17TaxStillPayable').value.toString().indexOf(')') > -1) && document.getElementById('frm1707A:rdoI19Refund').checked == false &&
            document.getElementById('frm1707A:rdoI19TaxCreditCertificate').checked == false) {

            alert('You have a negative value for Part 2 Item 17. Please select Refund or Tax Credit Certificate from Item 19.');
            return false;
        }

        return true;
    }



    function validate() {
        if (validateAll()) {
            alert("Validation successful. Click on Edit if you wish to modify your entries.");
            getDisabledText();
            disableAllControl();
            document.getElementById("frm1707A:btnEdit").disabled = false;
            document.getElementById("btnUpload").disabled = false;
            document.getElementById("btnPrint").disabled = false; 
            document.getElementById("frm1707A:btnValidate").disabled = true;
            document.getElementById('btnSave').disabled = false;
            document.getElementById('frm1707A:btnFinalCopy').disabled = false;
            document.getElementById('btnOpenSched1CSV').disabled = true;
            document.getElementById('btnOpenSched2CSV').disabled = true;
            return;

        } else {
            document.getElementById("frm1707A:btnEdit").disabled = true;
            document.getElementById("btnUpload").disabled = true;
            document.getElementById("frm1707A:btnFinalCopy").disabled = true;
            document.getElementById("btnPrint").disabled = true;
        }
    }
    
    var disableElem = true;
    var enableElem = false;
    function getDisabledText() {
        $("input, select").removeClass("disabledInputs");
        $("input:disabled, select:disabled").addClass("disabledInputs");

    }

    function disableAllControl() {
        $("input:text, select", $("#containerPage")).attr("disabled", true);
        $("input:checkbox, input:radio").attr("disabled", true);
        $('input[disabled]').css('background-color', '#EBEBE4');
       
        disableElem;
        enableElem;
    }

    function enableAllControl() {

        $("input:text, select", $("#containerPage")).attr("disabled", false);
        $("input:button, input:checkbox, input:radio").attr("disabled", false);
       
        $(".disabledInputs").attr("disabled", true);
        $('input[type="text"]:not(:disabled)').css('background-color', 'white');

        document.getElementById("frm1707A:btnValidate").disabled = false;
        document.getElementById('btnOpenSched1CSV').disabled = false;
        document.getElementById('btnOpenSched2CSV').disabled = false;
       
        disableElem;
        enableElem;
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
    var p3ReturnPeriodMonth = "";
    var p3ReturnPeriodDay = "";
    var p3ReturnPeriodYear = "";

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
    var p3TPZip = ""; var globalEmail = "";
    /*----------------------------------*/
    var d = document, XMLBGFile = '', data = '', XMLFile = '', XMLATCFile = '', msg = d.getElementById('msg');
    var loader = d.getElementById('loader');
    /*----------------------------------*/
    setTimeout("sleeptime()", 200);

    function sleeptime() {
        
        init();

        var xmlFileName = document.getElementById('file_name').value;
        fileName = xmlFileName;
        if (fileName != null && fileName.indexOf('.xml') > -1) {
            loadXML(fileName);
            existingXMLFileName = fileName;

            if (gIsReadOnly) {
                window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false; d.getElementById('btnPrint').disabled = false;  checkMoreAndOthers();", 1000);
            }
        } else {
            window.setTimeout("$('#loader').hide('blind');", 200);
            isNewEntry = true;
        }

        enableEmptyFromMain();
        getDisabledText();
        

        $('.txtAmount, .schedAmount').each(function () {
            return roundElement(this);
        });

        checkCalendarFiscalOnLoad();
        checkTreaty();
        checkAmendedForItem16A();
        checkOverPaymentRadio();
        checkMoreAndOthers();


        $('input[readonly="readonly"]').css({ 'background': '#efefef' });


        document.getElementById("frm1707A:txtI9RegisteredAddress").value = document.getElementById("frm1707A:txtI9RegisteredAddress").value.toUpperCase();
        document.getElementById("frm1707A:txtI8RegisteredName").value = document.getElementById("frm1707A:txtI8RegisteredName").value.toUpperCase();;
        window.setTimeout("checkFinalCopyBtn('1707A')", 2000);
    }

    function init() {

        
        @if($action != 'view')
        document.getElementById("frm1707A:btnEdit").disabled = true;
        document.getElementById("btnUpload").disabled = true;
        document.getElementById("frm1707A:btnFinalCopy").disabled = true;
        @endif
        document.getElementById('frm1707A:txtI1YearEndYear').value = new Date().getFullYear() - 1;

    }

    var rdoList = new Array();

    var XMLrdoFile = ''; //Object Type

    var rdoCount = 0;

    function loadXMLrdo(fileLocation) {
        try {
            //This will load the Region file with filename 'fileLocation' if it exists
            var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
            XMLrdoFile = fsoXML.OpenTextFile(fileLocation, 1);

            if (XMLrdoFile.AtEndOfStream)
                data = "";
            else {
                var responseRdo = d.getElementById('responseRdo'); //render file and write to hidden div
                responseRdo.innerHTML = XMLrdoFile.ReadAll(); //remove XML tag
                //responseRdo = replaceHtml(responseRdo, XMLrdoFile.ReadAll()); //Pattern:  el = replaceHtml(el, newHtml)
            }
            XMLrdoFile.Close(); //alert( responseRdo.innerHTML ); //Debug           
            loadRdo(); /*This will load ATC onto an array*/
        } catch (e) {
            msg.innerHTML = ""; //"Region File not Found.";
        } //this will Alert File not Found if it doesn't exist
    }

    function loadRdo() {
        /*This will load data onto an array*/
        var response = document.getElementById("responseRdo");
        var rdoCnt = String(response.innerHTML).split('rdoCount=');
        rdoCount = rdoCnt[1];
        var k = 0;
        //loads rdoList from xml
        for (var i = 1; i <= rdoCount; i++) {
            var rdo = String(response.innerHTML).split('rdo' + i + ':');
            var rdoStr = rdo[1];
            //Ensure that before writing to rdoPropertyJS the formType 1707A is traceable in rdoStr
            if (rdoStr.indexOf('1707A') >= 0) {
                var rdoValues = rdoStr.split('~');
                var rdoCode = rdoValues[0];
                var description = rdoValues[1];
                var objRdo = new rdoPropertyJS(rdoCode, description);
                rdoList[k] = objRdo;
                k++;
            } else {
                //alert('1707A not found in array #'+i);
                continue;
            }
        }
    }

    function rdoPropertyJS(rdoCode, description) {
        this.rdoCode = rdoCode;
        this.description = description;
    }
    

    function loadData() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");
        var elem = d.getElementById('frmMain').elements;
        var counter = 0;
        //count array
        if ((response.innerHTML).indexOf('ModalSched1Length') != -1) {
            counter = (response.innerHTML).split('ModalSched1Length=')[1];
            // alert(counter);
            for (var i = 0; i < counter; i++) {
                modalSched1Add();
            }
        }

        if ((response.innerHTML).indexOf('ModalSched2Length') != -1) {
            counter = (response.innerHTML).split('ModalSched2Length=')[1];
            // alert(counter);
            for (var i = 0; i < counter; i++) {
                modalSched2Add();
            }
        }
        var rdoCode;
        for (var i = 0; i < elem.length; i++) {
            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&           
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    var fieldVal = String($("#response").html()).split(elem[i].id + '=');
                    if (elem[i].id == 'frm1707A:txtI8RegisteredName' || elem[i].id == 'frm1707A:txtLineOfBusiness' || elem[i].id == 'frm1707A:txtI9RegisteredAddress') {
                        elem[i].value = unescape(fieldVal[1]);
                    }
                    else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
                    else {
                        elem[i].value = fieldVal[1]; //all select-one and text values               
                    }
                    if (elem[i].id == 'frm1707A:rdoI6RDO') {
                        rdoCode = fieldVal[1];
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

            }
        }

        var data = "<select id='frm1707A:rdoI6RDO' name='frm1707A:rdoI6RDO' disabled='disabled' size='1'><option value='" + rdoCode + "' selected>" + rdoCode + "</option>";
        $('#rdoContainer').html(data);

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
            if (response.innerHTML.indexOf("All Rights Reserved BIR 2014.0") >= 0) {
                gIsReadOnly = true;
            }
            if (gIsReadOnly) {
                d.getElementById('frm1707A:btnValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
            }
            window.setTimeout("$('#loader').hide('blind');", 2000);
        } catch (e) {
            
        } 
    }

    function loadWFData() {
        var response = d.getElementById("response");
        var elem = d.getElementById('frmMain').elements;
        for (var i = 0; i < elem.length; i++) {
            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&           
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    var fieldVal = String(response.innerHTML).split(elem[i].id + '>');
                    // elem[i].value = fieldVal[1]; //all select-one and text values         
                    if (fieldVal != null && fieldVal.length > 1) {
                        elem[i].value = fieldVal[1].substring(0, fieldVal[1].indexOf("</"));
                    }
                }
                if (elem[i].type == 'radio') {
                    var rdoVal = String(response.innerHTML).split(elem[i].id + '>');
                    if (rdoVal[1] == 'true') {
                        // elem[i].checked = rdoVal[1];
                        if (rdoVal != null && rdoVal.length > 1) {
                            elem[i].value = rdoVal[1].substring(0, rdoVal[1].indexOf("</"));
                        }
                        //elem[i].onclick(); dgarfin: commented since it hinders the rest of the elements to load its value
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
                d.getElementById('frm1707A:btnValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
        }

    }

    function initialValidateBeforeSave() {
       
        if (d.getElementById('frm1707A:rdoI6RDO').value === "000") { alert("Please select an RDO Code on Item 6."); return false; }
        if (!checkMandatory("frm1707A:txtI8RegisteredName", "Please enter a valid name on Item 8.")) return false;
        if (!checkMandatory("frm1707A:txtI9RegisteredAddress", "Please enter a valid Registered Address on Item 9.")) return false;
        if (!validateYearEnd()) return false;
        $('#ModalSched1Length').val($("#tblModalSched1Iteration tr").length);
        $('#ModalSched2Length').val($("#tblModalSched2Iteration tr").length);
        return true;
    }


    xmlFileForCreate2X = new Date();
    var rbURL = getURL();
    function createRecord() {
        var p3TPClass = true;
        createURL = rbURL + "/rest/api/create2?sessionId=" + sessionId + "&objName=upload1&tax_due=" + p3BasicTax + "&total_penalties=" + p3TotalPenalties + "&total_amount_payable=" + p3TotalAmountPayable + "&tp_zip=" + p3TPZip + "&tp_addr=" + p3TPAddress + "&tp_telnum=" + p3TPTelNum + "&tp_name=" + p3TPName + "&tp_lob=" + p3TPLineBus + "&tp_class=" + p3TPClass + "&tp_rdo_code=" + p3TPRDOCode + "&tp_branch_code=" + p3TPBranchCode + "&tp_tin=" + p3TPTIN + "&surcharge=" + p3Surcharge + "&compromise=" + p3Compromise + "&interest=" + p3Interest + "&is_amended_return=" + p3IsAmended + "&return_period=" + p3ReturnPeriod + "&return_period_end=" + p3ReturnPeriodEnd + "&gross_sales=" + p3GrossSales + "&useIds=false&form_type_text=1707A-Jun2001&load=" + xmlFileForCreate2X; 

        xmlHttp.open("POST", createURL, false);
        xmlHttp.send();

        var respXMLMsg = xmlHttp.responseText;

        create2Id = respXMLMsg;
        create2Id = create2Id.split('id=');
        create2Id = String(create2Id[1]).replace(/"/gi, '');
        create2Id = String(parseInt(create2Id)).replace(/ /, '');

        x.document.theForm.submit();
        uploadXMLFile();
    }

    function uploadXMLFile() {
        var binDataURL;

        if (savedReturn != null && savedReturn.length > 0) {
            var intervalCnt = 4000;

            var xmlFileForUpload = savedReturn.replace(/&nbsp;/g, "<span style='padding-left:0.25em'> </span>");
            xmlFileForUpload = xmlFileForUpload.replace(/&amp;/g, "AND");
            xmlFileForUpload = xmlFileForUpload.replace(/&/g, "_AND_");
            xmlFileForUpload = xmlFileForUpload.replace(/\+/g, "_PLUS_");
            var savedReturnLen = xmlFileForUpload.length;

            var numOfSRLoops = Math.ceil(savedReturnLen * 1 / intervalCnt);
            var loopSRCnt = numOfSRLoops + 1;
            var startSRPost = 0;
            var endSRPost = intervalCnt;
            var partSRCnt = 1;

            for (var i = 0; i < numOfSRLoops; i++) {

                binDataURL = rbURL + "/rest/api/create2?sessionId=" + sessionId + "&objName=submit_return_data&useIds=false&index_=" + partSRCnt + "&name=1707A_part" + partSRCnt + "&R95607586=" + create2Id + "&content=" + xmlFileForUpload.substring(startSRPost, endSRPost);

                var binDataUploadXML = new XMLHttpRequest();
                
                binDataUploadXML.open("POST", encodeURI(binDataURL), false);
                binDataUploadXML.send();
                
                startSRPost = startSRPost + intervalCnt;
                if (i == numOfSRLoops - 1) {
                    endSRPost = savedReturnLen;
                } else {
                    endSRPost = endSRPost + intervalCnt;
                }
                partSRCnt++;
               
            }
            cancel();
            getDisabledText();
            disableAllElementIDs();
            
            var redirectURL = x.window.location.href;
            var formURL = getDisplayPageURL(redirectURL, create2Id);
            if (parseInt(create2Id) > 0) window.open(formURL, 'Login_Screen', 'resizable=1,scrollbars=1,height=850,width=900');
        } else {
            alert("Tax Return file does not exists.  Cannot proceed with submission.");
            return;
        }

       
        document.getElementById("btnUpload").disabled = false;

    }
   

    $('#btnOpenSched1CSV').click(function () {
        $('#divCSVReaderSched1').show('fade');
        $('#container').hide('blind');
    });


    $('#btnOpenSched2CSV').click(function () {
        $('#divCSVReaderSched2').show('fade');
        $('#container').hide('blind');
    });


    $('#btnSched1CSVClose').click(function () {
        $('#container').show('fade');
        $('#divCSVReaderSched1').hide('blind');
    });


    $('#btnSched2CSVClose').click(function () {
        $('#container').show('fade');
        $('#divCSVReaderSched2').hide('blind');
    });


    $("#btnSched1CSVReader").click(function () {
        var isParsed = parseFilesTocsvRead('sched1files');
        if (isParsed) {
            setTimeout('checkCSVData(1);', 400);
        }
    });

    $("#btnSched2CSVReader").click(function () {
        var isParsed = parseFilesTocsvRead('sched2files');
        if (isParsed) {
            setTimeout('checkCSVData(2);', 400);
        }
    });

    function checkCSVData(sched) {
        var possibleTotalSellingPrice = sched == 1 ? document.getElementById('frm1707A:txtS1I20TotalSellingPrice').value : document.getElementById('frm1707A:txtS2I21TotalSellingPrice').value;
        var possibleCost = sched == 1 ? document.getElementById('frm1707A:txtS1I20TotalCost').value : document.getElementById('frm1707A:txtS2I21TotalCost').value;
        var possibleCapitalGainLoss = sched == 1 ? document.getElementById('frm1707A:txtS1I20TotalCapitalGains').value : document.getElementById('frm1707A:txtS2I21TotalCapitalLoss').value;
        var possibleTaxPaid = sched == 1 ? document.getElementById('frm1707A:txtS1I20TotalTaxPaid').value : '0.00';

        possibleTotalSellingPrice = valForCompute(possibleTotalSellingPrice);
        possibleCost = valForCompute(possibleCost);
        possibleCapitalGainLoss = valForCompute(possibleCapitalGainLoss);
        possibleTaxPaid = valForCompute(possibleTaxPaid);

        var isOkItems = checkCSVDataItems(sched);
        if (isOkItems) {

            var answer = confirm("All data is valid. Would you like to add these to the table? \n Capital Gains/Loss will be recomputed. This can't be undone.");
            if (answer == true) {
                addToTable(sched);
                $('#container').show('fade');
                $('#divCSVReaderSched1').hide('blind');
                $('#divCSVReaderSched2').hide('blind');
                $('#sched1files').val('');
                $('#sched2files').val('');
            }
            else {
                return;
            }
        }

        function checkCSVDataItems(csvSched) {
            var csvLength = csvRead.length;

            for (var i = 0; i < csvLength; i++) {

                var csvDataRow = csvRead[i].split(',');
                var rowMsg = i + 1;

                if (csvSched == 1) {
                    if (csvDataRow.length != 6) {
                        alert('The csv file has invalid number of columns in row ' + rowMsg);
                        return false;
                    }
                }
                else if (csvSched == 2) {
                    if (csvDataRow.length != 5) {
                        alert('The csv file has invalid number of columns in row ' + rowMsg);
                        return false;
                    }
                }

                if ($.trim(csvDataRow[0]) == '' || !validateDate(csvDataRow[0])) {
                    alert('Please provide a valid date (MM/DD/YYYY format) for Column 1 (Date Of Transaction) in row ' + rowMsg);
                    return false;
                }

                var dateTransSplit = csvDataRow[0].toString().split('/');
                var dateTransYear = dateTransSplit[2];
                if (dateTransYear < 2001) {
                    alert('The year should not be less than 2001 for Column 1 (Date Of Transaction) in row ' + rowMsg);
                    return false;
                }


                if ($.trim(csvDataRow[1]) == '') {
                    alert('Please provide a value for Column 2 (Name of Corporate Stock) in row ' + rowMsg);
                    return false;
                }
                else if (!isNaN(csvDataRow[1])) {
                    alert('The value for Column 2 (Name of Corporate Stock) should not be all numbers in row ' + rowMsg);
                    return false;
                }

                if (!numericCheck(csvDataRow[2], '3 (Selling Price)', rowMsg)) { return false; }
                if (!numericCheck(csvDataRow[3], '4 (Cost)', rowMsg)) { return false; }

                possibleTotalSellingPrice += valForCompute(roundAmount(csvDataRow[2].toString()));
                if (roundAmount(possibleTotalSellingPrice.toString()) == '0.00') {
                    alert('Value for Column 3 (Selling Price) could cause the total to exceed billions in row ' + rowMsg);
                    return false;
                }

                possibleCost += valForCompute(roundAmount(csvDataRow[3].toString()));
                if (roundAmount(possibleCost.toString()) == '0.00') {
                    alert('Value for Column 4 (Cost) could cause the total to exceed billions in row ' + rowMsg);
                    return false;
                }

                possibleCapitalGainLoss += valForCompute(roundAmount(csvDataRow[4].toString()));
                if (roundAmount(possibleCapitalGainLoss.toString()) == '0.00') {
                    alert('Value for Column 5 (' + gainOrLoss + ') could cause the total to exceed billions in row ' + rowMsg);
                    return false;
                }

                if (sched == 1) {
                    possibleTaxPaid += valForCompute(roundAmount(csvDataRow[5].toString()));
                    if (roundAmount(possibleTaxPaid.toString()) == '0.00') {
                        alert('Value for Column 5 (TaxPaid) could cause the total to exceed billions in row ' + rowMsg);
                        return false;

                    }
                }
            }

            return true;
        }

        function numericCheck(csvDataRowNumItem, itemName, row) {

            if (isNaN(Number(csvDataRowNumItem))) {
                alert('Column ' + itemName + ' should be numeric only in row ' + row);
                return false;
            }
            else if (csvDataRowNumItem.indexOf('-') != -1) {
                alert('Column ' + itemName + ' should not be a negative value in row ' + row);
                return false;
            }
            else if (roundAmount(csvDataRowNumItem) == '0.00') {
                alert('Column ' + itemName + ' should have a value in row ' + row);
                return false;
            } else {
                return true;
            }

        }


    }


    function addToTable(schedNumber) {
        var csvLength = csvRead.length;

        if (schedNumber == 1) {
            addCSVToTable1();
        }
        else if (schedNumber == 2) {
            addCSVToTable2();
        }

        function addCSVToTable1() {
            var csvLength = csvRead.length;
            var csvIdx = 0;
            var trLength = $("#tblModalSched1Iteration tr").length;

            var sched1Idx = 1;

            for (sched1Idx; sched1Idx < 8 && csvIdx < csvLength ; sched1Idx++) {

                if (document.getElementById('frm1707A:txtS1C1DateOfTransactionI' + sched1Idx).value == '' &&
                    document.getElementById('frm1707A:txtS1C2NameOfCorporateStockI' + sched1Idx).value == '' &&
                    document.getElementById('frm1707A:txtS1C3SellingPriceI' + sched1Idx).value == '0.00' &&
                    document.getElementById('frm1707A:txtS1C4CostI' + sched1Idx).value == '0.00' &&
                    document.getElementById('frm1707A:txtS1C5CapitalGainsI' + sched1Idx).value == '0.00' &&
                    document.getElementById('frm1707A:txtS1C6TaxPaidI' + sched1Idx).value == '0.00') {

                    var csvDataRow = csvRead[csvIdx].split(',');

                    document.getElementById('frm1707A:txtS1C1DateOfTransactionI' + sched1Idx).value = csvDataRow[0];
                    document.getElementById('frm1707A:txtS1C2NameOfCorporateStockI' + sched1Idx).value = csvDataRow[1].toUpperCase();

                    //add computation for gains 9/22/2015
                    var csvS1SellingPrice = valForCompute(csvDataRow[2].toString());
                    var csvS1Cost = valForCompute(csvDataRow[3].toString());
                    var csvS1Gains = preciseCompute(csvS1SellingPrice - csvS1Cost);

                    document.getElementById('frm1707A:txtS1C3SellingPriceI' + sched1Idx).value = roundAmount(csvS1SellingPrice.toString());
                    document.getElementById('frm1707A:txtS1C4CostI' + sched1Idx).value = roundAmount(csvS1Cost.toString());
                    
                    
                    document.getElementById('frm1707A:txtS1C5CapitalGainsI' + sched1Idx).value = roundAmount(csvS1Gains.toString());

                    document.getElementById('frm1707A:txtS1C6TaxPaidI' + sched1Idx).value = roundAmount(csvDataRow[5].toString());

                    csvIdx++;
                }
            }

            if (csvIdx < csvLength && trLength == 0) {
                modalSched1Add();
                document.getElementById("frm1707A:txtS1C1DateOfTransaction_1").value = document.getElementById("frm1707A:txtS1C1DateOfTransactionI7").value;

                document.getElementById("frm1707A:txtS1C2NameOfCorporateStock_1").value = document.getElementById("frm1707A:txtS1C2NameOfCorporateStockI7").value;
                document.getElementById("frm1707A:txtS1C3SellingPrice_1").value = document.getElementById("frm1707A:txtS1C3SellingPriceI7").value;
                document.getElementById("frm1707A:txtS1C4Cost_1").value = document.getElementById("frm1707A:txtS1C4CostI7").value;
                document.getElementById("frm1707A:txtS1C5CapitalGains_1").value = document.getElementById("frm1707A:txtS1C5CapitalGainsI7").value;
                document.getElementById("frm1707A:txtS1C6TaxPaid_1").value = document.getElementById("frm1707A:txtS1C6TaxPaidI7").value;


                trLength++;
            }

            var trToAdd = csvLength - csvIdx;

            for (var i = 0; i < trToAdd; ++i) {
                modalSched1Add();
            }

            for (csvIdx; csvIdx < csvLength; csvIdx++) {
                trLength++;
                var csvDataRow = csvRead[csvIdx].split(',');

                document.getElementById("frm1707A:txtS1C1DateOfTransaction_" + trLength).value = csvDataRow[0];
                document.getElementById("frm1707A:txtS1C2NameOfCorporateStock_" + trLength).value = csvDataRow[1].toUpperCase();
                
                
                //add computation for gains 9/22/2015
                var csvS1MSellingPrice = valForCompute(csvDataRow[2].toString());
                var csvS1MCost = valForCompute(csvDataRow[3].toString());
                var csvS1MGains = preciseCompute(csvS1MSellingPrice - csvS1MCost);

                document.getElementById("frm1707A:txtS1C3SellingPrice_" + trLength).value = roundAmount(csvS1MSellingPrice.toString());
                document.getElementById("frm1707A:txtS1C4Cost_" + trLength).value = roundAmount(csvS1MCost.toString());

                document.getElementById("frm1707A:txtS1C5CapitalGains_" + trLength).value = roundAmount(csvS1MGains.toString());



                document.getElementById("frm1707A:txtS1C6TaxPaid_" + trLength).value = roundAmount(csvDataRow[5].toString());

            }

            if (trLength > 0) {
                modalSched1Subtotal();

                document.getElementById("frm1707A:txtS1C1DateOfTransactionI7").value = '';
                document.getElementById("frm1707A:txtS1C2NameOfCorporateStockI7").value = 'OTHERS';
                document.getElementById("frm1707A:txtS1C3SellingPriceI7").value = document.getElementById("frm1707A:txtS1ModalTotalSellingPrice").value;
                document.getElementById("frm1707A:txtS1C4CostI7").value = document.getElementById("frm1707A:txtS1ModalTotalCost").value;
                document.getElementById("frm1707A:txtS1C5CapitalGainsI7").value = document.getElementById("frm1707A:txtS1ModalTotalCapitalGains").value;
                document.getElementById("frm1707A:txtS1C6TaxPaidI7").value = document.getElementById("frm1707A:txtS1ModalTotalTaxPaid").value;

                document.getElementById("frm1707A:txtS1C1DateOfTransactionI7").disabled = true;
                document.getElementById("frm1707A:txtS1C2NameOfCorporateStockI7").disabled = true;
                document.getElementById("frm1707A:txtS1C3SellingPriceI7").disabled = true;
                document.getElementById("frm1707A:txtS1C4CostI7").disabled = true;
                //document.getElementById("frm1707A:txtS1C5CapitalGainsI7").disabled = true;
                document.getElementById("frm1707A:txtS1C6TaxPaidI7").disabled = true;


                document.getElementById("btnSched1More").disabled = false;
            }

            computeSched1SellingPrice();
            computeSched1Cost();
            computeSched1CapitalGains();
            computeSched1TaxPaid();
        }

        function addCSVToTable2() {
            var csvLength = csvRead.length;
            var csvIdx = 0;
            var trLength = $("#tblModalSched2Iteration tr").length;

            var sched2Idx = 1;

            for (sched2Idx; sched2Idx < 5 && csvIdx < csvLength ; sched2Idx++) {


                if (document.getElementById('frm1707A:txtS2C1DateOfTransactionI' + sched2Idx).value == '' &&
                    document.getElementById('frm1707A:txtS2C2NameOfCorporateStockI' + sched2Idx).value == '' &&
                    document.getElementById('frm1707A:txtS2C3SellingPriceI' + sched2Idx).value == '0.00' &&
                    document.getElementById('frm1707A:txtS2C4CostI' + sched2Idx).value == '0.00' &&
                    document.getElementById('frm1707A:txtS2C5CapitalLossI' + sched2Idx).value == '0.00') {


                    var csvDataRow = csvRead[csvIdx].split(',');

                    document.getElementById('frm1707A:txtS2C1DateOfTransactionI' + sched2Idx).value = csvDataRow[0];
                    document.getElementById('frm1707A:txtS2C2NameOfCorporateStockI' + sched2Idx).value = csvDataRow[1].toUpperCase();

                    //add computation for gains 9/22/2015
                    var csvS2SellingPrice = valForCompute(csvDataRow[2].toString());
                    var csvS2Cost = valForCompute(csvDataRow[3].toString());
                    var csvS2Loss = preciseCompute(csvS2Cost - csvS2SellingPrice);

                    document.getElementById('frm1707A:txtS2C3SellingPriceI' + sched2Idx).value = roundAmount(csvS2SellingPrice.toString());
                    document.getElementById('frm1707A:txtS2C4CostI' + sched2Idx).value = roundAmount(csvS2Cost.toString());

                    document.getElementById('frm1707A:txtS2C5CapitalLossI' + sched2Idx).value = roundAmount(csvS2Loss.toString());

                    csvIdx++;
                }
            }

            if (csvIdx < csvLength && trLength == 0) {
                modalSched2Add();
                document.getElementById("frm1707A:txtS2C1DateOfTransaction_1").value = document.getElementById("frm1707A:txtS2C1DateOfTransactionI4").value;

                document.getElementById("frm1707A:txtS2C2NameOfCorporateStock_1").value = document.getElementById("frm1707A:txtS2C2NameOfCorporateStockI4").value;
                document.getElementById("frm1707A:txtS2C3SellingPrice_1").value = document.getElementById("frm1707A:txtS2C3SellingPriceI4").value;
                document.getElementById("frm1707A:txtS2C4Cost_1").value = document.getElementById("frm1707A:txtS2C4CostI4").value;
                document.getElementById("frm1707A:txtS2C5CapitalLoss_1").value = document.getElementById("frm1707A:txtS2C5CapitalLossI4").value;

                trLength++;
            }

            var trToAdd = csvLength - csvIdx;

            for (var i = 0; i < trToAdd; ++i) {
                modalSched2Add();
            }

            for (csvIdx; csvIdx < csvLength; csvIdx++) {
                trLength++;
                var csvDataRow = csvRead[csvIdx].split(',');

                document.getElementById("frm1707A:txtS2C1DateOfTransaction_" + trLength).value = csvDataRow[0];
                document.getElementById("frm1707A:txtS2C2NameOfCorporateStock_" + trLength).value = csvDataRow[1].toUpperCase();                

                //add computation for gains 9/22/2015
                var csvS2MSellingPrice = valForCompute(csvDataRow[2].toString());
                var csvS2MCost = valForCompute(csvDataRow[3].toString());
                var csvS2MLoss = preciseCompute(csvS2MCost - csvS2MSellingPrice);

                document.getElementById("frm1707A:txtS2C3SellingPrice_" + trLength).value = roundAmount(csvS2MSellingPrice.toString());
                document.getElementById("frm1707A:txtS2C4Cost_" + trLength).value = roundAmount(csvS2MCost.toString());

                document.getElementById("frm1707A:txtS2C5CapitalLoss_" + trLength).value = roundAmount(csvS2MLoss.toString());
            }

            if (trLength > 0) {
                modalSched2Subtotal();

                document.getElementById("frm1707A:txtS2C1DateOfTransactionI4").value = '';
                document.getElementById("frm1707A:txtS2C2NameOfCorporateStockI4").value = 'OTHERS';
                document.getElementById("frm1707A:txtS2C3SellingPriceI4").value = document.getElementById("frm1707A:txtS2ModalTotalSellingPrice").value;
                document.getElementById("frm1707A:txtS2C4CostI4").value = document.getElementById("frm1707A:txtS2ModalTotalCost").value;
                document.getElementById("frm1707A:txtS2C5CapitalLossI4").value = document.getElementById("frm1707A:txtS2ModalTotalCapitalLoss").value;

                document.getElementById("frm1707A:txtS2C1DateOfTransactionI4").disabled = true;
                document.getElementById("frm1707A:txtS2C2NameOfCorporateStockI4").disabled = true;
                document.getElementById("frm1707A:txtS2C3SellingPriceI4").disabled = true;
                document.getElementById("frm1707A:txtS2C4CostI4").disabled = true;
                document.getElementById("frm1707A:txtS2C5CapitalLossI4").disabled = true;

                document.getElementById("btnSched2More").disabled = false;
            }


            computeSched2SellingPrice();
            computeSched2Cost();
            computeSched2CapitalLoss();
        }

    }

    var csvRead;
    function parseFilesTocsvRead(fileInput) {
        var openCSV = new ActiveXObject("Scripting.FileSystemObject");
        var csvSched = $('#' + fileInput).val();

        var isValidFile = true;

        if (csvSched != '') {
            csvRead = openCSV.OpenTextFile(csvSched, 1).ReadAll().split('\n');

        }
        else {
            alert('Please select a file');
            isValidFile = false;
        }

        return isValidFile;
    }

    function saveData(){

        var xml = saveXML();
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                
                var data = form.serialize();
                
                  
                var company = $('input[name="company"]').val();
                var form_no = $('input[name="form_no"]').val();
                var form_id = $('input[name="form_id"]').val();
                var item1B = $('select[name="frm1707A:txtI1YearEndMonth"]').val();
                var item1C = $('input[name="frm1707A:txtI1YearEndDay"]').val();
                var item1D = $('input[name="frm1707A:txtI1YearEndYear"]').val();
                var tin = $('input[name="frm1707A:TIN1"]').val()+$('input[name="frm1707A:TIN2"]').val()+$('input[name="frm1707A:TIN3"]').val()+$('input[name="frm1707A:TIN4"]').val();
                
                save_1707A('1707A',data, company,form_no,form_id,item1B,item1C,item1D,tin,xml); 
                
                disabled.attr('disabled','disabled');

                return false;
          }
    }

    /*Save Before Exit Function*/
    function saveBeforeExit()
    {
        var xml = saveXML();

        $('#saveModal').modal('hide');
        var form = $('#frmMain');
        var disabled = form.find(':input:disabled').removeAttr('disabled');
        
        var data = form.serialize();

        var company = $('input[name="company"]').val();
        var form_no = $('input[name="form_no"]').val();
        var form_id = $('input[name="form_id"]').val();
        var item1B = $('select[name="frm1707A:txtI1YearEndMonth"]').val();
        var item1C = $('input[name="frm1707A:txtI1YearEndDay"]').val();
        var item1D = $('input[name="frm1707A:txtI1YearEndYear"]').val();
        var tin = $('input[name="frm1707A:TIN1"]').val()+$('input[name="frm1707A:TIN2"]').val()+$('input[name="frm1707A:TIN3"]').val()+$('input[name="frm1707A:TIN4"]').val();
                  
        saveAndExit1707A('1707A',data,company,form_no,form_id,item1B,item1C,item1D,tin,xml);          
        
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
        var xml = saveXML();
        var form = $('#frmMain');
        var disabled = form.find(':input:disabled').removeAttr('disabled');

        var data = form.serialize();
        var company_id = $('#frmMain').find('input[name="company"]').val();
        var form_no = $('input[name="form_no"]').val();
        var form_id = $('input[name="form_id"]').val();
        var item1B = $('select[name="frm1707A:txtI1YearEndMonth"]').val();
        var item1C = $('input[name="frm1707A:txtI1YearEndDay"]').val();
        var item1D = $('input[name="frm1707A:txtI1YearEndYear"]').val();
        var tin = $('input[name="frm1707A:TIN1"]').val()+$('input[name="frm1707A:TIN2"]').val()+$('input[name="frm1707A:TIN3"]').val()+$('input[name="frm1707A:TIN4"]').val();
                 

        submitAndSave1707A('1707A', data, company_id,form_no,form_id,item1B,item1C,item1D,tin,xml);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1702MX';
    } 

    function saveXML() {
        var XHR = new XMLHttpRequest();
        var urlEncodedData = "";
        var urlEncodedDataPairs = [];
        var elem = document.getElementById('frmMain').elements;
        var allXML = "";
        var tab = document.getElementById('xmlFormat').innerHTML;

        allXML += tab; //adds line break

                for (var i = 0; i < elem.length; i++) {
                    if (elem[i].type != 'button' && elem[i].type != 'hidden' && elem[i].type != 'undefined') {
                        if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                            if (elem[i].id == 'frm1707A:txtI8RegisteredName') {
                                allXML += "<div>" + elem[i].id + "=" + escape(elem[i].value) + elem[i].id + "=</div>" + tab;
                                p3TPName = escape(elem[i].value);
                            }
                            else if (elem[i].id == 'frm1707A:txtLineOfBusiness') {
                                allXML += "<div>" + elem[i].id + "=" + escape(elem[i].value) + elem[i].id + "=</div>" + tab;
                                p3TPLineBus = escape(elem[i].value);
                            }
                            else if (elem[i].id == 'frm1707A:txtI9RegisteredAddress') {
                                allXML += "<div>" + elem[i].id + "=" + escape(elem[i].value) + elem[i].id + "=</div>" + tab;
                                p3TPAddress = escape(elem[i].value);
                            }
                            else if (elem[i].id == 'frm1707A:txtI5TIN1') {
                                allXML += "<div>" + elem[i].id + "=" + elem[i].value + elem[i].id + "=</div>" + tab;
                                p3TPTIN1 = elem[i].value;
                            } else if (elem[i].id == 'frm1707A:txtI5TIN2') {
                                allXML += "<div>" + elem[i].id + "=" + elem[i].value + elem[i].id + "=</div>" + tab;
                                p3TPTIN2 = elem[i].value;
                            } else if (elem[i].id == 'frm1707A:txtI5TIN3') {
                                allXML += "<div>" + elem[i].id + "=" + elem[i].value + elem[i].id + "=</div>" + tab;
                                p3TPTIN3 = elem[i].value;
                            } else if (elem[i].id == 'frm1707A:hdnI5TIN4') {
                                allXML += "<div>" + elem[i].id + "=" + elem[i].value + elem[i].id + "=</div>" + tab;
                                p3TPBranchCode = elem[i].value;
                            } else if (elem[i].id == 'frm1707A:hdnRDO') {
                                allXML += "<div>" + elem[i].id + "=" + elem[i].value + elem[i].id + "=</div>" + tab;
                                p3TPRDOCode = elem[i].value;
                            }
                            else if (elem[i].id == 'frm1707A:txtI7TelNo') {
                                allXML += "<div>" + elem[i].id + "=" + elem[i].value + elem[i].id + "=</div>" + tab;
                                p3TPTelNum = elem[i].value;
                            }
                            else if (elem[i].id == 'frm1707A:txtI10ZipCode') {
                                allXML += "<div>" + elem[i].id + "=" + elem[i].value + elem[i].id + "=</div>" + tab;
                                p3TPZip = elem[i].value;
                            }
                            else if (elem[i].id == 'frm1707A:txtI1YearEndMonth') {
                                allXML += "<div>" + elem[i].id + "=" + elem[i].value + elem[i].id + "=</div>" + tab;
                                p3ReturnPeriodMonth = elem[i].value;
                            } else if (elem[i].id == 'frm1707A:txtI1YearEndDay') {
                                allXML += "<div>" + elem[i].id + "=" + elem[i].value + elem[i].id + "=</div>" + tab;
                                p3ReturnPeriodDay = elem[i].value;
                            } else if (elem[i].id == 'frm1707A:txtI1YearEndYear') {
                                allXML += "<div>" + elem[i].id + "=" + elem[i].value + elem[i].id + "=</div>" + tab;
                                p3ReturnPeriodYear = elem[i].value;
                            }

                            else if (elem[i].className.indexOf("txtAmount") > -1 || elem[i].className.indexOf("schedAmount") > -1) {
                                var elemValue = elem[i].value;
                                if (elem[i].value.toString().indexOf('(') > -1 && elem[i].value.toString().indexOf(')') > -1) {
                                    elemValue = NumWithParenthesis(elemValue);
                                    if (elem[i].value.toString().indexOf(',') > -1) {
                                        elemValue = elemValue.replace(/,/g, '');
                                    }
                                }
                                else if (elem[i].value.toString().indexOf(',') > -1) {
                                    elemValue = elemValue.replace(/,/g, '');
                                }

                                if (elem[i].id == 'frm1707A:txtI18ASurcharge') {
                                    p3Surcharge = elemValue;
                                }
                                else if (elem[i].id == 'frm1707A:txtI18BInterest') {
                                    p3Interest = elemValue;
                                }
                                else if (elem[i].id == 'frm1707A:txtI18CCompromise') {
                                    p3Compromise = elemValue;
                                }
                                else if (elem[i].id == 'frm1707A:txtI17TaxStillPayable') {
                                    p3BasicTax = elemValue;
                                }
                                else if (elem[i].id == 'frm1707A:txtI18DPenalties') {
                                    p3TotalPenalties = elemValue;
                                }
                                else if (elem[i].id == 'frm1707A:txtI19TotalAmountPayable') {
                                    p3TotalAmountPayable = elemValue;
                                }
                                else if (elem[i].id == 'frm1707A:txtS1I20TotalSellingPrice') {
                                    p3GrossSales = elemValue;
                                }

                                if ((elemValue * 1) !== 0) {
                                    allXML += "<div>" + elem[i].id + "=" + elemValue + elem[i].id + "=</div>" + tab; //all numeric text values
                                }

                            }

                            else {
                                allXML += "<div>" + elem[i].id + "=" + elem[i].value + elem[i].id + "=</div>" + tab; //all select-one and text values
                            }
                        }
                        if (elem[i].type == 'radio' || elem[i].type == 'checkbox') {
                            allXML += "<div>" + elem[i].id + "=" + elem[i].checked + elem[i].id + "=</div>" + tab; //all radio and checkbox values

                            if (d.getElementById('frm1707A:rdoI2AmemdedYes').checked == true) {
                                p3IsAmended = "Yes";
                            } else if (d.getElementById('frm1707A:rdoI2AmemdedNo').checked == true) {
                                p3IsAmended = "No";
                            }
                        }
                    }
                }
                allXML += tab + document.getElementById('xmlClose').innerHTML;
                return allXML;
    }
</script>
@endsection